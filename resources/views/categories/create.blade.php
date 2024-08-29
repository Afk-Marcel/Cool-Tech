@extends('layouts.app')

@section('content')
    <!-- Title of the page for creating a new category -->
    <h1>Create Category</h1>
    
    <!-- Form for submitting a new category -->
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf  <!-- CSRF token for security -->

        <!-- Input field for the category name -->
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <!-- Input field for the category slug -->
        <div>
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" required>
        </div>

        <!-- Submit button to create the new category -->
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection