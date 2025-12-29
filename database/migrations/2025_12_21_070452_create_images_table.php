<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

class CreateImagesTable extends Migration {

	public function up()
	{
		Schema::create('images', function(Blueprint $table) {
            $table->id();
			$table->morphs('imageable');
			$table->string('type', length: 20)->index();
			$table->string('link',length:150)->unique();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('images');
	}
}