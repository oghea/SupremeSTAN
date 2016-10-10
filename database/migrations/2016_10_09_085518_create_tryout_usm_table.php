<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTryoutUsmTable extends Migration {

	public function up()
	{
		Schema::create('tryoutUSM', function(Blueprint $table) {
			$table->increments('id');
			$table->string('judul', 50);
			$table->timestamp('publishdate');
			$table->boolean('publish')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('tryoutUSM');
	}
}