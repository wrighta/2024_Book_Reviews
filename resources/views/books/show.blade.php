{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">{{ $book->title }}</h3>
                    <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    <p>{{ $book->description }}</p>
                    <p>Published in {{ $book->year }}</p>
{{--
                    Not Implemented yet till CA 2 --}}
                    {{-- <p>Authors:
                        @foreach($book->authors as $author)
                            {{ $author->name }}
                        @endforeach

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
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Book Details</h3>
                        <x-book-details
                            :title="$book->title"
                            :image="$book->image"
                            :year="$book->year"
                            :description="$book->description"
                        />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


