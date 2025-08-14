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
        Schema::create('hrm_leaves', function (Blueprint $table) {
            $table->id();
            $table->string('code');
			//
			
            $table->foreignId('employee_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
			$table->timestamp('date_from')->nullable();
            $table->timestamp('date_to')->nullable();
            $table->string('leave_duration')->nullable();
			$table->enum('leave_type', ['paid', 'unpaid'])->nullable();
            $table->foreignId('type_id')->constrained('hrm_leave_types')->onUpdate('cascade')->onDelete('cascade');
            $table->text('reason')->nullable();
            $table->integer('status')->default(0);
            $table->foreignId('approved_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
           
			//
			$table->integer('sl');
			$table->boolean('visibility')->default(false);
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
        Schema::dropIfExists('hrm_leaves');
    }
};
