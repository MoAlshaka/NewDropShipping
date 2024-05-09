<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return view('admin.countries.index')->with(['countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'shipping_cost' => 'required|numeric',
            'flag' => 'required|max:100|mimes:svg'
        ]);
        $flag = $request->file('flag');
        $flagName = uniqid() . '.' . $flag->getClientOriginalExtension();
        $request->flag->move(public_path('assets/countries/flags'), $flagName);
        Country::create([
            'name' => $request->name,
            'shipping_cost' => $request->shipping_cost,
            'flag' => $flagName,
        ]);
        return redirect()->route('countries.index')->with(['Add' => 'Add Country successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $country = Country::findorfail($id);
        return view('admin.countries.show')->with(['country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $country = Country::findorfail($id);
        return view('admin.countries.edit')->with(['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'shipping_cost' => 'required|numeric',
            'flag' => 'nullable|max:100|mimes:svg'
        ]);
        $country = Country::findorfail($id);
        $oldFlag = $country->flag;

        if ($request->hasFile('flag')) {

            if ($oldFlag) {
                unlink(public_path('assets/countries/flags/' . $oldFlag));
            }

            $flag = $request->file('flag');
            $flagName = uniqid() . '.' . $flag->getClientOriginalExtension();
            $flag->move(public_path('assets/countries/flags'), $flagName);
        } else {
            $flagName = $oldFlag;
        }




        $country->update([
            'name' => $request->name,
            'shipping_cost' => $request->shipping_cost,
            'flag' => $flagName,
        ]);
        return redirect()->route('countries.index')->with(['Update' => 'Update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $country = Country::findorfail($id);
            unlink(public_path('assets/countries/flags/' . $country->image));
            $country->delete();
            return redirect()->route('countries.index')->with(['Delete' => 'Delete successfully']);
        } catch (\Exception $e) {
            return redirect()->route('countries.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
