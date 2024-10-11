<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <img src="/path-to-your-logo.png" alt="Logo" class="w-16 h-16 mx-auto">
                    <h1 class="text-center text-2xl font-bold mt-4">Welcome to the Book Review App!</h1>
                    <p class="text-center">Explore and review your favorite books!</p>

                    <div class="mt-6 text-center">
                        <a href="{{ route('books.index') }}" class="text-blue-600 underline">
                            View All Books
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
