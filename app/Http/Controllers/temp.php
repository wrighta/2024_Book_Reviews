
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('authors.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4">Add Author</a>

                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Bio</th>
                                <th>Books</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->bio }}</td>
                                    <td>
                                        @foreach($author->books as $book)
                                            <span>{{ $book->title }}</span><br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('authors.edit', $author) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

