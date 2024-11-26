

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Authors') }}
        </h2>

        <!-- Success message alert -->
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Authors :</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($authors as $author)
                        <div class="border p-4 rounded-lg shadow-md">
                            <a href="{{ route('authors.show', $author) }}">
                                <x-author-card :name="$author->name" :image="'images/authors/'. $author->image" />
                            </a>

                            @if(auth()->user()->role === 'admin')
                                <!-- Edit and Delete Buttons -->
                                <div class="mt-4 flex space-x-2">
                                    <!-- Edit Button route to authors.edit and receives the $authors object so it knows which authors is for editing-->
                                    <a href="{{ route('authors.edit', $author) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                        Edit
                                    </a>

                                    <!-- Delete Button (you need a form to send DELETE requests) -->
                                    <!-- Delete Button route to authors.destroy,  receives the $author object so it knows which author is for editing-->
                                    <form action="{{ route('authors.destroy', $author) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Author?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



