<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return view('admin.leads.index', compact('leads'));
    }

    public function edit($id)
    {
        $lead = Lead::findorfail($id);
        return view('admin.leads.edit', compact('lead'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);
        $lead = Lead::findorfail($id);
        $lead->update([
            'status' => $request->status
        ]);
        return redirect()->route('admin.leads.index')->with(['Update' => 'Lead status updated successfully']);
    }
    public function delete($id)
    {
        $lead = Lead::findorfail($id);
        if ($lead->status == 'pending') {
            $lead->delete();
            return redirect()->route('admin.leads.index')->with(['Delete' => 'Lead deleted successfully.']);
        }
        return redirect()->route('admin.leads.index')->with(['Warning' => 'Lead cannot be deleted.']);
    }
}
