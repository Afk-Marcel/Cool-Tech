@extends('layouts.app')

@section('content')
    <!-- Title of the page for editing an existing article -->
    <h1>Edit Article</h1>
    
    <!-- Form for updating the article -->
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf  <!-- CSRF token for security -->
        @method('PUT')  <!-- HTTP method spoofing to use PUT for updates -->

        <!-- Input field for the article title, pre-filled with current title -->
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $article->title }}" required>
        </div>

        <!-- Textarea for the article content, pre-filled with current content -->
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content" required>{{ $article->content }}</textarea>
        </div>

        <!-- Dropdown for selecting the category of the article, pre-selecting the current category -->
        <div>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                <!-- Loop through categories and create an option for each, marking the current category as selected -->
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
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

        <!-- Submit button to update the article -->
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection