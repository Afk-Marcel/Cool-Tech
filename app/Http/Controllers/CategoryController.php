<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of the categories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store a newly created category in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'slug' => 'required|unique:categories|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show the form for editing the specified category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Update the specified category in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from storage
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    // Display the specified category and its articles
    public function show(Category $category)
    {
        // Fetch articles associated with the category
        $articles = $category->articles;

        // Return the view with the category and its articles
        return view('categories.show', compact('category', 'articles'));
    }

    public function searchByName(Request $request)
    {
        $category = Category::where('name', 'like', '%' . $request->input('category_name') . '%')->firstOrFail();
        return redirect()->route('categories.show', $category->id);
    }
}