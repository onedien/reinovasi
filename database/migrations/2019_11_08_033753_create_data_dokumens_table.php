<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_dokumens', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dataid');
            $table->string('fileName');
            $table->timestamps();

            $table->foreign('dataid')->references('id')->on('data')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_dokumens');
    }
}
