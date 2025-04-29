<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Auth::user()->movies()->latest()->get();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'director' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);

        Auth::user()->movies()->create($validated);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully!');
    }

    public function show(Movie $movie)
    {
        if (Auth::user()->cannot('view', $movie)) {
            abort(403);
        }
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        if (Auth::user()->cannot('update', $movie)) {
            abort(403);
        }
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        if (Auth::user()->cannot('update', $movie)) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'director' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);

        $movie->update($validated);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    public function destroy(Movie $movie)
    {
        if (Auth::user()->cannot('delete', $movie)) {
            abort(403);
        }
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
}