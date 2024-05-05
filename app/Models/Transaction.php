<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'payment_method',
        'account_number',
        'amount',
        'status',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
