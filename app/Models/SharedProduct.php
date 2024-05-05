<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'title',
        'description',
        'brand',
        'image',
        'weight',
        'unit_cost',
        'recommended_price',
        'category_id',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function shared_category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function sharedcountries()
    {
        return $this->belongsToMany(Country::class)->withPivot('stock');
    }
    public function sharedsellers()
    {
        return $this->belongsToMany(Seller::class, 'shared_product_seller');
    }
}
