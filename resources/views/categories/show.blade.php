@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display the category name -->
        <h1>{{ $category->name }}</h1>
        
        <!-- Display the category description -->
        <p>{{ $category->description }}</p>

        <!-- Section title for articles under this category -->
        <h2>Articles under this category</h2>

        <!-- Check if there are no articles in this category -->
        @if($articles->isEmpty())
            <p>No articles found in this category.</p>
        @else
            <!-- List articles if available -->
            <ul>
                @foreach($articles as $article)
                    <li>
                        <!-- Link to view each article's details -->
                        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                        <p>{{ Str::limit(strip_tags($article->content), 150) }}</p>
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- Button to navigate back to the categories list -->
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Back to Categories</a>
    </div>
@endsection