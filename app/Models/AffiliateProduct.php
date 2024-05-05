<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'title',
        'description',
        'brand',
        'image',
        'weight',
        'minimum_selling_price',
        'comission',
        'category_id',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function affiliate_category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function affiliatecountries()
    {
        return $this->belongsToMany(Country::class)->withPivot('stock');
    }
    public function affiliatesellers()
    {
        return $this->belongsToMany(Seller::class, 'affiliate_product_seller');
    }
}
