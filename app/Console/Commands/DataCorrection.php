<?php

namespace App\Console\Commands;

use App\Models\AllData;
use App\Models\WordFood;
use Illuminate\Console\Command;

class DataCorrection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:data-correction';

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
         $data = WordFood::all();

        $count = 0;
        $countw = 0;

         foreach ($data as $item) {

             $info = AllData::query()
                 ->where('CI_ID_NUM', $item->id_num)
                 ->first();

             if ($info) {
                 $item->update([
                     'full_name' => $info->CI_FIRST_ARB . ' ' . $info->CI_FATHER_ARB . ' ' . $info->CI_GRAND_FATHER_ARB . ' ' . $info->CI_FAMILY_ARB,
                 ]);
                 $count++;
             }else{
                $item->update([
                    'status' => 4,
                ]);
             }


             $infow = AllData::query()
                 ->where('CI_ID_NUM', $item->wife_id_num)
                 ->first();

             if ($infow) {
                 $item->update([
                     'wife_name' => $infow->CI_FIRST_ARB . ' ' . $infow->CI_FATHER_ARB . ' ' . $infow->CI_GRAND_FATHER_ARB . ' ' . $infow->CI_FAMILY_ARB,
                 ]);

                 $countw++;
             }else{
                $item->update([
                    'status' => 4,
                ]);
             }
         }


        $this->info("Number of rows update => count : $count .");

        $this->info("Number of rows update => count : $countw .");
    }
}
