@props(['action', 'method', 'author', 'books', 'authorBooks'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="name" class="block">Name</label>
        <input type="text" name="name" id="name" value="{{ $author->name ?? '' }}" class="w-full">
    </div>

    <div class="mb-4">
        <label for="bio" class="block">Bio</label>
        <textarea name="bio" id="bio" class="w-full">{{ $author->bio ?? '' }}</textarea>
    </div>

    <div class="mb-4">
        <label for="image" class="block">Image</label>
        <input type="file" name="image" id="image">
    </div>

    <div class="mb-4">
        <label class="block mb-2">Books</label>
        <div class="grid grid-cols-3 gap-4">
            @foreach($books as $book)
                <div class="flex items-center">
                    <input type="checkbox" name="books[]" id="book_{{ $book->id }}" value="{{ $book->id }}"
                        @if(isset($authorBooks) && in_array($book->id, $authorBooks)) checked @endif>
                    <label for="book_{{ $book->id }}" class="ml-2">{{ $book->title }}</label>
                </div>
            @endforeach
        </div>
    </div>

    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Save</button>
</form>
