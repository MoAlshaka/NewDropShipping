<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\AffiliateProduct;
use App\Models\Country;
use App\Models\Lead;
use App\Models\SharedProduct;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::where('seller_id', auth()->guard('seller')->id())->get();
        return view('seller.leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seller = auth()->guard('seller')->user();
        $importedAffiliateProducts = AffiliateProduct::whereHas('affiliatesellers', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })->pluck('sku');

        $importedSharedProducts = SharedProduct::whereHas('sharedsellers', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })->pluck('sku');

        // Merge the two collections of SKUs
        $skus = $importedAffiliateProducts->merge($importedSharedProducts);

        $sku = implode(',', $skus->toArray());

        $country = Country::pluck('name');

        $countries = implode(',', $country->toArray());

        // Pass $sku and $countries to the view
        return view('seller.leads.create', compact('sku', 'countries'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Filter out rows where all indices are empty
        $filteredData = array_filter($request->input('data'), function ($row) {
            // Filter out empty values in the row
            $filteredRow = array_filter($row);
            // Check if the filtered row is empty
            return !empty($filteredRow);
        });

        // If there are no valid rows after filtering, return an error
        if (empty($filteredData)) {
            return response()->json(['errors' => ['data' => ['At least one row of data is required.']]], 422);
        }
        $errors = [];
        foreach ($filteredData as $index => $row) {

            if (empty($row[1])) {
                $errors['store_reference'] = "Store reference is required";
            }
            if (empty($row[3])) {
                $errors['warehouse'] = "Warehouse is required";
            }
            if (empty($row[4])) {
                $errors['customer_name'] = "Customer name is required";
            }
            if (empty($row[5])) {
                $errors['customer_phone'] = "Customer phone is required";
            }
            if (!empty($row[7])) {
                if (!filter_var($row[7], FILTER_VALIDATE_EMAIL)) {

                    $errors['customer_email'] = "Customer email mmust be valid";
                }
            }
            if (empty($row[8])) {
                $errors['customer_country'] = "Customer country is required";
            }
            if (empty($row[11])) {
                $errors['item_sku'] = "Item SKU is required";
            }
            if (!empty($row[12])) {
                if (!is_numeric($row[12])) {
                    $errors['quantity'] = "Quantity must be a number.";
                } else {
                    $maxInt = PHP_INT_MAX;
                    if ($row[12] > $maxInt) {
                        $errors['quantity'] = "Quantity exceeds the maximum value of integer type.";
                    }
                }
            } else {
                $errors['quantity'] = "Quantity is required.";
            }
            if (!empty($row[13])) {
                if (!is_numeric($row[13])) {
                    $errors['total'] = "Total must be a number.";
                }
            } else {
                $errors['total'] = "Total is required.";
            }
            if (empty($row[14])) {
                $errors['currency'] = "Currency is required";
            }

            // If there are errors for this row, add them to the allErrors array
            if (!empty($errors)) {
                $allErrors["data.$index"] = $errors;
            }
        }
        if (empty($errors)) {
            foreach ($filteredData as $index => $row) {
                // If no errors, create Lead record
                Lead::create([
                    'order_date' => $row[0] ?? now()->toDateString(),
                    'store_reference' => $row[1],
                    'store_name' => $row[2] ?? null,
                    'warehouse' => $row[3],
                    'customer_name' => $row[4],
                    'customer_phone' => $row[5],
                    'customer_mobile' => $row[6] ?? null,
                    'customer_email' => $row[7] ?? null,
                    'customer_country' => $row[8],
                    'customer_city' => $row[9] ?? null,
                    'customer_address' => $row[10] ?? null,
                    'item_sku' => $row[11],
                    'quantity' => $row[12],
                    'total' => $row[13],
                    'currency' => $row[14],
                    'notes' => $row[15] ?? null,
                    'seller_id' => auth()->guard('seller')->id(),
                ]);
            }
        }

        // If there are errors for any row, return all errors
        if (!empty($allErrors)) {
            return response()->json(['errors' => $allErrors], 422);
        }

        return response()->json(['Add' => 'Lead stored successfully'], 200);
    }





    //return redirect()->route('leads.index')->with(['Add' => 'Lead created successfully.']);

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seller = auth()->guard('seller')->user();
        $countries = Country::all();
        $lead = Lead::findorfail($id);
        $importedAffiliateProducts = AffiliateProduct::whereHas('affiliatesellers', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })->pluck('sku');

        $importedSharedProducts = SharedProduct::whereHas('sharedsellers', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })->pluck('sku');

        // Merge the two collections of SKUs
        $skus = $importedAffiliateProducts->merge($importedSharedProducts);
        return view('seller.leads.edit', compact('lead', 'countries', 'skus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadRequest $request, string $id)
    {
        $lead = Lead::findorfail($id);
        if ($request->order_date !== null) {
            $order_date = $request->order_date;
        }
        $lead->update([
            'order_date' => $order_date ?? $lead->order_date,
            'store_reference' => $request->store_reference,
            'store_name' => $request->store_name,
            'warehouse' => $request->warehouse,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_mobile' => $request->customer_mobile,
            'customer_address' => $request->customer_address,
            'customer_city' => $request->customer_city,
            'customer_country' => $request->customer_country,
            'item_sku' => $request->item_sku,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'currency' => $request->currency,

        ]);
        return redirect()->route('leads.index')->with(['Update' => 'Lead updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lead = Lead::findorfail($id);
        if ($lead->status == 'pending' && $lead->seller_id == auth()->guard('seller')->id()) {
            $lead->delete();
            return redirect()->route('leads.index')->with(['Delete' => 'Lead deleted successfully.']);
        }
        return redirect()->route('leads.index')->with(['Warning' => 'Lead cannot be deleted.']);
    }
}
