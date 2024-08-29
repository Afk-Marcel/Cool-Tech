<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Display a list of all articles
    public function index()
    {
        $articles = Article::with('category')->get();
        return view('articles.index', compact('articles'));
    }

    // Show a single article
    public function show($id)
    {
        $article = Article::with('category')->findOrFail($id);
        return view('articles.show', compact('article'));
    }

    // Show the form to create a new article
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }

    // Store a new article in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $article = Article::create($validatedData);
        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    // Show the form to edit an existing article
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    // Update an existing article in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $article = Article::findOrFail($id);
        $article->update($validatedData);
        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    // Delete an article
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->tags()->detach();
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }

    // Search for an article using the id
    public function searchById(Request $request)
    {
        $article = Article::findOrFail($request->input('article_id'));
        return redirect()->route('articles.show', $article->id);
    }
}