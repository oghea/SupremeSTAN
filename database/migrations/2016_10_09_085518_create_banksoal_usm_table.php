<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksoalUsmTable extends Migration {

	public function up()
	{
		Schema::create('banksoalUSM', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('kdUSM_id')->unsigned()->index();
			$table->string('isi_soal', 200);
			$table->string('jawaban_a', 100);
			$table->string('jawaban_b', 100);
			$table->string('jawaban_c', 100);
			$table->string('jawaban_d', 100);
			$table->string('jawaban_e', 100);
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