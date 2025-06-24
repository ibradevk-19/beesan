<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHeroSliderRequest;
use App\Models\HeroSlider;
use Yajra\DataTables\Facades\DataTables;

class HeroController extends Controller
{
    public function index(Request $request){
           if ($request->ajax()) {
                $data = HeroSlider::query();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'admin.hero-slides.datatables.action') 
                    ->addColumn('image','admin.hero-slides.datatables.image')
                    ->addColumn('status','admin.hero-slides.datatables.status')
                    ->rawColumns(['action','image','status'])
                    ->make(true);
           }
            return view('admin.hero-slides.index');
    
    }

    public function create(){

        return view('admin.hero-slides.create');

    }


    public function store(StoreHeroSliderRequest $request)
    {


        // dd($request->all());
        $data = $request->validated();

        // معالجة رفع الصورة هنا إن وجدت
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }
    
       HeroSlider::create($data);
    
       return  redirect()->route('hero-slide.index')->with("success","تم الإنشاء بنجاح");

    }


    public function destroy($id)
    {
        $item = HeroSlider::find($id);
        $item->delete();
        return true;
    }


    public function edit($id){

        $obj = HeroSlider::where('id',$id)->first();
        if(!$obj)abort(500);

        return view('admin.hero-slides.edit',compact('obj'));

    }


    public function update(StoreHeroSliderRequest $request, $heroSlider)
    {

        $heroSlider = HeroSlider::where('id',$heroSlider)->first();
        
        $data = $request->validated();
    
        // هل المستخدم رفع صورة جديدة؟
        if ($request->hasFile('image')) {
    
            // حذف الصورة القديمة إن وجدت
            if ($heroSlider->image && \Storage::disk('public')->exists($heroSlider->image)) {
                \Storage::disk('public')->delete($heroSlider->image);
            }
    
            // رفع الصورة الجديدة
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }
         
       
        // تحديث البيانات
        $heroSlider->update($data);
        
        return redirect()->route('hero-slide.index')->with('success', 'تم التحديث بنجاح');
    }

     
}
