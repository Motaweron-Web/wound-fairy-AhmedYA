<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLastImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_images', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->integer('date')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();
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
        Schema::dropIfExists('last_images');
    }
}
