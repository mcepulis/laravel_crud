<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Movie Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Debug Output -->
                    <div style="background: yellow; padding: 10px; margin-bottom: 20px;">
                        Movie ID: {{ $movie->id }} | Title: {{ $movie->title }}
                    </div>

                    <!-- Movie Content -->
                    <div class="mb-4">
                        <h3 class="text-2xl font-bold">{{ $movie->title }} ({{ $movie->year }})</h3>
                        <p class="text-gray-600 mt-1">Directed by {{ $movie->director }}</p>
                        <span class="inline-block mt-2 px-3 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded-full">
                            {{ $movie->genre }}
                        </span>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-lg font-semibold">Description</h4>
                        <p class="mt-2 text-gray-800">{{ $movie->description ?? 'No description available.' }}</p>
                    </div>

                    <div class="flex items-center justify-end space-x-4 mt-6">
                        <a href="{{ route('movies.edit', $movie) }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('movies.destroy', $movie) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('movies.index') }}" 
                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>