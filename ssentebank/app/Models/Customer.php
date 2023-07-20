<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //use HasFactory;
    protected $table = 'customers';

    // Define the relationship with transactions_log table
    public function transactionsLog()
    {
        return $this->hasMany(TransactionsLog::class, 'customer_id');
    }

    // Define the relationship with customer_transactions table
    public function customerTransactions()
    {
        return $this->hasMany(CustomerTransaction::class, 'customer_id');
    }
}
