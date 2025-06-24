<?php

namespace App\Console\Commands;

use App\Models\AllData;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\WordFood;
use App\Models\FamilyDetailsInfo;
use App\Models\User;
use App\Models\BeneficialDuplicate;
use DB;

class DeleteAllUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete All User';

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
        $wordFoods = WordFood::all();
        $diedtCount = 0;
        $duplicatesCount = 0;
        $duplicatesCount2 = 0;
        foreach ($wordFoods as $wordFood) {

            $data = AllData::query()
                ->where('CI_ID_NUM', $wordFood->id_num)
                ->Where('CI_BIRTH_DT', '>',  Carbon::createFromFormat('d/m/Y', '01/01/2005')->format('Y-m-d'))
                ->exists();

            if($data){

                  $wordFood->update([
                      'is_up2005' => 1,
                      //'is_deleted' => 1,
                  ]);

                $duplicatesCount++;
            }
            $data2 = AllData::query()
                ->where('CI_ID_NUM', $wordFood->id_num)
                ->where("CI_DEAD_DT","متوفى")
                ->exists();
            if($data2){
                $wordFood->update([
                    //'is_up2005' => 1,
                    'is_deleted' => 1,
                ]);
                $diedtCount++;
            }

            $data2 = AllData::query()
                ->where('CI_ID_NUM', $wordFood->id_num)
                ->exists();
            if(!$data2){
                $wordFood->update([
                   // 'is_up2005' => 1,
                    'is_deleted' => 1,
                ]);
                $duplicatesCount2++;
            }

        }

        $this->info("Number of beneficiaries born in 2005 or less  => count : $duplicatesCount .");

        $this->info("Number of deceased beneficiaries  => count : $diedtCount .");

        $this->info("The number of beneficiaries who have errors in their ID number  => count : $duplicatesCount2 .");


        return 0;
    }
}
