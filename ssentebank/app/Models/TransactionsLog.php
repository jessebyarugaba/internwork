<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsLog extends Model
{
    //use HasFactory;
    protected $table = 'transactions_log';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function customerTransactions()
    {
        return $this->hasMany(CustomerTransaction::class, 'transaction_id');
    }
}
