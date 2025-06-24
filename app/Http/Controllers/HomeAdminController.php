<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\HeroSlider;
use App\Models\Admin;
use App\Exports\TaxExport;

use App\Models\FamilyDetailsInfo;



class HomeAdminController extends Controller
{

    public function home(Request $request){
         
     
        return view('index')->with([
            
            
        ]);

    }

    public function import() {
        return view('import');
    }


    public function importNewIds(Request $request) {

            $request->validate([
                'file' => 'required|file'
            ], [
                'file.required' => 'الرجاء رفع ملف',
                'file.mimes' => 'الرجاء التأكد من صيغة الملف (xls,xlsx)',

            ]);


            if($request->file->getClientOriginalExtension() != 'xlsx') return redirect()->back()->with(["error" => "الرجاء التأكد من صيغة الملف (xls,xlsx)"]) ;

            // Excel::import(new UsersImport, request()->file('your_file'));
            try{
                    Excel::import(new MainImport,$request->file);
                    return redirect()->route('admin.import_res')->with(["success" => "تم جلب  البيانات  بنجاح"]);
                } catch (Exception $e) {
                    return redirect()->route('admin.import_res')->with(["error" => "حدثت مشكلة في جلب البيانات"]);
                }
    }


    public function importRes(Request $request) {
        if ($request->ajax()) {

            $data = ImportExcelResulte::query()->get()->toArray();

            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
       }

        return view('import_res');
    }

    public function export(Request $request)  {

            $data = WordFood::all();

            if ($request->export == 'pdf') {
                $pdf = SnappyPdf::loadView('pdf.taxes', [
                    'taxes'=> $taxes,
                ])
                ->setPaper('a4')
                ->setOption('margin-top', 0)
                ->setOption('margin-left', 10)
                ->setOption('margin-right', 10)
                ->setOption('margin-bottom', 0);

                return $pdf->download('all.pdf');
            }

            return Excel::download(new TaxExport($data), 'all.xlsx');

    }

    public function checkIdNumber($id)  {
        return $id;
    }

    public function testHome()  {
        return view('admin.test.test');
    }

    public function excelCheck()  {
        return view('admin.test.check'); //sddd
    }

    public function showForm()  {
        return view('admin.test.form');
    }

}
