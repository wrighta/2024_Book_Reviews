<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all(); // Fetch all books
        return view('books.index', compact('books')); // Return the view with books
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }


    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'year' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the image is uploaded and handle it
        if ($request->hasFile('image')) {
            // $image = $request->file('image');

            // // Create a unique name for the image file
            // $imageName = time() . '.' . $image->getClientOriginalExtension();

            // // Store the image file using the Storage facade
            // // Files are stored under 'public/books' (this corresponds to storage/app/public/books)
            // $imagePath = $image->storeAs('image/books', $imageName, 'public'); // 'books' directory in 'storage/app/public'

            // // Get the publicly accessible URL
            // $imageUrl = Storage::url($imagePath);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/books'), $imageName);

        }



        // Create a book record in the database
        Book::create([
            'title' => $request->title,
            'description' => $request->description, // Fixed typo from 'descriptn'
            'year' => $request->year,
            'image' => $imageName, // Store the image URL in the DB
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Redirect to the index page with a success message
        return to_route('books.index')->with('success', 'Book created successfully!');
    }






    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
