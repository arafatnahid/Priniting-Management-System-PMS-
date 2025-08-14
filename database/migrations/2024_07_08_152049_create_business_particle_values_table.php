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
    Schema::create('business_particle_values', function (Blueprint $table) {
      $table->id();
      //
      $table->string('name');
      $table->string('slug');
      $table->foreignId('particle_id')->constrained('business_particles')->onUpdate('cascade')->onDelete('cascade');
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
    Schema::dropIfExists('particle_values');
  }
};
