<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'flag', 'shipping_cost'
    ];



    public function sheared_products()
    {
        return $this->belongsToMany(SharedProduct::class);
    }
    public function affiliate_products()
    {
        return $this->belongsToMany(AffiliateProduct::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
