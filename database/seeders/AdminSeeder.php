<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
            'name' => 'Administrator',
            'type' => '1',
            'email' => 'admin-user@beesan.com',
            'password' => Hash::make('beesan@123456789'),
            'created_at' => now(),
        ]);


    }
}
