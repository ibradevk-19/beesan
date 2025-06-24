<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePorjectRequest;
use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index(Request $request){
     if ($request->ajax()) {
              $data = Project::query()->select([
                'id',
                'title',
                'body',
                'image',
                'main_imge',
                'start_date',
                'end_date',
                'client',
                'client_logo',
                'have_images',
                'images',
                'have_news'])
                ->get()->map(function ($item) {
                 return [
                     'id' => $item->id,
                     'title' => $item->TranslatedTitle,
                     'body' => $item->TranslatedBody,
                     'image' => $item->image,
                     'client' => $item->TranslatedClient
                 ];
             })->toArray();
              return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', 'admin.projects.datatables.action') 
                  ->addColumn('image','admin.projects.datatables.image')
                  ->rawColumns(['action','image'])
                  ->make(true);
      }
          return view('admin.projects.index');
  
     }
 
     public function create(){
 
         return view('admin.projects.create');
 
     }
         
 
     public function store(StorePorjectRequest $request)
     {
 
          
        $data = $request->validated();

        // الحقول المنطقية: تأكد من أنها 0 أو 1
        $data['have_images'] = $request->has('have_images') ? 1 : 0;
        $data['have_news']   = $request->has('have_news') ? 1 : 0;
    
        // معالجة الصور المفردة
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }
    
        if ($request->hasFile('main_imge')) {
            $data['main_imge'] = $request->file('main_imge')->store('projects', 'public');
        }
    
        if ($request->hasFile('client_logo')) {
            $data['client_logo'] = $request->file('client_logo')->store('projects', 'public');
        }
    
        // معالجة الصور المتعددة
        if ($request->hasFile('images')) {
            $storedImages = [];
            foreach ($request->file('images') as $image) {
                $storedImages[] = $image->store('projects/gallery', 'public');
            }
            $data['images'] = $storedImages;
        }
    
        // إنشاء المشروع
        Project::create($data);
    
        return redirect()->route('projects.index')->with("success", "تم الإنشاء بنجاح");
 
     }
 
 
     public function destroy($id)
     {
         $item = Project::find($id);
         $item->delete();
         return true;
     }
 
 
     public function edit($id){
 
         $project  = Project::where('id',$id)->first();
         if(!$project )abort(500);
 
         return view('admin.projects.edit',compact('project'));
 
     }
 
 
     public function update(StorePorjectRequest $request, $id)
     {
         $project = Project::findOrFail($id);
     
         $data = $request->validated();
     
         // الحقول المنطقية
         $data['have_images'] = $request->has('have_images') ? 1 : 0;
         $data['have_news']   = $request->has('have_news') ? 1 : 0;
     
         // الصور المفردة
         foreach (['image', 'main_imge', 'client_logo'] as $field) {
             if ($request->hasFile($field)) {
                 // حذف القديمة
                 if ($project->$field && \Storage::disk('public')->exists($project->$field)) {
                     \Storage::disk('public')->delete($project->$field);
                 }
                 // رفع الجديدة
                 $data[$field] = $request->file($field)->store('projects', 'public');
             }
         }
     
         // صور متعددة جديدة؟ استبدال الكل
         if ($request->hasFile('images')) {
             // حذف الصور القديمة
             if (is_array($project->images)) {
                 foreach ($project->images as $img) {
                     if (\Storage::disk('public')->exists($img)) {
                         \Storage::disk('public')->delete($img);
                     }
                 }
             }
     
             $storedImages = [];
             foreach ($request->file('images') as $image) {
                 $storedImages[] = $image->store('projects/gallery', 'public');
             }
     
             $data['images'] = $storedImages;
         }
     
         // تحديث المشروع
         $project->update($data);
     
         return redirect()->route('projects.index')->with('success', 'تم التحديث بنجاح');
     }
     
}
