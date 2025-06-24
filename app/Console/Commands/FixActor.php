<?php

namespace App\Console\Commands;

use App\Models\AllData;
use App\Models\WordFood;
use Illuminate\Console\Command;

class FixActor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:fix_actor';

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

        $users = WordFood::with('familyDetailsInfo')->where('form_src',1)
                                                            ->where('actor_id',null)
                                                            ->get();



        foreach ($users as $user) {
            $user->update([
                'actor_id' => 64
            ]);
        }

        unset($users); // مسح البيانات من الذاكرة
        gc_collect_cycles(); // تأكد من تحرير الذاكرة
        $this->info("Done");

    }
}
