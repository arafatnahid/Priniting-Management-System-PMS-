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
        Schema::create('expenses_bills', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            //
            $table->integer('invoice_no');
            $table->timestamp('billing_at')->nullable();
            $table->foreignId('category_id')->constrained('expenses_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subcategory_id')->nullable()->constrained('expenses_subcategories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('payment_type_id')->constrained('settings_payment_methods')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('voucher_no')->nullable();
            $table->double('amount', 14, 2);
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->string('approval_file')->nullable();
            $table->string('status')->default(0)->comment('0=Pending, 1=Approved, 2=Rejected');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('expenses_bills');
    }
};
