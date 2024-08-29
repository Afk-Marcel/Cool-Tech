@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Title and Create Category button -->
        <h1 class="mb-4">Categories</h1>
        <!-- Table displaying all categories -->
        <table class="table table-bordered table-hover">
            <!-- Table header with column names -->
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through categories and display each one in a table row -->
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <!-- Button to view articles associated with the category -->
                            <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-info btn-sm">View Articles</a>
                            
                            <!-- Button to navigate to the category edit page -->
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <!-- Form to delete the category -->
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf  <!-- CSRF token for security -->
                                @method('DELETE')  <!-- HTTP method spoofing to use DELETE for removal -->
                                
                                <!-- Delete button to remove the category -->
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('categories.create') }}" class="btn btn-success mt-3">Create Category</a>
    </div>
@endsection