<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGameIdToSkills extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('skills', function(Blueprint $table)
		{
			$table->integer('game_id')->after('id')->unsigned()->nullable();

			$table->foreign('game_id')
				->references('id')->on('games')
				->onUpdate('cascade')
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
		Schema::table('skills', function(Blueprint $table)
		{
			$table->dropColumn('game_id');
		});
	}

}
