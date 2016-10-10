<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectUsmTable extends Migration {

	public function up()
	{
		Schema::create('subjectUSM', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama', 10);
			$table->string('Deskripsi', 50);
			$table->integer('durasi');
		});
	}

	public function down()
	{
		Schema::drop('subjectUSM');
	}
}