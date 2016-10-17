<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksoalHarianTable extends Migration {

	public function up()
	{
		Schema::create('bankquiz', function(Blueprint $table) {
			$table->increments('id');
			$table->text('isi_soal');
			$table->text('jawaban_a');
			$table->text('jawaban_b');
			$table->text('jawaban_c');
			$table->text('jawaban_d');
			$table->text('jawaban_e');
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