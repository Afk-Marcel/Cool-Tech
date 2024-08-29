<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Display a listing of the tags
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    // Show the form for creating a new tag
    public function create()
    {
        return view('tags.create');
    }

    // Store a newly created tag in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:255',
            'slug' => 'required|unique:tags|max:255',
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

   // Display the specified tag and its articles
   public function show(Tag $tag)
    {
        // Fetch articles associated with the tag
        $articles = $tag->articles;

        // Return the view with the tag and its articles
        return view('tags.show', compact('tag', 'articles'));
    }

    // Show the form for editing the specified tag
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    // Update the specified tag in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    // Remove the specified tag from storage
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }

    public function searchByName(Request $request)
    {
        $tag = Tag::where('name', 'like', '%' . $request->input('tag_name') . '%')->firstOrFail();
        return redirect()->route('tags.show', $tag->id);
    }
}