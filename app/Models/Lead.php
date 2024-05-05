<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_date',
        'store_reference',
        'store_name',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_mobile',
        'customer_address',
        'customer_city',
        'customer_country',
        'item_sku',
        'warehouse',
        'quantity',
        'total',
        'currency',
        'status',
        'seller_id',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
