@extends('layouts.app')

@section('content')
    <!-- Title of the page for editing an existing category -->
    <h1>Edit Category</h1>
    
    <!-- Form for updating the category -->
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf  <!-- CSRF token for security -->
        @method('PUT')  <!-- HTTP method spoofing to use PUT for updates -->

        <!-- Input field for the category name, pre-filled with the current name -->
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        </div>

        <!-- Input field for the category slug, pre-filled with the current slug -->
        <div>
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" value="{{ $category->slug }}" required>
        </div>

        <!-- Submit button to update the category -->
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection