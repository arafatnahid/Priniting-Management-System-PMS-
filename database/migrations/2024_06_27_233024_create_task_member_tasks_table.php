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
        Schema::create('task_member_tasks', function (Blueprint $table) {
            $table->id();
			//
			
            $table->foreignId('task_id')->constrained('task_managers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('member_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('task_member_id')->constrained('task_members')->onUpdate('cascade')->onDelete('cascade');
			
			$table->text('details')->nullable();
			$table->string('image')->nullable();
			$table->string('file')->nullable();
			$table->integer('status')->default(0);
			$table->text('reson')->nullable();
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
        Schema::dropIfExists('task_member_tasks');
    }
};
