<?php

namespace App\Exports;

use App\Models\WordFood;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BeneficialsExportChunking implements FromQuery, WithMapping, WithHeadings, WithChunkReading, ShouldAutoSize
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function query()
    {
        $relationships = [
            'actor',
            'familyDetailsInfo',
            'deliveryRecordBeneficials',
            'deliveryRecordBeneficials.product',
            'housingComplex',
            'city',
            'province'
        ];

        $query = WordFood::query()->with($relationships)
             ->where('family_count','>=', $this->request->family_count)->where('family_count','<=', $this->request->family_count_to)
            ->when($this->request->province, function ($query, $province) {
                $query->whereHas('familyDetailsInfo', function ($query) use($province) {
                    $query->where('province_id', $province);
               });
            })
            ->when($this->request->city, function ($query, $city) {
                $query->whereHas('familyDetailsInfo', function ($query) use($city) {
                    $query->where('city_id', $city);
               });
            })
            ->when($this->request->housing_complex, function ($query, $housing_complex) {
                $query->whereHas('familyDetailsInfo', function ($query) use($housing_complex) {
                    $query->where('housing_complex_id', $housing_complex);
               });
            });

           

        // Apply filters here...
        if ($this->request->cat_id == 'children_under_2') {
            $query->whereHas('familyDetailsInfo', function ($q) {
                $q->where('children_under_2', '>', 0);
            });
        }

        if($this->request->cat_id == 'children_under_2'){
            $data = $data->whereHas('familyDetailsInfo', function ($query) {
                $query->where('children_under_2','>', 0);
            });
        }

        if($this->request->cat_id == 'children_under_3'){
            $data = $data->whereHas('familyDetailsInfo', function ($query) {
                $query->where('children_under_3','>', 0);
            });
        }

        if($this->request->cat_id == 'total_damage'){
            $data = $data->whereHas('familyDetailsInfo', function ($query) {
                $query->where('damage_type','total_damage');
            });
        }

        if($this->request->cat_id == 'partial_damage'){
            $data = $data->whereHas('familyDetailsInfo', function ($query) {
                $query->where('damage_type','partial_damage');
            });
        }

        if($this->request->cat_id == 'uninhabitable_part'){
            $data = $data->whereHas('familyDetailsInfo', function ($query) {
                $query->where('damage_type','uninhabitable_part');
            });
        }

        if($this->request->cat_id == 'inhabitable_part'){
            $data = $data->whereHas('familyDetailsInfo', function ($query) {
                $query->where('damage_type','inhabitable_part');
            });
        }

        if($this->request->cat_id == 'has_disability'){
            $data = $data->whereHas('familyDetailsInfo', function ($query) {
                $query->where('has_disability',1);
            });
        }

        // Repeat other filters as needed...

        return $query;
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->full_name ?? '',
            $row->id_num ?? '',
            $row->wife_name ?? '',
            $row->wife_id_num ?? '',
            $row->family_count,
            $row->mobile,
            $row->province->name ?? '',
            $row->city->name ?? '',
            $row->familyDetailsInfo->housing_complex_name->name ?? '',
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
            'المحافظة',
            'المدينة',
            'التجمع السكني',
        ];
    }

    public function chunkSize(): int
    {
        return 1000; // Export 1000 rows at a time
    }
}
