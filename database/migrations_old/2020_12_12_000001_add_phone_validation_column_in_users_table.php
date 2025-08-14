<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    
       Schema::table('users', function (Blueprint $table) {
			if(!Schema::hasColumn('users', 'phone')) {
				$table->string('phone')->nullable()->unique()->after('email');
			}
			if(!Schema::hasColumn('users', 'phone_verified_at')) {
				$table->string('phone_verified_at')->nullable()->after('phone');
			}
			if(!Schema::hasColumn('users', 'otp')) {
				$table->string('otp')->nullable()->after('phone_verified_at');
			}
			
	   });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
