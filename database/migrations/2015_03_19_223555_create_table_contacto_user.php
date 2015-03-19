<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContactoUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacto_user', function(Blueprint $table)
		{
			$table->integer('contacto_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
			$table->timestamps();

			$table->foreign('contacto_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade');

  			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
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
		Schema::drop('contacto_user', function(Blueprint $table)
		{
			//
		});
	}
}
