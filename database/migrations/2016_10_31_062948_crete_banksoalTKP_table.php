<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteBanksoalTKPTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banksoalTKP', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('kdTKD_id')->unsigned();
            $table->text('isi_soal');
            $table->text('jawaban_a');
            $table->text('jawaban_b');
            $table->text('jawaban_c');
            $table->text('jawaban_d');
            $table->text('jawaban_e');
            $table->integer('bobot_a');
            $table->integer('bobot_b');
            $table->integer('bobot_c');
            $table->integer('bobot_d');
            $table->integer('bobot_e');
            $table->text('pembahasanTKP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banksoalTKP');
    }
}
