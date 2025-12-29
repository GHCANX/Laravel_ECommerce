<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

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
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
        DB::statement('PRAGMA foreign_keys = OFF;');
        }
		Schema::drop('countries');
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
        DB::statement('PRAGMA foreign_keys = ON;');
        }

	}
}