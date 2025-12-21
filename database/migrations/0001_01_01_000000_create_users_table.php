<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
			$table->string('pgp_fingerprint', 40)->unique()->index();
			$table->longText('pgp_publickey')->unique()->index();
			$table->string('role', 20)->default('customer');
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
        DB::statement('PRAGMA foreign_keys = OFF;');
        }
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');

        if (Schema::getConnection()->getDriverName() === 'sqlite') {
        DB::statement('PRAGMA foreign_keys = ON;');
        }
    }
};
