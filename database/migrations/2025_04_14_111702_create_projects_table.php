<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->json('body')->nullable();
            $table->string('image')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('client')->nullable();
            $table->string('client_logo')->nullable();
            $table->string('main_imge')->nullable();
            $table->string('thumbnail_imge')->nullable();
            $table->string('medium_imge')->nullable();
            $table->string('large_imge')->nullable();
            $table->boolean('have_images')->nullable();
            $table->json('images')->nullable();
            $table->boolean('have_news')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
