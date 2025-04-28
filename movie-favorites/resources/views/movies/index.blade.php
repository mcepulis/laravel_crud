@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-between mb-4">
        <div class="col-md-6">
            <h1>My Favorite Movies</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('movies.create') }}" class="btn btn-primary">Add New Movie</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->title }} ({{ $movie->year }})</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $movie->director }}</h6>
                    <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                    <span class="badge bg-secondary">{{ $movie->genre }}</span>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('movies.show', $movie) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection