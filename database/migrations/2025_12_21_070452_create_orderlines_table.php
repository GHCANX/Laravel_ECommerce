<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

class CreateOrderlinesTable extends Migration {

	public function up()
	{
		Schema::create('orderlines', function(Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained();
			$table->decimal('quantity', 8,2);
			$table->decimal('rate', 8,2);
			$table->decimal('subtotal', 8,2);
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
if (Schema::getConnection()->getDriverName() === 'sqlite') {
    DB::statement('PRAGMA foreign_keys = OFF;'); // temporarily disable FK checks
}
		Schema::drop('orderlines');
if (Schema::getConnection()->getDriverName() === 'sqlite') {
    DB::statement('PRAGMA foreign_keys = ON;'); // re-enable FK checks
}
	}
}