<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStrips extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('strips', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->text('title')->nullable();
            $table->string('path');
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
		Schema::drop('strips');
	}

}
