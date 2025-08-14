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
        Schema::create('hrm_payroll_details', function (Blueprint $table) {
            $table->id();
			//
			
			$table->string('month', 7);
			$table->foreignId('employee_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
			$table->foreignId('payroll_id')->constrained('hrm_payrolls')->onUpdate('cascade')->onDelete('cascade');
			$table->double('hra_allowance', 14,2)->nullable();
			$table->double('conveyance_allowance', 14,2)->nullable();
			$table->double('medical_allowance', 14,2)->nullable();
			$table->double('bonus', 14,2)->nullable();
			$table->double('other_allowances', 14,2)->nullable();
			$table->double('pf', 14,2)->nullable();
			$table->double('professional_tax', 14,2)->nullable();
			$table->double('tds', 14,2)->nullable();
			$table->double('loans', 14,2)->nullable();
			$table->double('other_deduction', 14,2)->nullable();
			
			$table->foreignId('approved_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
			//
            $table->foreignId('assigned_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('updated_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('deleted_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrm_payroll_details');
    }
};
