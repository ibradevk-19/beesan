<?php

namespace App\Console\Commands;

use App\Models\FamilyDetailsInfo;
use App\Models\WordFood;
use Illuminate\Console\Command;

class DeleteDuplicateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete-duplicates';
    protected $description = 'Delete duplicate users based on email';

    /**
     * The console command description.
     *
     * @var string
     */

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
        // العثور على المستخدمين المكررين بناءً على البريد الإلكتروني
        $duplicates = WordFood::select('id_num')
            ->groupBy('id_num')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('id_num');

        $duplicatesCount = 0;

        foreach ($duplicates as $id_num) {
            // الحصول على جميع المستخدمين الذين لديهم نفس البريد الإلكتروني باستثناء واحد
            $users = WordFood::where('id_num', $id_num)->orderBy('id')->where('actor_id',null)->orWhere('actor_id',64)->get();

            // حذف جميع النسخ باستثناء الأولى
//            $usersToDelete = $users->slice(1);

            foreach ($users as $user) {
                $data = FamilyDetailsInfo::where('beneficial_id',$user->id)->delete();
                $user->delete();
                $duplicatesCount++;
            }
        }

        $this->info("Deleted $duplicatesCount duplicate users.");
        return 0;
    }
}
