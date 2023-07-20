<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTransaction extends Model
{
    use HasFactory;

    protected $table = 'customer_transactions';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function transactionsLog()
    {
        return $this->belongsTo(TransactionsLog::class, 'transaction_id');
    }
}
