<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SearchController;
use App\Models\Article;

// Routes for Categories
Route::resource('categories', CategoryController::class);

// Routes for Tags
Route::resource('tags', TagController::class);

// Routes for Articles
Route::resource('articles', ArticleController::class);

// Route for the Legal page (static view)
Route::view('/legal', 'legal')->name('legal');

// Route for the Search page
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

// Homepage route 
Route::get('/', function () {
    return view('layouts.app'); 
})->name('home');

// Route for About Us page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Route to display articles by category
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/tags/{tag:slug}', [TagController::class, 'show'])->name('tags.show');

// Search routes
Route::get('/search/article', [ArticleController::class, 'searchById'])->name('articles.searchById');
Route::get('/search/category', [CategoryController::class, 'searchByName'])->name('categories.searchByName');
Route::get('/search/tag', [TagController::class, 'searchByName'])->name('tags.searchByName');

Route::get('/', function () {
    // Fetch the latest 5 articles only when loading the homepage
    $latestArticles = Article::latest()->take(5)->get();
    return view('layouts.app', compact('latestArticles'));
})->name('home');