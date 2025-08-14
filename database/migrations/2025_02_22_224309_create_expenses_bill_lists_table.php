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
        Schema::create('expenses_bill_lists', function (Blueprint $table) {
            $table->id();
            //
            $table->foreignId('bill_id')->constrained('expenses_bills')->onUpdate('cascade')->onDelete('cascade');
            $table->string('bill_no')->nullable();
            $table->timestamp('billing_at')->nullable();
            $table->string('bill_item')->nullable();
            $table->string('bill_amount');
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
        Schema::dropIfExists('expenses_bill_lists');
    }
};
