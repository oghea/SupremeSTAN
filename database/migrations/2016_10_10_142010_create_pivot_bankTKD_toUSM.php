<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotBankTKDToUSM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banksoalTKD_tryoutTKD', function (Blueprint $table) {
            $table->integer('banksoalTKD_id')->unsigned();
            $table->integer('tryoutTKD_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banksoalTKD_tryoutTKD');
    }
}
