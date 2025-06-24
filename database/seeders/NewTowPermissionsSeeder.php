<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewTowPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(array(


            0 => array(
                'id' => 34,
                'name'=>'mang store',
                'name_ar'=>'ادارة المخزن',
                'guard_name'=>'admin',
            ),



        ));
    }
}
