<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('id', 'DESC')->paginate(COUNT);
        return view('admin.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $image = $request->file('image');
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/offers/images'), $imageName);

        Offer::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'admin_id' => auth()->guard('admin')->user()->id,
        ]);
        return redirect()->route('offers.index')->with(['Add' => 'Add Offer successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offer = Offer::findorfail($id);
        return view('admin.offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offer = Offer::findorfail($id);
        return view('admin.offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);
        $offer = Offer::findorfail($id);
        $oldImage = $offer->image;

        if ($request->hasFile('image')) {

            if ($oldImage) {
                unlink(public_path('assets/offers/images/' . $oldImage));
            }

            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/offers/images'), $imageName);
        } else {
            $imageName = $oldImage;
        }

        $offer->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'start_date' => $request->start_date ?? $offer->start_date,
            'end_date' => $request->end_date ?? $offer->end_date,
            'admin_id' => auth()->guard('admin')->user()->id,
        ]);
        return redirect()->route('offers.index')->with(['Update' => 'Update Offer successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $offer = Offer::findorfail($id);
        if ($offer->image) {
            $imagePath = public_path('assets/offers/images/' . $offer->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $offer->delete();
        return redirect()->route('offers.index')->with(['Delete' => 'Delete Offer successfully']);
    }
}
