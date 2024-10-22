<x-app-layout>
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
</x-app-layout>

