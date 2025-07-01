<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHistoryAndTeamSectionsToAboutDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_data', function (Blueprint $table) {
             $table->json('history_section')->nullable()->after('cover_image');
             $table->json('team_section')->nullable()->after('history_section');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_data', function (Blueprint $table) {
            //
        });
    }
}
