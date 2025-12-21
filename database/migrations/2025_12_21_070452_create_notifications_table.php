<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
			$table->string('type',20)->index();
			$table->morphs('notifiable');
			$table->text('data');
			$table->timestamp('read_at')->nullable()->index();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}