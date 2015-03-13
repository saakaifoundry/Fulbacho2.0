<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partido_user', function(Blueprint $table)
		{
			$table->integer('partido_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
			$table->timestamps();

			$table->foreign('partido_id')
				  ->references('id')
				  ->on('partidos')
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
		Schema::drop('partido_user', function(Blueprint $table)
		{
			//
		});
	}

}
