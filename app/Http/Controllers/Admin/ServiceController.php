<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreServiceRequest;


class ServiceController extends Controller
{
    public function index(Request $request){
       if ($request->ajax()) {
             $data = Service::query()->select(['id', 'title','body','image'])->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->TranslatedTitle,
                    'body' => $item->TranslatedBody,
                    'image' => $item->image
                ];
            })->toArray();
             return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', 'admin.services.datatables.action') 
                 ->addColumn('image','admin.services.datatables.image')
                 ->rawColumns(['action','image'])
                 ->make(true);
      }
         return view('admin.services.index');
 
    }

    public function create(){

        return view('admin.services.create');

    }
        

    public function store(StoreServiceRequest $request)
    {


        // dd($request->all());
        $data = $request->validated();

        // معالجة رفع الصورة هنا إن وجدت
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images-page', 'public');
        }
    
        Service::create($data);
    
        return  redirect()->route('services.index')->with("success","تم الإنشاء بنجاح");

    }


    public function destroy($id)
    {
        $item = Service::find($id);
        $item->delete();
        return true;
    }


    public function edit($id){

        $obj = Service::where('id',$id)->first();
        if(!$obj)abort(500);

        return view('admin.services.edit',compact('obj'));

    }


    public function update(StoreServiceRequest $request, $service)
    {

        $service = Service::where('id',$service)->first();
        
        $data = $request->validated();
    
        // هل المستخدم رفع صورة جديدة؟
        if ($request->hasFile('image')) {
    
            // حذف الصورة القديمة إن وجدت
            if ($service->image && \Storage::disk('public')->exists($service->image)) {
                \Storage::disk('public')->delete($service->image);
            }
    
            // رفع الصورة الجديدة
            $data['image'] = $request->file('image')->store('services', 'public');
        }
        
        
        // تحديث البيانات
        $service->update($data);
        
        return redirect()->route('services.index')->with('success', 'تم التحديث بنجاح');
    }

}
