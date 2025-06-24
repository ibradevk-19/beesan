<?php

namespace App\Console\Commands;

use App\Models\AllData;
use App\Models\WordFood;
use Illuminate\Console\Command;

class UpdateProvince extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:data-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $users = WordFood::with('familyDetailsInfo')->get();

        foreach ($users as $user) {
            if($user->familyDetailsInfo != null){
                $user->update([
                    'province_id' => $user->familyDetailsInfo->province ?? null,
                    'city_id' => $user->familyDetailsInfo->city ?? null,
                    'housing_complex_id' => $user->familyDetailsInfo->housing_complex ?? null,
                    'n_province_id' => $user->familyDetailsInfo->province_id ?? null,
                    'n_city_id' => $user->familyDetailsInfo->city_id ?? null,
                    'n_housing_complex_id' => $user->familyDetailsInfo->housing_complex_id ?? null,
                ]);
            }
        }

        unset($users); // مسح البيانات من الذاكرة
        gc_collect_cycles(); // تأكد من تحرير الذاكرة
        $this->info("Done");

    }
}
