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
        Schema::create('hrm_payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('code');
			//
			
			$table->string('month', 7);
			$table->foreignId('employee_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
			$table->foreignId('salary_id')->constrained('hrm_employee_salaries')->onUpdate('cascade')->onDelete('cascade');    
			$table->string('status');
			$table->string('paid_leave');
			$table->string('unpaid_leave');
			$table->double('total_allowance', 14,2);
			$table->double('total_deduction', 14,2);
			$table->double('total_attendance', 14,2);
			$table->double('total_duty', 14,2);
			$table->double('total_overtime', 14,2);
			$table->double('current_salary', 14,2);
			$table->double('net_salary', 14,2);
			
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
        Schema::dropIfExists('hrm_payrolls');
    }
};
