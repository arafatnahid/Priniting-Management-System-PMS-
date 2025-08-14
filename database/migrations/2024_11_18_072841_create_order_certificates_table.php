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
        Schema::create('order_certificates', function (Blueprint $table) {
            $table->id();
            //
            $table->foreignId('product_id')->constrained('business_products')->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('po_id')->constrained('orders')->onUpdate('cascade')->onDelete('cascade');

            $table->date('mfgDate');
            $table->date('expDate');

            $table->longText('certificate')->nullable();

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
        Schema::dropIfExists('order_certificates');
    }
};
