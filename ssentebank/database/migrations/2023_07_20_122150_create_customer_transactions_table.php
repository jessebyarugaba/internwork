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
        Schema::create('customer_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaction_id')->unsigned()->nullable();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->double('amount')->default(0);
            $table->string('narrative')->default('');
            $table->enum('type', ['UNIDENTIFIED', 'CR', 'DR'])->default('UNIDENTIFIED');
            $table->double('balance_before')->default(0);
            $table->double('balance_after')->default(0);
            $table->dateTime('created_on')->default(now());
            $table->timestamp('updated_on')->default(now())->useCurrent();
            $table->dateTime('completion_date')->default(now());
            $table->foreign('customer_id', 'FK_customer_tx_customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('transaction_id', 'FK_customer_tx_transaction_id')->references('id')->on('transactions_log')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_transactions');
    }
};
