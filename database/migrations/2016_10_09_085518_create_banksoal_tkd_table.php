<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksoalTkdTable extends Migration {

	public function up()
	{
		Schema::create('banksoalTKD', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('kdTKD_id')->unsigned();
			$table->string('isi_soal', 200);
			$table->string('jawaban_a', 100);
			$table->string('jawaban_b', 100);
			$table->string('jawaban_c', 100);
			$table->string('jawaban_d', 100);
			$table->string('jawaban_e', 100);
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