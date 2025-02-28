<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagseguroTransaction extends Model
{
    protected $fillable = [
        'pagseguro_transaction_id',
        'product_id',
        'user_id',
        'status',
        'payment_link',
        'payment_method',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
