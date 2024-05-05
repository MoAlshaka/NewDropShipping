<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'DESC')->paginate(COUNT);
        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sellers = Seller::all();
        return view('admin.transactions.create', compact('sellers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'seller_id' => 'required|exists:sellers,id',
            'payment_method' => 'required|exists:sellers,payment_method',
            'account_number' => 'required|exists:sellers,account_number',
            'amount' => 'required|numeric',
            'status' => 'required|max:50',
        ]);

        Transaction::create([
            'seller_id' => $request->seller_id,
            'payment_method' => $request->payment_method,
            'account_number' => $request->account_number,
            'amount' => $request->amount,
            'status' => $request->status,
            'admin_id' => auth()->guard('admin')->user()->id,
        ]);

        return redirect()->route('transactions.index')->with(['Add' => 'Add Transaction Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::findorfail($id);
        return view('admin.transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sellers = Seller::all();
        $transaction = Transaction::findorfail($id);
        return view('admin.transactions.edit', compact('sellers', 'transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'seller_id' => 'required|exists:sellers,id',
            'payment_method' => 'required|exists:sellers,payment_method',
            'account_number' => 'required|exists:sellers,account_number',
            'amount' => 'required|numeric',
            'status' => 'required|max:50',
        ]);
        $transaction = Transaction::findorfail($id);
        $transaction->update([
            'seller_id' => $request->seller_id,
            'payment_method' => $request->payment_method,
            'account_number' => $request->account_number,
            'amount' => $request->amount,
            'status' => $request->status,
            'admin_id' => auth()->guard('admin')->user()->id,
        ]);

        return redirect()->route('transactions.index')->with(['Update' => 'Update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findorfail($id);
        $transaction->delete();
        return redirect()->route('transactions.index')->with(['Delete' => 'Delete successfully']);
    }

    public function get_seller_info($id)
    {
        $data = Seller::where("id", $id)->pluck("payment_method", "account_number");
        return json_encode($data);
    }
}
