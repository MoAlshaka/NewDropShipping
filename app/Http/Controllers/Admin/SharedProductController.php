<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SharedProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SharedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        $categories = Category::all();
        $products = SharedProduct::orderBy('id', 'DESC')->paginate(COUNT);
        return view('admin.sharedproduct.index', compact('products', 'countries', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $categories = Category::all();
        return view('admin.sharedproduct.create', compact('categories', 'countries'));
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
            'image' => 'required|mimes:png,jpg',
            'description' => 'required',
            'unit_cost' => 'required|numeric',
            'recommended_price' => 'required|numeric',
            'weight' => 'required|numeric',
            'category_id' => 'required',
            'country' => 'required|array',
            'country.*' => 'exists:countries,id',
            'stock' => 'required|array',
            'stock.*' => 'integer',
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


        $image = $request->file('image');

        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('assets/products/sharedproduct/images'), $imageName);

        // Create a new SharedProduct instance and store in database
        $product = SharedProduct::create([
            'sku' => $request->sku,
            'title' => $request->title,
            'brand' => $request->brand,
            'description' => $request->description,
            'image' =>  $imageName,
            'weight' => $request->weight,
            'unit_cost' => $request->unit_cost,
            'recommended_price' => $request->recommended_price,
            'category_id' => $request->category_id,
            'admin_id' => auth()->guard('admin')->user()->id,
        ]);

        foreach ($request->country as $index => $countryId) {
            $product->sharedcountries()->attach($countryId, ['stock' => $request->stock[$index]]);
        }

        // Return a success response
        return response()->json(['message' => 'Product created successfully'], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = SharedProduct::findorfail($id);
        return view('admin.sharedproduct.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = SharedProduct::findorfail($id);
        $categories = Category::all();
        $countries = Country::all();
        return view('admin.sharedproduct.edit', compact('product', 'categories', 'countries'));
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
            'unit_cost' => 'required|numeric',
            'recommended_price' => 'required|numeric',
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
        $product = SharedProduct::findOrFail($id);
        $oldImage = $product->image;

        if ($request->hasFile('image')) {

            if ($oldImage) {
                unlink(public_path('assets/products/sharedproduct/images/' . $oldImage));
            }

            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/products/sharedproduct/images'), $imageName);
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
            'unit_cost' => $request->unit_cost,
            'recommended_price' => $request->recommended_price,
            'category_id' => $request->category_id,
            'admin_id' => auth()->guard('admin')->user()->id,
        ]);

        $product->sharedcountries()->detach();
        foreach ($request->country as $index => $countryId) {
            $product->sharedcountries()->attach($countryId, ['stock' => $request->stock[$index]]);
        }
        return response()->json(['message' => 'Product Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = SharedProduct::findOrFail($id);

        if ($product->image) {
            $imagePath = public_path('assets/products/sharedproduct/images/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $product->delete();

        return redirect()->route('shared-products.index')->with('Delete', 'Product deleted successfully.');
    }

    public function country_filter(Request $request, $country)
    {


        // Now you can use the $selectedCountry variable to filter your products
        $products = SharedProduct::whereHas('sharedcountries', function ($query) use ($country) {
            $query->where('country_id', $country);
        })->orderBy('id', 'DESC')->paginate(COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('admin.sharedproduct.index', compact('products', 'countries', 'categories'));
    }
    public function new_product()
    {
        $products = SharedProduct::orderBy('id', 'DESC')->paginate(COUNT);
        $countries = Country::all();
        $categories = Category::all();
        return view('admin.sharedproduct.index', compact('products', 'countries', 'categories'));
    }
    public function suggested_product()
    {
        $shared_products = DB::table('shared_product_seller')->pluck('shared_product_id')->toArray();
        $products = SharedProduct::whereIn('id', $shared_products)->orderBy('id', 'DESC')->paginate(COUNT);
        $countries = Country::all();
        $categories = Category::all();

        return view('admin.sharedproduct.index', compact('products', 'countries', 'categories'));
    }
    public function search(Request $request)
    {
        $query = SharedProduct::query();

        if ($request->has('title') && $request->title != '') {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('sku') && $request->sku != '') {
            $query->orWhere('sku', 'like', '%' . $request->sku . '%');
        }

        if ($request->has('category_id') && $request->category_id != '') {
            $query->orWhere('category_id', $request->category_id);
        }

        $products = $query->orderBy('id', 'DESC')->paginate(COUNT);// Replace 10 with your desired number of items per page

        $countries = Country::all();
        $categories = Category::all();
        return view('admin.sharedproduct.index', compact('products', 'countries', 'categories'));
    }
}
