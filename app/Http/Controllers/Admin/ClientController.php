<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
             $data = Client::query();
             return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', 'admin.clients.datatables.action') 
                 ->addColumn('image','admin.clients.datatables.image')
                 ->rawColumns(['action','image'])
                 ->make(true);
        }
         return view('admin.clients.index');
 
    }

    public function create(){

        return view('admin.clients.create');

    }
        

    public function store(StoreClientRequest $request)
    {


        // dd($request->all());
        $data = $request->validated();

        // معالجة رفع الصورة هنا إن وجدت
        if ($request->hasFile('client_logo')) {
            $data['client_logo'] = $request->file('client_logo')->store('clients', 'public');
        }
    
        Client::create($data);
    
        return  redirect()->route('clients.index')->with("success","تم الإنشاء بنجاح");

    }


    public function destroy($id)
    {
        $item = Client::find($id);
        $item->delete();
        return true;
    }


    public function edit($id){

        $obj = Client::where('id',$id)->first();
        if(!$obj)abort(500);

        return view('admin.clients.edit',compact('obj'));

    }


    public function update(StoreClientRequest $request, $heroSlider)
    {

        $heroSlider = Client::where('id',$heroSlider)->first();
        
        $data = $request->validated();
    
        // هل المستخدم رفع صورة جديدة؟
        if ($request->hasFile('client_logo')) {
    
            // حذف الصورة القديمة إن وجدت
            if ($heroSlider->image && \Storage::disk('public')->exists($heroSlider->image)) {
                \Storage::disk('public')->delete($heroSlider->image);
            }
    
            // رفع الصورة الجديدة
            $data['client_logo'] = $request->file('client_logo')->store('clients', 'public');
        }
        
        
        // تحديث البيانات
        $heroSlider->update($data);
        
        return redirect()->route('clients.index')->with('success', 'تم التحديث بنجاح');
    }

}
