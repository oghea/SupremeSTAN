<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultUSMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultUSM', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('tryoutUSM_id')->unsigned();
            $table->integer('nilai')->nullable();
            $table->string('resultTPA')->nullable();
            $table->string('resultTBI')->nullable();
            $table->integer('skorTPA')->nullable();
            $table->integer('skorTBI')->nullable();
            $table->string('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resultUSM');
    }
}
