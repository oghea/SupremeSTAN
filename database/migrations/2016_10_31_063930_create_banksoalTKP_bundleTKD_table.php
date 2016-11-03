<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksoalTKPBundleTKDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banksoalTKP_bundleTKD', function (Blueprint $table) {
            $table->integer('banksoalTKP_id')->unsigned();
            $table->integer('bundleTKD_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banksoalTKP_bundleTKD');
    }
}
