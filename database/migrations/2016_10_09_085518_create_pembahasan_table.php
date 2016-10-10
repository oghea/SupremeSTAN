<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePembahasanTable extends Migration {

	public function up()
	{
		Schema::create('pembahasanUSM', function(Blueprint $table) {
			$table->increments('id');
			$table->string('description', 300);
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('pembahasanUSM');
	}
}