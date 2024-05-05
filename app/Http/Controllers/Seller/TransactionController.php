<?php

namespace App\Http\Controllers\Seller;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $seller = auth()->guard('seller')->user();
        $transactions = Transaction::where('seller_id', $seller->id)->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('seller.transactions.index', compact('transactions'));
    }

    public function show($id)
    {
        DB::table('notifications')->where('id', $id)->update([
            'read_at' => now(),
        ]);
        return redirect()->route('seller.transactions.index');
    }
}
