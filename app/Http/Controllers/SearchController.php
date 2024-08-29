<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::where('title', 'LIKE', "%{$query}%")
                            ->orWhere('content', 'LIKE', "%{$query}%")
                            ->get();

        return view('search.index', compact('articles', 'query'));
    }
}