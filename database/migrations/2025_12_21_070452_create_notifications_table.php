<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function (Blueprint $table) {
			$table->uuid('id')->primary(); // REQUIRED by Laravel
			$table->string('type')->index();
			$table->morphs('notifiable');

			// Your extensions
			$table->string('source', 30)->index(); // message, order, payment, system
			$table->uuid('source_uuid')->nullable()->index(); // public-safe reference

			$table->json('data');
			$table->timestamp('read_at')->nullable()->index();
			$table->timestamps();
		});	}

	public function down()
	{
		Schema::drop('notifications');
	}
}