@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display the title of the article -->
        <h1>{{ $article->title }}</h1>
        
        <!-- Display the category of the article -->
        <p><strong>Category:</strong> {{ $article->category->name }}</p>
        
        <!-- Display the content of the article -->
        <p>{{ $article->content }}</p>
        
        <!-- Display the creation date of the article in a formatted style -->
        <p><small class="text-muted">Created on: {{ $article->created_at->format('F j, Y') }}</small></p>
        
        <!-- Button to navigate to the article edit page -->
        <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">Edit Article</a>
    </div>
@endsection