<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',

        ]);
        $cate = $request->name;
        if (Category::where('name', $cate)->exists()) {
            return redirect()->route('categories.index')->with(['Warning' => 'This Category already exists']);
        }
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index')->with(['Add' => 'Add successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findorfail($id);
        return view('admin.categories.show')->with(['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findorfail($id);
        return view('admin.categories.edit')->with(['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:100',

        ]);
        $category = Category::findorfail($id);
        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index')->with(['Update' => 'Update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Category::destroy($id);
            return redirect()->route('categories.index')->with(['Delete' => 'Delete successfully']);
        } catch (\Throwable $th) {
            return redirect()->route('categories.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
