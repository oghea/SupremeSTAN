<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToTKDKdUSM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kdTKD_tryoutTKD', function (Blueprint $table) {
            $table->integer('kdTKD_id')->unsigned();
            $table->integer('tryoutTKD_id')->unsigned();
            $table->foreign('kdTKD_id')->references('id')->on('kdTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tryoutTKD_id')->references('id')->on('tryoutTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['kdTKD_id' , 'tryoutTKD_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kdTKD_tryoutTKD');
    }
}
