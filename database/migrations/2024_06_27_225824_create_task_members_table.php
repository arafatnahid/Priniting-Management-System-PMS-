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
        Schema::create('task_members', function (Blueprint $table) {
            $table->id();
			//
			$table->foreignId('task_id')->constrained('task_managers')->onUpdate('cascade')->onDelete('cascade');
			$table->foreignId('member_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
			$table->string('name');   
			$table->string('phone');   
			$table->text('member_task')->nullable();   
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('task_members');
    }
};
