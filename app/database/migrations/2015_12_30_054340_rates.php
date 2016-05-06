<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){

		Schema::create('rates', function($table){

		    $table->increments('id');
				$table->string('title');
				$table->string('image');
				$table->text('content');
				
				$table->date('update_day');
				$table->dateTime('created_at');
				$table->dateTime('updated_at');
				$table->dateTime('deleted_at')->nullable();

		});

		Schema::create('rate_pics', function($table){

		    $table->increments('id');
				$table->integer('rate_id');
				$table->string('category_id');
				$table->string('image');
				$table->string('name');
				$table->dateTime('created_at');
				$table->dateTime('updated_at');
				$table->dateTime('deleted_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rates');
		Schema::drop('rate_pics');
	}

}
