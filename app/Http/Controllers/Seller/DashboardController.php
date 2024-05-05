<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $leads = Lead::where('seller_id', auth()->guard('seller')->id())->count();
        $approvedLeadsCount = Lead::where('seller_id', auth()->guard('seller')->id())->where('status', 'approved')->count();
        $deliveredLeadsCount = Lead::where('seller_id', auth()->guard('seller')->id())->where('status', 'delivered')->count();

        return view('seller.dashboard', compact('leads', 'approvedLeadsCount', 'deliveredLeadsCount'));
    }
}
