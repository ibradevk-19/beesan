<?php

namespace App\Console\Commands;

use App\Models\AllData;
use App\Models\BeneficialDuplicate;
use App\Models\FamilyDetailsInfo;
use App\Models\ImportExcelResulte;
use App\Models\User;
use App\Models\WordFood;
use Illuminate\Console\Command;

class Resetres extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:resetres';

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

          $data = ImportExcelResulte::all();

          foreach ($data as $key => $value) {
            $value->delete();
          }
          $this->info('Reset res');

          $user = WordFood::where('actor_id', 63)->get();
          foreach ($user as $key => $value) {
              FamilyDetailsInfo::where('beneficial_id',$value->id)->delete();
              BeneficialDuplicate::where('id_num',$value->id_num)->where('actor_id',63)->delete();
              User::where('id_number',$value->id_num)->delete();
              $value->delete();
          }

          return 0;
    }
}
