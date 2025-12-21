<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

class CreatePaymentsTable extends Migration {

	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
            $table->foreignId('invoice_id')->constrained();
			$table->string('status', 30)->index()->default('draft');
			$table->string('send_address', 106)->index();
			$table->string('deposit_address', 106)->unique()->nullable();
			$table->decimal('total_xmr',36,12)->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
if (Schema::getConnection()->getDriverName() === 'sqlite') {
    DB::statement('PRAGMA foreign_keys = OFF;'); // temporarily disable FK checks
}
		Schema::drop('payments');
if (Schema::getConnection()->getDriverName() === 'sqlite') {
    DB::statement('PRAGMA foreign_keys = ON;'); // re-enable FK checks
}
	}
}