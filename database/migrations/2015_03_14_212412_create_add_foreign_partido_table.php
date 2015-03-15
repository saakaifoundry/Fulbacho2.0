<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddForeignPartidoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('partidos', function(Blueprint $table)
		{
			$table->foreign('sede_id')->references('id')->on('canchas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('partidos', function(Blueprint $table)
		{
			$table->dropForeign('sede_id');
		});
	}

}
