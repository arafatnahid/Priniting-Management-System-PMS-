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
        Schema::create('hrm_employee_details', function (Blueprint $table) {
            $table->id();
			//
			
			$table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
			$table->string('employee_id');      
			$table->string('image')->nullable();
			$table->string('nid')->nullable();
			$table->string('cv')->nullable();
			$table->string('gender')->nullable();
			$table->enum('blood_group', ['a+', 'a-', 'b+', 'b-', 'o+', 'o-', 'ab+', 'ab-'])->nullable();
			$table->timestamp('dob_at')->nullable();   
			$table->text('present_address');
			$table->text('permanent_address')->nullable();
			$table->timestamp('joining_at')->nullable();
			$table->foreignId('shift_id')->nullable()->constrained('hrm_shifts')->onUpdate('cascade')->onDelete('cascade');
			$table->foreignId('department_id')->nullable()->constrained('hrm_departments')->onUpdate('cascade')->onDelete('cascade');
			$table->foreignId('designation_id')->nullable()->constrained('hrm_designations')->onUpdate('cascade')->onDelete('cascade');
			$table->boolean('status')->default(false);
			
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
        Schema::dropIfExists('hrm_employee_details');
    }
};
