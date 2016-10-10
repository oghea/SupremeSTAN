<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKdUsmTable extends Migration {

	public function up()
	{
		Schema::create('kdUSM', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama', 100);
			$table->integer('jumlah_soal');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('kdUSM');
	}
}