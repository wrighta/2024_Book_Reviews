{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Books') }}
        </h2>

            <!--alert-success is a component I created to display a success message that may be sent from the controller.
            for example when a book is deleted a message a message the message  "Book Deleted Successfully" will-->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Books:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($books as $book)
                        <a href="{{ route('books.show', $book) }}">
                            <x-book-card
                                :title="$book->title"
                                :image="$book->image"
                            />
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Books') }}
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
                    <h3 class="font-semibold text-lg mb-4">List of Books:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($books as $book)
                        <div class="border p-4 rounded-lg shadow-md">
                            <a href="{{ route('books.show', $book) }}">
                                <x-book-card :title="$book->title" :image="$book->image" />
                            </a>

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
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
