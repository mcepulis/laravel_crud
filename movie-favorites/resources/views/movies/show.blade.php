@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Movie Details</div>

                <div class="card-body">
                    <div class="mb-3">
                        <h3>{{ $movie->title }} ({{ $movie->year }})</h3>
                        <p class="text-muted">Directed by {{ $movie->director }}</p>
                        <span class="badge bg-primary">{{ $movie->genre }}</span>
                    </div>

                    <div class="mb-3">
                        <h5>Description</h5>
                        <p>{{ $movie->description ?? 'No description available.' }}</p>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-primary me-md-2">Edit</a>
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ route('movies.index') }}" class="btn btn-secondary ms-md-2">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection