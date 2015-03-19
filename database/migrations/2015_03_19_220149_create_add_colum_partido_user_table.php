<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddColumPartidoUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('partido_user', function(Blueprint $table)
		{
            $table->boolean('confirmado')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('partido_user', function(Blueprint $table)
		{
			$table->dropColumn('confirmado');
		});
	}

}
