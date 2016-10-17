<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksoalUsmTable extends Migration {

	public function up()
	{
		Schema::create('banksoalUSM', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('kdUSM_id')->unsigned()->index();
			$table->text('isi_soal');
			$table->text('jawaban_a');
			$table->text('jawaban_b');
			$table->text('jawaban_c');
			$table->text('jawaban_d');
			$table->text('jawaban_e');
			$table->integer('kunciUSM_id')->unsigned()->index();
			$table->integer('pembahasanUSM_id')->unsigned()->index();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('banksoalUSM');
	}
}