<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\HousingComplex;
use App\Models\Province;
use App\Models\User;
use App\Models\WordFood;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateUserData extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update user score from redis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $report = WordFood::query()
            ->whereIn('housing_complex_id',[10,11,12,13,14,15,16,17,18])
            ->select('housing_complex_id', DB::raw('COUNT(*) as total'))
            ->groupBy('housing_complex_id')
            ->with('housingComplex') // Assuming you have a `housingComplex` relationship
            ->get();


        $report2 = WordFood::query()
            ->whereIn('n_housing_complex_id',[10,11,12,13,14,15,16,17,18])
            ->select('n_housing_complex_id', DB::raw('COUNT(*) as total'))
            ->groupBy('n_housing_complex_id')
            ->with('NhousingComplex') // Assuming you have a `housingComplex` relationship
            ->get();

        // Prepare data for the table
        $tableData = $report->map(function ($item) {
            return [
                'Housing Complex ID' => $item->housing_complex_id,
                'Name' => optional($item->housingComplex)->name ?? 'Unknown',
                'Count' => $item->total,
            ];
        })->toArray();

        $tableData2 = $report2->map(function ($item) {
            return [
                'Housing Complex ID' => $item->housing_complex_id,
                'Name' => optional($item->NhousingComplex)->name ?? 'Unknown',
                'Count' => $item->total,
            ];
        })->toArray();

        // Display the report as a table
        $this->table(['Housing Complex ID', 'Name', 'Count'], $tableData);

        $this->info('Report generated successfully.');
        $this->info('=====================================================================================.');

        $this->table(['nHousing Complex ID', 'nName', 'nCount'], $tableData2);

        $this->info('Report 2 generated successfully.');

//        $province = Province::where('name', 'خانيونس')->first();
//        $this->info("Province Name => $province->name");
//
//        $city = City::where('province_id', $province->id)->first();
//        $this->info("City Name => $city->name");
//
//        $housingComplexes = HousingComplex::where('city_id', $city->id)->whereIn('id',[10,11,12,13,14,15,16,17,18])->get();
//
//
//
//        if ($housingComplexes->isEmpty()) {
//            $this->info("No housing complexes found for the city: $city->name.");
//        } else {
//            $this->info("Housing Complexes in $city->name:");
//
//            // Prepare data for the table
//            $tableData = $housingComplexes->map(function ($complex) {
//                return [
//                    'ID' => $complex->id,
//                    'Name' => $complex->name,
//                    'Count' => 0 ?? 'N/A', // Assuming there is an address field
//                ];
//            })->toArray();
//
//            // Display as a table
//            $this->table(
//                ['ID', 'Name', 'Count'], // Table headers
//                $tableData // Table data
//            );
//        }

    }



}
