<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* Line 23 gets all authors from the database and all the books related to each author
        SELECT * FROM authors;
        SELECT books.*
        FROM books
        INNER JOIN author_book ON books.id = author_book.book_id
        WHERE author_book.author_id = ?; */
        $authors = Author::with('books')->get();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('books.index')->with('error', 'Access denied.');
        }

        //if I want to add books to an author during Create Author, I will need all books
        $books = Book::all();
        return view('authors.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('authors.index')->with('error', 'Access denied.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'bio' => 'nullable|string|max:1000',
            'books' => 'array', // Optional list of books to attach
        ]);

         // Get the image from the request
         if ($request->hasFile('image')) {
            // give it image a unique name
            $imageName = time().'.'.$request->image->extension();
            // store the image in the public path
            // I've seperate folders for books and authors within the images directory
            $request->image->move(public_path('images/authors'), $imageName);
            // Add the unique image name to the validated data
            $validated['image'] = $imageName;
        }


        $author = Author::create($validated);


        // check to see if the user linked books to that Author
        if ($request->has('books')) {
            // attach() will create an entry in the pivot table for every book the author wrote
            $author->books()->attach($request->books);
        }

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        // This is a powerful function call. I have the $author object
        //  simply calling load() on the $author object will
        // get  all the authors book id from the pivot table
        // then get these books from the books table.
        $author->load('books');
        return (view('authors.show', compact('author')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //get all the books
        $books = Book::all();
        $authorBooks = $author->books->pluck('id')->toArray(); // IDs of associated books
        return view('authors.edit', compact('author', 'books', 'authorBooks'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'bio' => 'nullable|string|max:1000',
            'books' => 'array', // Optional list of books to sync
        ]);

        $author->update($validated);

        if ($request->has('books')) {
            $author->books()->sync($request->books);
        }

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->books()->detach(); // Detach all associated books
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
 }

