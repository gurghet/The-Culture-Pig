<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPageAndPublishingDateToStrips extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('strips', function(Blueprint $table)
		{
			$table->integer('page')->unsigned()->nullable();
            $table->date('publish')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('strips', function(Blueprint $table)
		{
			$table->dropColumn('page');
            $table->dropColumn('publish');
		});
	}

}
