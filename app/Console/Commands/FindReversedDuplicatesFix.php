<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\AllData;
use App\Models\WordFood;

class FindReversedDuplicatesFix extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:find_reversed_and_duplicate_fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command To Find Reversed And Duplicate Users By ID Number.';

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
        $invertedRecords = DB::table('inverted_records')->get();
        
        foreach($invertedRecords as $record){
           
            if($this->InSameRecord((int)$record->husband_id,(int)$record->wife_id)){
                 $this->removeWifeData($record->record_1_id);
            }else{
                 $this->removeRecord($record);
            }
        }

        $this->info("Done");

        return 0;



    }


    private function InSameRecord($husbandId,$wifeId) {
      
        if($husbandId === $wifeId){
            return true;
        }
       
        return false;
    }

    private function removeWifeData($recordId)  {

        $record = WordFood::where('id',$recordId)->first();

        if($record){

            $record->update([
                'wife_name' => ' ',
                'wife_id_num' => ' ',
            ]);



        }

    }

    private function removeRecord($record) {
        
        $record_1_id = $record->record_1_id;
        $record_2_id = $record->record_2_id;

        $record_1 =  WordFood::where('id',$record_1_id)->with('familyDetailsInfo')->first();
        $record_2 =  WordFood::where('id',$record_2_id)->with('familyDetailsInfo')->first();

        $record_1_info = null;
        $record_2_info = null;

        if($record_1){
            $record_1_info = AllData::query()->where('CI_ID_NUM', $record_1->id_num)->first();
        }

        if($record_2){
            $record_2_info = AllData::query()->where('CI_ID_NUM', $record_2->id_num)->first();
        }
        
        if($record_1_info != null && $record_2_info != null){
            if($record_1_info->CI_SEX_CD == 'أنثى' && $record_2_info->CI_SEX_CD == 'ذكر'){
                $record_1->delete();
            }elseif($record_1_info->CI_SEX_CD == 'ذكر' && $record_2_info->CI_SEX_CD == 'أنثى'){

                if($record_2->familyDetailsInfo?->marital_status != 'married'){
                   
                }else{
                    $record_2->delete();
                }
               
            }  
        }else{
           
        }


        

                              
    }
}
