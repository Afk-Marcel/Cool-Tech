@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Articles tagged with: {{ $tag->name }}</h1>

        @if($articles->isEmpty())
            <p>No articles found for this tag.</p>
        @else
            <ul>
                @foreach($articles as $article)
                    <li>
                        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                        - Created on: {{ $article->created_at ? $article->created_at->format('F j, Y') : 'Date not available' }}
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('tags.index') }}" class="btn btn-primary">Back to Tags</a>
    </div>
@endsection