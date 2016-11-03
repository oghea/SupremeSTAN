<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksoalTKDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banksoalTKD', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('kdTKD_id')->unsigned();
            $table->text('isi_soal');
            $table->text('jawaban_a');
            $table->text('jawaban_b');
            $table->text('jawaban_c');
            $table->text('jawaban_d');
            $table->text('jawaban_e');
            $table->integer('kunciTKD_id')->unsigned();
            $table->integer('pembahasanTKD_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banksoalTKD');
    }
}
