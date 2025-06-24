<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\FamilyDetailsInfo;
use App\Models\AllData;

class BeneficialsExportUser implements FromQuery, WithMapping, WithHeadings, WithChunkReading, ShouldAutoSize
{

    /**
     * @var
     */
    private $request;

    /**
     * @param $users
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function query()
    {
        
        $request = $this->request;
      
        $query = FamilyDetailsInfo::with('beneficial')->whereHas('beneficial')
                  ->where('housing_complex',$this->request->housing_complex);
                 
        // Repeat other filters as needed...
        $query->whereHas('beneficial', function ($q) use ($request) {
            $q->where('family_count','>=', $request->family_count)
            ->where('family_count','<=', $request->family_count_to);
        });

        if ($this->request->cat_id == 'children_under_2') {
            $query->where('children_under_2', '>', 0);
        }

        if($this->request->cat_id == 'children_under_2'){
            $query->where('children_under_2','>', 0);
        }

        if($this->request->cat_id == 'children_under_3'){
           $query->where('children_under_3','>', 0);
        }

        if($this->request->cat_id == 'total_damage'){
           $query->where('damage_type','total_damage');
        }

        if($this->request->cat_id == 'partial_damage'){
            $query->where('damage_type','partial_damage');
        }

        if($this->request->cat_id == 'uninhabitable_part'){
          $query->where('damage_type','uninhabitable_part');
        }

        if($this->request->cat_id == 'inhabitable_part'){
           $query->where('damage_type','inhabitable_part');
        }

        if($this->request->cat_id == 'has_disability'){
           $query->where('has_disability',1);
        }
        
        return $query;
    }

    public function map($row): array
    {
        $info = AllData::query()
        ->where('CI_ID_NUM', $row->beneficial?->id_num)
        ->first();

        $infow = AllData::query()
        ->where('CI_ID_NUM', $row->beneficial?->wife_id_num)
        ->first();

        if($info){
           $full_name = $info->CI_FIRST_ARB . ' ' . $info->CI_FATHER_ARB . ' ' . $info->CI_GRAND_FATHER_ARB . ' ' . $info->CI_FAMILY_ARB;
        }else{
            $full_name = $row->beneficial?->full_name ?? '';
        }

        if($infow){
            $wife_name = $infow->CI_FIRST_ARB . ' ' . $infow->CI_FATHER_ARB . ' ' . $infow->CI_GRAND_FATHER_ARB . ' ' . $infow->CI_FAMILY_ARB;
         }else{
            $wife_name = $row->beneficial?->wife_name ?? '';
         }
        return [
            $row->id,
            $full_name ?? '',
            $row->beneficial?->id_num ?? '',
            $wife_name ?? '',
            $row->beneficial?->wife_id_num ?? '',
            $row->beneficial?->family_count,
            $row->beneficial?->mobile,
            $this->marital(trim($row->marital_status)),
            $row->province_name?->name ?? '',
            $row->city_name?->name ?? '',
            $row->housing_complex_name?->name ?? '',
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'اسم الزوج',
            'رقم الهوية',
            'اسم الزوجة',
            'رقم هوية الزوجة' ,
            'عدد الافراد' ,
            'رقم الجوال',
            'الحالة الاجتماعية',
            'المحافظة',
            'المدينة',
            'التجمع السكني',
        ];
    }

    public function chunkSize(): int
    {
        return 1500; // Export 1000 rows at a time
    }

    // /**
    //  * @return View
    //  */
    // public function view(): View
    // {
    //     return view('exports.beneficials-users', ['items' => $this->data]);
    // }

    // /**
    //  * @return array
    //  */
    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $event->sheet->getDelegate()->setRightToLeft(true);
    //         },
    //     ];
    // }

    private function marital($val)  {
        $array = [
            'single' => 'أعزب',
            'single' => 'اعزب',
            'married' => 'متزوج',
            'married' => 'متزوج',
            'divorced' => 'مطلق',
            'divorced'=> 'مطلقة',
            'widowed' => 'ارمل',
            'widowed' => 'ارملة',
            'breadwinner' => 'بلا معيل',
        ];

        // Search for the value and return the corresponding key
        return $array[$val] ?? '-';
         


    }
}
