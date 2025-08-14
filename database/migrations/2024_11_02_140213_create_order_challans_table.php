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
        Schema::create('order_challans', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            //
            $table->string('challan_no');
            $table->date('date');
            $table->foreignId('po_id')->constrained('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('business_products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('buyer_id')->constrained('business_buyers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('delivery_address')->nullable();
            $table->string('packet_size');
            $table->string('quantity');
            $table->string('approval_quantity')->nullable();
            $table->string('approval_file')->nullable();
            $table->string('bill_no')->nullable();
            $table->longText('label')->nullable();

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
        Schema::dropIfExists('order_challans');
    }
};
