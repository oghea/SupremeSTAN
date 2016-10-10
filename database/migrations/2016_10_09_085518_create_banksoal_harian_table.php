<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksoalHarianTable extends Migration {

	public function up()
	{
		Schema::create('bankquiz', function(Blueprint $table) {
			$table->increments('id');
			$table->string('isi_soal', 200);
			$table->string('jawaban_a', 100);
			$table->string('jawaban_b', 100);
			$table->string('jawaban_c', 100);
			$table->string('jawaban_d', 100);
			$table->string('jawaban_e', 100);
			$table->integer('kunciQuiz_id')->unsigned();
			$table->integer('pembahasanQuiz_id')->unsigned();
            $table->timestamps();
		});

	}

	public function down()
	{
		Schema::drop('bankquiz');
	}
}