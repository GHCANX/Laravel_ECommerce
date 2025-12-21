<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration {

	public function up()
	{
		Schema::create('countries', function(Blueprint $table) {
            $table->id();
			$table->char('iso3', 3)->unique();
			$table->string('name', 50)->unique();
			$table->boolean('active')->index();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('countries');
	}
}