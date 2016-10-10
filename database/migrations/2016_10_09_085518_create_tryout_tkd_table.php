<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTryoutTkdTable extends Migration {

	public function up()
	{
		Schema::create('tryoutTKD', function(Blueprint $table) {
			$table->increments('id');
			$table->date('publish_date');
			$table->boolean('published')->default(0);
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('tryoutTKD');
	}
}