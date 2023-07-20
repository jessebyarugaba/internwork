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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->default('');
            $table->string('account_number')->default('');
            $table->string('contact_person_name')->default('');
            $table->string('contact_person_phone')->default('');
            $table->string('business_phone')->default('');
            $table->string('business_email')->default('');
            $table->string('pin')->default('');
            $table->double('available_balance')->default(0);
            $table->double('actual_balance')->default(0);
            $table->dateTime('created_on')->default(now());
            $table->timestamp('updated_on')->default(now())->useCurrent();
            $table->string('created_by')->default('');
            $table->unique('account_number', 'UK_customers_unique_account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
