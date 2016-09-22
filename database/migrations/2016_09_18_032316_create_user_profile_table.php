<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('quote',100)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender',10)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('parent_name',100)->nullable();
            $table->string('parent_phone',20)->nullable();
            $table->string('line_id',50)->nullable();
            $table->string('address',100)->nullable();
            $table->string('state',20)->nullable();
            $table->string('city',50)->nullable();
            $table->string('zip',20)->nullable();
            $table->string('school_origin',50)->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->timestamps();
            // foreign keys
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profile');
    }
}
