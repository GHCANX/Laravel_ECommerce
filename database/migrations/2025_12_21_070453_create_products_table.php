<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->id();
			$table->string('name', 20)->index();
			$table->boolean('active')->index()->default(TRUE);
			$table->string('description')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
if (Schema::getConnection()->getDriverName() === 'sqlite') {
    DB::statement('PRAGMA foreign_keys = OFF;'); // temporarily disable FK checks
}
		Schema::drop('products');
if (Schema::getConnection()->getDriverName() === 'sqlite') {
    DB::statement('PRAGMA foreign_keys = ON;'); // re-enable FK checks
}

	}
}