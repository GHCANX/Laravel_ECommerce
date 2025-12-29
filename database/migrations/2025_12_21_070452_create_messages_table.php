<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

class CreateMessagesTable extends Migration {

	public function up()
	{
		Schema::create('messages', function(Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('sender_id')->constrained('users');
			$table->text('message');
			$table->timestamps();
			$table->softDeletes();

			$table->index(['order_id', 'sender_id']);
		});
	}

	public function down()
	{
		if (Schema::getConnection()->getDriverName() === 'sqlite') {
			DB::statement('PRAGMA foreign_keys = OFF;'); // temporarily disable FK checks
		}
				Schema::drop('messages');
				if (Schema::getConnection()->getDriverName() === 'sqlite') {
			DB::statement('PRAGMA foreign_keys = ON;'); // re-enable FK checks
		}
	}
}