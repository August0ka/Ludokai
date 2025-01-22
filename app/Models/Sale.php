<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
