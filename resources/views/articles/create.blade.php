@extends('layouts.app')

@section('content')
    <!-- Title of the page for creating a new article -->
    <h1>Create Article</h1>
    
    <!-- Form for submitting a new article -->
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf  <!-- CSRF token for security -->

        <!-- Input field for the article title -->
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>

        <!-- Textarea for the article content -->
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content" required></textarea>
        </div>

        <!-- Dropdown for selecting the category of the article -->
        <div>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                <!-- Loop through categories and create an option for each -->
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

       <!-- Tag Checkboxes -->
       <div class="mb-3">
                <label class="form-label">Tags</label>
                <div class="d-flex flex-wrap">
                    @foreach($tags as $tag)
                        <div class="form-check me-3 mb-2">
                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                   id="tag-{{ $tag->id }}" 
                                   {{ isset($article) && $article->tags->contains($tag->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tag-{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

        <!-- Submit button to create the new article -->
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection