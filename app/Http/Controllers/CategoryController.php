<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));

    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Category created successfully.');
    }

    public function show(Category $brand)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $brand)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $Category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $brand)
    {
        $brand->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Category deleted successfully.');
    }

}
