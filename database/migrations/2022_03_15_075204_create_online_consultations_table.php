<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();
            $table->enum('type',['visit','online'])->default('online');
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
        Schema::dropIfExists('online_consultations');
    }
}
