<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\AnnouncementAttachment;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AnnouncementController extends Controller
{
    public function index(Request $request){
       if ($request->ajax()) {
              $data = Announcement::query()->select(['id', 'title','description','image','status','external_link','expiry_date'])->get()->map(function ($item) {
                 return [
                     'id' => $item->id,
                     'title' => $item->translatedTitle,
                     'description' => $item->translatedDescription,
                     'image' => $item->image,
                     'status' => $item->status,
                     'external_link' => $item->external_link,
                     'expiry_date' => $item->expiry_date
                 ];
             })->toArray();
              return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', 'admin.announcements.datatables.action')
                  ->addColumn('status', 'admin.announcements.datatables.status')
                  ->rawColumns(['action','status'])
                  ->make(true);
       }

         return view('admin.announcements.index');

    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {



        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,zip',
            'external_link' => 'nullable',
            'expiry_date' => 'nullable|date',
            'status' => 'required|in:active,inactive',
            'attachments' => 'nullable'
        ]);




        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('announcements/images', 'public');
        }

        $announcement = Announcement::create($data);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('announcements/attachments', 'public');

                $announcement->attachments()->create([
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                ]);
            }
        }



        return redirect()->route('announcements.index')->with('success', 'تم إضافة الإعلان بنجاح');
    }

    public function edit(Announcement $announcement)
    {

        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $data = $request->all();

        // ✅ تحديث الصورة الرئيسية
        if ($request->hasFile('image')) {
            // حذف القديمة إذا موجودة
            if ($announcement->image && Storage::disk('public')->exists($announcement->image)) {
                Storage::disk('public')->delete($announcement->image);
            }

            // حفظ الجديدة
            $data['image'] = $request->file('image')->store('announcements/images', 'public');
        }

        // ✅ تحديث الحقول
        $announcement->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
            'expiry_date' => $data['expiry_date'],
            'external_link' => $data['external_link'],
            'image' => $data['image'] ?? $announcement->image,
        ]);

        // ✅ إضافة مرفقات جديدة فقط (لا نحذف القديمة هنا)
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('announcements/attachments', 'public');
                $announcement->attachments()->create([
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        return redirect()->route('announcements.index')->with('success', 'تم تعديل الإعلان بنجاح');
    }

    public function destroy(Announcement $announcement)
    {

        if ($announcement->image && \Storage::disk('public')->exists($announcement->image)) {
            \Storage::disk('public')->delete($announcement->image);
        }

        foreach ($announcement->attachments as $attachment) {
            if (\Storage::disk('public')->exists($attachment->file_path)) {
                \Storage::disk('public')->delete($attachment->file_path);
            }
            $attachment->delete();
        }

        $announcement->delete();

        return response()->json(['status' => 'success']);
    }


    public function attachmentDestroy(AnnouncementAttachment $attachment)
    {

//        if (Storage::disk('public')->exists($attachment->file_path)) {
//            Storage::disk('public')->delete($attachment->file_path);
//        }
//
//
//        $attachment->delete();
//
//        return [];
        if (Storage::exists($attachment->file_path)) {
            Storage::delete($attachment->file_path);
        }

        $attachment->delete();

        if (request()->ajax()) {
            return response()->json(['status' => 'success']);
        }

        return redirect()->back()->with('success', 'تم حذف المرفق');
    }
}
