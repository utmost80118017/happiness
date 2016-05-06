<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
		    $table->increments('id');
				$table->string('username');
				$table->string('email');
				$table->string('password');
				$table->string('remember_token')->nullable();
				$table->dateTime('created_at');
				$table->dateTime('updated_at');
				$table->dateTime('deleted_at')->nullable();


		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){

		Schema::drop('users');
		//
	}

}
