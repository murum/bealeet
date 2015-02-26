<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conversation_message', function(Blueprint $table)
		{
			$table->integer('conversation_id')->unsigned()->index();
			$table->foreign('conversation_id')
			      ->references('id')
			      ->on('conversations')
			      ->onUpdate('cascade')
			      ->onDelete('cascade');

			$table->integer('writer_id')->nullable()->unsigned()->index();
			$table->foreign('writer_id')
			      ->references('id')
			      ->on('users')
			      ->onUpdate('set null')
			      ->onDelete('cascade');

			$table->text('message');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conversation_message');
	}

}
