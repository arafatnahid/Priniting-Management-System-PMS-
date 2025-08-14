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
        Schema::create('task_managers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
			//
			$table->string('name');    
			$table->enum('priority', ['general', 'urgent', 'emergency']);
			$table->string('image')->nullable();    
			$table->string('file')->nullable();    
            $table->text('details')->nullable();
			$table->timestamp('date_from')->nullable();
            $table->timestamp('date_to')->nullable();
            $table->text('notes')->nullable();
			$table->integer('status')->default(0);
			$table->foreignId('approved_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
			//
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
        Schema::dropIfExists('task_managers');
    }
};
