<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActiveSellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::orderBy('id', 'desc')->get();
        return view('admin.sellers.index', compact('sellers'));
    }
    public function show($id)
    {
        $seller = Seller::findorfail($id);
        return view('admin.sellers.show', compact('seller'));
    }
    public function active(Request $request, $id)
    {
        $seller = Seller::findorfail($id);
        if ($seller->is_active == 1) {
            $seller->update(['is_active' => 0]);
        } else {
            $seller->update(['is_active' => 1]);
            Mail::to($seller->email)->send(new VerifyMail($seller->name));
        }

        return redirect()->back()->with(['Update' => 'update successfully']);
    }

    public function delete($id)
    {
        $seller = Seller::findorfail($id);
        $seller->delete();
        return redirect()->route('admin.sellers.index')->with(['Delete' => 'delete successfully']);
    }
}
