<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FindReversedDuplicates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:find_reversed_and_duplicate';

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
        $users = DB::table('word_food')->where('actor_id', 64)->get([
            'id',
            'full_name',
            'id_num',
            'wife_name',
            'wife_id_num',
            'family_count',
            'marital_status',
            'mobile',
            'family_id',
            'actor_id',
            'status',
            'is_approved',
            'form_src',
            'is_up2005',
            'is_deleted',
            'province_id',
            'city_id',
            'housing_complex_id',
            'n_province_id',
            'n_city_id',
            'n_housing_complex_id',
            'is_duplicated',
        ]);

        $reversedUsers = [];
        $duplicateUsers = [];
    
        $processedPairs = []; // To track processed ID combinations
    
        foreach ($users as $user) {
            $husbandId = $user->id_num;
            $wifeId = $user->wife_id_num;
    
            // Check for duplicates
            $duplicates = $users->filter(function ($item) use ($husbandId, $wifeId, $user) {
                return (
                    $item->id_num === $husbandId &&
                    $item->wife_id_num === $wifeId &&
                    $item->id !== $user->id
                );
            });
    
            if ($duplicates->isNotEmpty()) {
                $duplicateUsers[] = [
                    'user' => $user,
                    'duplicates' => $duplicates
                ];
            }
    
            // Check for reversed pairs
            $reversedPairKey = "$wifeId-$husbandId";
            if (in_array($reversedPairKey, $processedPairs)) {
                continue;
            }
    
            $reversed = $users->filter(function ($item) use ($husbandId, $wifeId) {
                return (
                    $item->id_num === $wifeId &&
                    $item->wife_id_num === $husbandId
                );
            });
    
            if ($reversed->isNotEmpty()) {
                $reversedUsers[] = [
                    'user' => $user,
                    'reversed' => $reversed
                ];
    
                // Mark this pair as processed
                $processedPairs[] = "$husbandId-$wifeId";
            }
        }
    
        return [
            'reversedUsers' => $reversedUsers,
            'duplicateUsers' => $duplicateUsers
        ];
    }
}
