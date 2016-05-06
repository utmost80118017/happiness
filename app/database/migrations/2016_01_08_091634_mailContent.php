<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MailContent extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mailcontent', function($table){

		    $table->increments('id');
				$table->string('title');
				$table->string('mailto');
				 
				$table->string('image')->nullable();
				$table->text('content');
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
		Schema::drop('mailcontent');
	}

}
