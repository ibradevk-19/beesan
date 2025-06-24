<?php

namespace App\Console\Commands;

use App\Models\WordFood;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DataFiltering extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:data-filtering';

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
        //DB::table('inverted_records')->truncate();

        $invertedRecords = WordFood::query()
            ->where('form_src','=',1)
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('word_food as wf')
                    ->whereColumn('wf.id_num', 'word_food.wife_id_num') // رقم الزوج موجود كرقم الزوجة
                    ->whereColumn('wf.wife_id_num', 'word_food.id_num'); // رقم الزوجة موجود كرقم الزوج
            })
            ->get();

        // إذا لم توجد سجلات معكوسة
        if ($invertedRecords->isEmpty()) {
            return response()->json(['message' => 'لا توجد سجلات معكوسة.']);
        }

        // تسجيل تقرير في السجلات النصية (Logs)
        foreach ($invertedRecords as $record) {
            $data = WordFood::where('id_num', $record->wife_id_num)
                ->where('wife_id_num', $record->id_num)
                ->first();

           // dd($data);

            if($data){
                $data->update([
                    'is_duplicated' => 1,
                ]);
            }
        }

    }
}
