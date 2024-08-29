@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Search</h1>

        {{-- Search by Article ID --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('articles.searchById') }}" method="GET">
                    <div class="form-group mb-3">
                        <label for="article_id" class="form-label">Search by Article ID</label>
                        <input type="text" name="article_id" id="article_id" class="form-control" placeholder="Enter Article ID" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 w-100">Search</button>
                </form>
            </div>
        </div>

        {{-- Search by Category Name --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('categories.searchByName') }}" method="GET">
                    <div class="form-group mb-3">
                        <label for="category_name" class="form-label">Search by Category Name</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Enter Category Name" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 w-100">Search</button>
                </form>
            </div>
        </div>

        {{-- Search by Tag Name --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('tags.searchByName') }}" method="GET">
                    <div class="form-group mb-3">
                        <label for="tag_name" class="form-label">Search by Tag Name</label>
                        <input type="text" name="tag_name" id="tag_name" class="form-control" placeholder="Enter Tag Name" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 w-100">Search</button>
                </form>
            </div>
        </div>
    </div>
@endsection