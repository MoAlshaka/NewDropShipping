<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SharedProduct;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class SharedProductController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $categories = Category::all();
        $products = SharedProduct::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('seller.sharedproduct.index', compact('products', 'countries', 'categories'));
    }

    public function show($id)
    {
        $product = SharedProduct::findorfail($id);
        return view('seller.sharedproduct.show', compact('product'));
    }

    public function import($id)
    {
        $existingRecord = DB::table('shared_product_seller')
            ->where('shared_product_id', $id)
            ->where('seller_id', auth()->guard('seller')->user()->id)
            ->first();

        if ($existingRecord) {
            return redirect()->back()->with('Import', 'Already imported');
        }

        DB::table('shared_product_seller')->insert([
            'shared_product_id' => $id,
            'seller_id' => auth()->guard('seller')->user()->id,
        ]);

        return redirect()->back()->with('Import', 'Product Imported');
    }


    public function exclude($id)
    {
        $productSeller = DB::table('shared_product_seller')
            ->where('shared_product_id', $id)
            ->where('seller_id', auth()->guard('seller')->user()->id)
            ->first();

        if (!$productSeller) {
            return redirect()->back()->with('Exclude', 'Already Excluded');
        }

        DB::table('shared_product_seller')
            ->where('shared_product_id', $id)
            ->where('seller_id', auth()->guard('seller')->user()->id)
            ->delete();

        return redirect()->back()->with('Exclude', 'Product Excluded');
    }

    public function imported_products()
    {

        $seller = auth()->guard('seller')->user();
        $importedProducts = SharedProduct::whereHas('sellers', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);

        return view('seller.sharedproduct.imported', compact('importedProducts'));
    }
    public function country_filter(Request $request, $country)
    {
        // Now you can use the $country variable to filter your products
        $products = SharedProduct::whereHas('sharedcountries', function ($query) use ($country) {
            $query->where('countries.id', $country);
        })->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);

        $countries = Country::all();
        $categories = Category::all();
        return view('seller.sharedproduct.index', compact('products', 'countries', 'categories'));
    }
    public function new_product()
    {
        $products = SharedProduct::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('seller.sharedproduct.index', compact('products', 'countries', 'categories'));
    }
    public function suggested_product()
    {
        $shared_products = DB::table('shared_product_seller')->pluck('shared_product_id')->toArray();
        $products = SharedProduct::whereIn('id', $shared_products)->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        $countries = Country::all();
        $categories = Category::all();

        return view('seller.sharedproduct.index', compact('products', 'countries', 'categories'));
    }
    public function search(Request $request)
    {
        $products = SharedProduct::where('title', 'like', '%' . $request->title . '%')
            ->orWhere('sku', 'like', '%' . $request->title . '%')
            ->orWhere('category_id', $request->category_id)
            ->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('seller.sharedproduct.index', compact('products', 'countries', 'categories'));
    }
}
