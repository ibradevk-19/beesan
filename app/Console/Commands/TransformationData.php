<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\WordFood;
use App\Models\FamilyDetailsInfo;
use App\Models\User;
use App\Models\BeneficialDuplicate;


class TransformationData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:transformation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'transformation data to new database and removed duplicates from database';

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




      return 0;
    }
}
