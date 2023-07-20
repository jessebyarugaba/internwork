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
        Schema::create('transactions_log', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->double('amount')->default(0);
            $table->string('narrative')->default('');
            $table->string('reference')->default('');
            $table->string('status')->default('');
            $table->string('payment_gateway_reference')->default('');
            $table->text('trace')->nullable();
            $table->dateTime('created_on')->default(now());
            $table->timestamp('updated_on')->default(now())->useCurrent();
            $table->dateTime('completion_date')->default(now());
            $table->unique('reference', 'UK_tx_log_external_reference');
            $table->foreign('customer_id', 'FK_tx_log_customer_id')->references('id')->on('customers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions_log');
    }
};
