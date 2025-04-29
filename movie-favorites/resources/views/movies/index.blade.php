<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Favorite Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end mb-6">
                <a href="{{ route('movies.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Add New Movie') }}
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($movies as $movie)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="text-lg font-semibold">{{ $movie->title }} ({{ $movie->year }})</h3>
                            <p class="text-sm text-gray-600 mt-1">Directed by {{ $movie->director }}</p>
                            <p class="mt-2 text-gray-800">{{ Str::limit($movie->description, 100) }}</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-semibold bg-gray-200 text-gray-800 rounded-full">{{ $movie->genre }}</span>

                            <div class="flex justify-end mt-4 space-x-2">
                                <a href="{{ route('movies.show', $movie) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                <a href="{{ route('movies.edit', $movie) }}" class="text-green-600 hover:text-green-800">Edit</a>
                                <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>