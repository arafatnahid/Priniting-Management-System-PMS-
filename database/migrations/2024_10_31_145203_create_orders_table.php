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
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->string('code');
      //
      $table->string('po_number');
      $table->timestamp('date');
      $table->foreignId('product_id')->constrained('business_products')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('buyer_id')->constrained('business_buyers')->onUpdate('cascade')->onDelete('cascade');
      $table->string('po_rate');
      $table->string('quantity');


      $table->foreignId('approved_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
      //
      $table->boolean('visibility')->default(true);
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
    Schema::dropIfExists('orders');
  }
};
