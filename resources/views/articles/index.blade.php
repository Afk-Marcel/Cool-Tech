@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Title and Create Article button -->
        <h1 class="mb-4">Articles</h1>
        <!-- Table displaying all articles -->
        <table class="table table-striped table-hover">
            <!-- Table header with column names -->
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through articles and display each one in a table row -->
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td>
                            <!-- View button to show article details -->
                            <a href="{{ route('articles.show', $article) }}" class="btn btn-info btn-sm">View</a>
                            
                            <!-- Edit button to modify the article -->
                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <!-- Form to delete the article -->
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                                @csrf  <!-- CSRF token for security -->
                                @method('DELETE')  <!-- HTTP method spoofing to use DELETE for removal -->
                                
                                <!-- Delete button to remove the article -->
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('articles.create') }}" class="btn btn-success mt-3">Create Article</a>
    </div>
@endsection