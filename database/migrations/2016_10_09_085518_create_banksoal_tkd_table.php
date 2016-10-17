<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksoalTkdTable extends Migration {

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
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('banksoalTKD');
	}
}