<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AffiliateProduct;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class AffiliateProductController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $products = AffiliateProduct::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        $categories = Category::all();
        return view('seller.affiliateproduct.index', compact('products', 'countries', 'categories'));
    }
    public function show($id)
    {
        $product = AffiliateProduct::findorfail($id);
        return view('seller.affiliateproduct.show', compact('product'));
    }

    public function import($id)
    {
        $existingRecord = DB::table('affiliate_product_seller')
            ->where('affiliate_product_id', $id)
            ->where('seller_id', auth()->guard('seller')->user()->id)
            ->first();

        if ($existingRecord) {
            return redirect()->back()->with('Import', 'Already imported');
        }

        DB::table('affiliate_product_seller')->insert([
            'affiliate_product_id' => $id,
            'seller_id' => auth()->guard('seller')->user()->id,
        ]);

        return redirect()->back()->with('Import', 'Product Imported');
    }


    public function exclude($id)
    {
        $productSeller = DB::table('affiliate_product_seller')
            ->where('affiliate_product_id', $id)
            ->where('seller_id', auth()->guard('seller')->user()->id)
            ->first();

        if (!$productSeller) {
            return redirect()->back()->with('Exclude', 'Already Excluded');
        }

        DB::table('affiliate_product_seller')
            ->where('affiliate_product_id', $id)
            ->where('seller_id', auth()->guard('seller')->user()->id)
            ->delete();

        return redirect()->back()->with('Exclude', 'Product Excluded');
    }

    public function imported_products()
    {

        $seller = auth()->guard('seller')->user();
        $importedProducts = AffiliateProduct::whereHas('sellers', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);

        return view('seller.affiliateproduct.imported', compact('importedProducts'));
    }
    public function country_filter(Request $request, $country)
    {
        // Now you can use the $country variable to filter your products
        $products = AffiliateProduct::whereHas('affiliatecountries', function ($query) use ($country) {
            $query->where('countries.id', $country);
        })->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);

        $countries = Country::all();
        $categories = Category::all();
        return view('seller.affiliateproduct.index', compact('products', 'countries', 'categories'));
    }
    public function new_product()
    {
        $products = AffiliateProduct::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('seller.affiliateproduct.index', compact('products', 'countries', 'categories'));
    }

    public function suggested_product()
    {
        $affiliate_products = DB::table('affiliate_product_seller')->pluck('affiliate_product_id')->toArray();

        $products = AffiliateProduct::whereIn('id', $affiliate_products)->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('seller.affiliateproduct.index', compact('products', 'countries', 'categories'));
    }

    public function search(Request $request)
    {
        $products = AffiliateProduct::where('title', 'like', '%' . $request->title . '%')
            ->orWhere('sku', 'like', '%' . $request->title . '%')
            ->orWhere('category_id', $request->category_id)
            ->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('seller.affiliateproduct.index', compact('products', 'countries', 'categories'));
    }
}
