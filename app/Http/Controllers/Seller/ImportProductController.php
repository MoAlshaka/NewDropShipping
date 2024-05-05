<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\AffiliateProduct;
use App\Models\SharedProduct;
use Illuminate\Http\Request;

class ImportProductController extends Controller
{
    public function imported_products()
    {
        $seller = auth()->guard('seller')->user();

        $importedAffiliateProducts = AffiliateProduct::whereHas('affiliatesellers', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })->get();

        $importedSharedProducts = SharedProduct::whereHas('sharedsellers', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })->get();



        return view('seller.importedproducts', compact('importedSharedProducts', 'importedAffiliateProducts'));
    }
}
