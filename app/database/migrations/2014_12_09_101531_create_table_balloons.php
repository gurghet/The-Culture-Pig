<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBalloons extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ballons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->text('text')->nullable();
            $table->string('lang');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('strip_id')->unsigned();
            $table->foreign('strip_id')->references('id')->on('strips');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ballons');
	}

}
