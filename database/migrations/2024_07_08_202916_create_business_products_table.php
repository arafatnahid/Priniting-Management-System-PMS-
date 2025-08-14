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
        Schema::create('business_products', function (Blueprint $table) {
            $table->id();
            //
            $table->string('code');
            $table->string('name');
            $table->string('ma_no');
            $table->foreignId('category_id')->constrained('business_product_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->text('measurements');
            $table->foreignId('buyer_id')->constrained('business_buyers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('items');
            $table->text('specifications')->nullable();
            $table->string('source_file')->nullable();
            $table->string('approval_image')->nullable();
            $table->string('note')->nullable();

            $table->foreignId('approved_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            //
            $table->integer('sl');
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
        Schema::dropIfExists('business_products');
    }
};
