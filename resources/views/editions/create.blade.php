<x-app-layout>
  <h1 class="text-xl font-semibold">Add Edition for: {{ $book->title }}</h1>

  <form method="POST" action="{{ route('books.editions.store', $book) }}" class="mt-6">
    @csrf

    <label class="block">
      <span>Edition Number</span>
      <input name="edition_number" class="mt-1 block w-full" />
    </label>

    <label class="block mt-4">
      <span>Publication Year</span>
      <input name="publication_year" class="mt-1 block w-full" />
    </label>

    <label class="block mt-4">
      <span>ISBN</span>
      <input name="isbn" class="mt-1 block w-full" />
    </label>

    <label class="block mt-4">
      <span>Publisher</span>
      <input name="publisher" class="mt-1 block w-full" />
    </label>

    <label class="block mt-4">
      <span>Price</span>
      <input name="price" type="number" step="0.01" class="mt-1 block w-full" />
    </label>

    <button class="mt-6 px-4 py-2 rounded bg-green-600 text-white">Save Edition</button>
  </form>
</x-app-layout>