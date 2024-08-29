@extends('layouts.app')

@section('content')
    <h1>Edit Tag</h1>
    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $tag->name }}" required>
        </div>
        <div>
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" value="{{ $tag->slug }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection