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
        Schema::create('expenses_managers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            //

            $table->foreignId('manager_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status')->default(0);
            $table->double('amount', 16, 2);
            $table->double('return_amount', 16, 2)->nullable();
            $table->double('due_amount', 16, 2)->nullable();
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
        Schema::dropIfExists('expenses_managers');
    }
};
