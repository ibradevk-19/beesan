<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColToAboutDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_data', function (Blueprint $table) {
            $table->json('message')->nullable();
            $table->json('vision')->nullable();
            $table->json('text_one')->nullable();
            $table->json('text_tow')->nullable();
            $table->json('text_ther')->nullable();
            $table->string('message_image')->nullable();
            $table->string('vision_image')->nullable();
            $table->string('cover_image')->nullable();
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
