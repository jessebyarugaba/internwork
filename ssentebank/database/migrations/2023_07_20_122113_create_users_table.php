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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('phone')->default('');
            $table->string('email')->default('');
            $table->string('designation')->default('');
            $table->string('business_email')->default('');
            $table->string('password')->default('');
            $table->dateTime('created_on')->default(now());
            $table->timestamp('updated_on')->default(now())->useCurrent();
            $table->unique('email', 'UK_users_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
