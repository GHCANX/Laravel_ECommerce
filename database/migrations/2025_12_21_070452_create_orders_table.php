<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('country_id')->constrained();
			$table->string('status', 30)->index()->default('draft');
			$table->text('address_details')->nullable();
			$table->decimal('subtotal', 8,2)->default('0');
			$table->softDeletes();
			$table->timestamps();
			$table->index(['country_id', 'status']);
		});
	}

	public function down()
	{
if (Schema::getConnection()->getDriverName() === 'sqlite') {
    DB::statement('PRAGMA foreign_keys = OFF;'); // temporarily disable FK checks
}
		Schema::drop('orders');
if (Schema::getConnection()->getDriverName() === 'sqlite') {
    DB::statement('PRAGMA foreign_keys = ON;'); // re-enable FK checks
}
	}
}