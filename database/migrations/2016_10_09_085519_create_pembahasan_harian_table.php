<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePembahasanHarianTable extends Migration {

	public function up()
	{
		Schema::create('pembahasanquiz', function(Blueprint $table) {
			$table->increments('id');
			$table->string('description', 300);
		});
	}

	public function down()
	{
		Schema::drop('pembahasanquiz');
	}
}