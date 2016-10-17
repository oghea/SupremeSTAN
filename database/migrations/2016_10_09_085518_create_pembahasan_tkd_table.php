<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePembahasanTkdTable extends Migration {

	public function up()
	{
		Schema::create('pembahasanTKD', function(Blueprint $table) {
			$table->increments('id');
			$table->text('description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('pembahasanTKD');
	}
}