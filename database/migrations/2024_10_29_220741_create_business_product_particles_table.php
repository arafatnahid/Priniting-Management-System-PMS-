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
        Schema::create('business_product_particles', function (Blueprint $table) {
            $table->id();
            //

            $table->foreignId('product_id')->constrained('business_products')->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('particle_id')->nullable()->constrained('business_particles')->onUpdate('cascade')->onDelete('cascade');
            $table->string('particle_name')->nullable();
            $table->string('ma_no')->nullable();

            $table->foreignId('particle_value_id')->nullable()->constrained('business_particle_values')->onUpdate('cascade')->onDelete('cascade');
            $table->string('particle_value')->nullable();

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
        Schema::dropIfExists('business_product_particles');
    }
};
