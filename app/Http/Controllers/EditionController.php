<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Edition;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Book $book)
    {
         // $book is resolved from {book} in the URL
        return view('editions.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        $data = $request->validate([
            'edition_number'    => ['nullable','string','max:50'],
            'publication_year'  => ['nullable','digits:4'],
            'isbn'              => ['nullable','string','max:20'],
            'publisher'         => ['nullable','string','max:255'],
            'price'             => ['nullable','numeric','min:0'],
        ]);

        $book->editions()->create($data);

        return redirect()->route('books.index')
            ->with('success', 'Edition created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Edition $edition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Edition $edition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Edition $edition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Edition $edition)
    {
        //
    }
}
