

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Author Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Author Details</h3>
                        <x-author-details
                            :author="$author"
                        />
                </div>
                    {{-- Authors Book  --}}
                    {{-- You can choose to format this in such as way that suits your application--}}
                    {{-- Consider using components for parts of the UI and figuring out tailwind for styling--}}
                    <h4 class="font-semibold text-md mt-8">Author's Books</h4>
                    @if($author->books->isEmpty())
                        <p class="text-gray-600">No books for this author. Add a link here to 'Create Book' </p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($author->books as $book)
                            <div class="border p-4 rounded-lg shadow-md">
                                <a href="{{ route('books.show', $book) }}">
                                    <x-book-card :title="$book->title" :image="$book->image" />
                                </a>

                                @if(auth()->user()->role === 'admin')
                                    <!-- Edit and Delete Buttons -->
                                    <div class="mt-4 flex space-x-2">
                                        <!-- Edit Button route to books.edit and receives the $book object so it knows which book is for editing-->
                                        <a href="{{ route('books.edit', $book) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                            Edit
                                        </a>

                                        <!-- Delete Button (you need a form to send DELETE requests) -->
                                        <!-- Delete Button route to books.destroy,  receives the $book object so it knows which book is for editing-->
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
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
                        @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>


