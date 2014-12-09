<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoordinatesToBalloon extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('balloons', function(Blueprint $table)
		{
			$table->integer('pos_x')->nullable();
   			$table->integer('pos_y')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('balloons', function(Blueprint $table)
		{
			$table->dropColumn('pos_x');
			$table->dropColumn('pos_y');            
		});
	}

}
