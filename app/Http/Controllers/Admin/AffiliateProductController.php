<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\AffiliateProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AffiliateProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        $categories = Category::all();
        $products = AffiliateProduct::orderBy('id', 'DESC')->paginate(COUNT);
        return view('admin.affiliateproduct.index', compact('products', 'countries', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $categories = Category::all();
        return view('admin.affiliateproduct.create', compact('categories', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'sku' => 'required|max:100',
            'brand' => 'required|max:100',
            'description' => 'required',
            'minimum_selling_price' => 'required|numeric',
            'comission' => 'required|numeric',
            'weight' => 'required|numeric',
            'category_id' => 'required',
            'country' => 'required|array',
            'country.*' => 'exists:countries,id',
            'stock' => 'required|array',
            'stock.*' => 'required|integer',
            'image' => 'required|mimes:png,jpg',
        ]);
        if ($validator->fails()) {
            $errors = [];

            // Loop through each error message for each field
            foreach ($validator->errors()->all() as $fieldError) {
                // Extract the field name from the error message
                preg_match('/^The (\w+) field/', $fieldError, $matches);

                // Add the error message under the 'message' key
                $errors[] = ['message' => $fieldError];
                break; // Stop after adding the first error for each field
            }

            // Return the formatted errors in JSON response
            return response()->json(['errors' => $errors]);
        }
        // Get the image file
        $image = $request->file('image');
        // Generate a unique image name
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        // Move the uploaded image to the storage directory
        $image->move(public_path('assets/products/affiliateproduct/images'), $imageName);
        $product = AffiliateProduct::create([
            'sku' => $request->sku,
            'title' => $request->title,
            'brand' => $request->brand,
            'description' => $request->description,
            'image' =>  $imageName,
            'weight' => $request->weight,
            'minimum_selling_price' => $request->minimum_selling_price,
            'comission' => $request->comission,
            'category_id' => $request->category_id,
            'admin_id' => auth()->guard('admin')->user()->id,
        ]);
        foreach ($request->country as $index => $countryId) {
            $product->affiliatecountries()->attach($countryId, ['stock' => $request->stock[$index]]);
        }

        return response()->json(['message' => 'Product created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = AffiliateProduct::findorfail($id);
        return view('admin.affiliateproduct.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = AffiliateProduct::findorfail($id);
        $categories = Category::all();
        $countries = Country::all();
        return view('admin.affiliateproduct.edit', compact('product', 'categories', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'sku' => 'required|max:100',
            'brand' => 'required|max:100',
            'description' => 'required',
            'minimum_selling_price' => 'required|numeric',
            'comission' => 'required|numeric',
            'weight' => 'required|numeric',
            'category_id' => 'required',
            'country' => 'required|array',
            'country.*' => 'exists:countries,id',
            'stock' => 'required|array',
            'stock.*' => 'required|integer',
            'image' => 'nullable|mimes:png,jpg',
        ]);
        if ($validator->fails()) {
            $errors = [];

            // Loop through each error message for each field
            foreach ($validator->errors()->all() as $fieldError) {
                // Extract the field name from the error message
                preg_match('/^The (\w+) field/', $fieldError, $matches);

                // Add the error message under the 'message' key
                $errors[] = ['message' => $fieldError];
                break; // Stop after adding the first error for each field
            }

            // Return the formatted errors in JSON response
            return response()->json(['errors' => $errors]);
        }
        $product = AffiliateProduct::findOrFail($id);
        $oldImage = $product->image;

        if ($request->hasFile('image')) {

            if ($oldImage) {
                unlink(public_path('assets/products/affiliateproduct/images/' . $oldImage));
            }

            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/products/affiliateproduct/images'), $imageName);
        } else {
            $imageName = $oldImage;
        }

        $product->update([
            'sku' => $request->sku,
            'title' => $request->title,
            'brand' => $request->brand,
            'description' => $request->description,
            'image' => $imageName,
            'weight' => $request->weight,
            'minimum_selling_price' => $request->minimum_selling_price,
            'comission' => $request->comission,
            'category_id' => $request->category_id,
            'admin_id' => auth()->guard('admin')->user()->id,
        ]);

        $product->affiliatecountries()->detach();
        foreach ($request->country as $index => $countryId) {
            $product->affiliatecountries()->attach($countryId, ['stock' => $request->stock[$index]]);
        }

        return response()->json(['message' => 'Product Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = AffiliateProduct::findOrFail($id);

        if ($product->image) {
            $imagePath = public_path('assets/products/affiliateproduct/images/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $product->delete();

        return redirect()->route('affiliate-products.index')->with('Delete', 'Product deleted successfully.');
    }

    public function country_filter(Request $request, $country)
    {


        // Now you can use the $selectedCountry variable to filter your products
        $products = AffiliateProduct::whereHas('affiliatecountries', function ($query) use ($country) {
            $query->where('country_id', $country);
        })->orderBy('id', 'DESC')->paginate(COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('admin.affiliateproduct.index', compact('products', 'countries', 'categories'));
    }

    public function new_product()
    {
        $products = AffiliateProduct::orderBy('id', 'DESC')->paginate(COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('admin.affiliateproduct.index', compact('products', 'countries', 'categories'));
    }

    public function suggested_product()
    {
        $affiliate_products = DB::table('affiliate_product_seller')->pluck('affiliate_product_id')->toArray();

        $products = AffiliateProduct::whereIn('id', $affiliate_products)->orderBy('id', 'DESC')->paginate(COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('admin.affiliateproduct.index', compact('products', 'countries', 'categories'));
    }

    public function search(Request $request)
    {
        $products = AffiliateProduct::where('title', 'like', '%' . $request->title . '%')
            ->orWhere('sku', 'like', '%' . $request->title . '%')
            ->orWhere('category_id', $request->category_id)
            ->orderBy('id', 'DESC')->paginate(COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('admin.affiliateproduct.index', compact('products', 'countries', 'categories'));
    }
}
