<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request){
       if ($request->ajax()) {
             $data = Category::query()->select(['id', 'name'])->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->translatedName,
                ];
            })->toArray();
             return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', 'admin.categories.datatables.action') 
                 ->rawColumns(['action'])
                 ->make(true);
        }
         return view('admin.categories.index');
 
    }

    public function create(){

        return view('admin.categories.create');

    }
        

    public function store(StoreCategoryRequest $request)
    {


        
        $data = $request->validated();

        Category::create($data);
    
        return  redirect()->route('categories.index')->with("success","تم الإنشاء بنجاح");

    }


    public function destroy($id)
    {
        $item = Category::find($id);
        $item->delete();
        return true;
    }


    public function edit($id){

        $obj = Category::where('id',$id)->first();
        if(!$obj)abort(500);

        return view('admin.categories.edit',compact('obj'));

    }


    public function update(StoreCategoryRequest $request, $obj)
    {

        $obj = Category::where('id',$obj)->first();
        
        $data = $request->validated();
    
        // تحديث البيانات
        $obj->update($data);
        
        return redirect()->route('categories.index')->with('success', 'تم التحديث بنجاح');
    }

}
