@extends('layouts.app')

@section('content')
    <h1>Create Tag</h1>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection