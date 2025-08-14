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
        Schema::create('settings_companies', function (Blueprint $table) {
            $table->id();
			$table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->text('short_details')->nullable();
            $table->text('logo')->nullable()->comment('{favicon:, frontend_1:, frontend_2:, dashboard_1:, dashboard_2: }');
            $table->text('email')->nullable()->comment('{contact:, support:, sales:}');
            $table->text('phone')->nullable()->comment('{contact_1:, contact_2:, support:, sales}');
            $table->text('whatsapp')->nullable()->comment('{contact_1:, contact_2:, support:, sales}');
            $table->text('telephone')->nullable()->comment('{contact_1:, contact_2:, support:, sales}');
            $table->text('fax')->nullable()->comment('{contact_1:, contact_2:, support:, sales}');
            $table->text('address')->nullable()->comment('{headoffice:, corporateoffice}');
            $table->text('social_links')->nullable()->comment('{facebook:,linkedin:, twitter:, instagram:, pinterest:, youtube:}');
            $table->text('gmap')->nullable();
			$table->text('messenger')->nullable();
            $table->text('branch')->nullable();
            $table->text('meta')->nullable()->comment('{keywords:,description:}');
            $table->longText('others')->nullable()->comment('{header:,footer:}');
			$table->foreignId('assigned_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('updated_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings_companies');
    }
};
