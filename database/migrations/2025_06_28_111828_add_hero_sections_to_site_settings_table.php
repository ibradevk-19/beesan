<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeroSectionsToSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('hero_image')->nullable();
            $table->json('hero_title')->nullable();
            $table->json('hero_body')->nullable();
            $table->string('beneficiaries_count')->nullable();
            $table->string('project_count')->nullable();
            $table->string('partner_count')->nullable();
            $table->string('years_experience_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_settings', function (Blueprint $table) {
            //
        });
    }
}
