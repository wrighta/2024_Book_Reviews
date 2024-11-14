<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, Book $book)
    {

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Create the review associated with the book and user
        $book->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'book_id' => $book->id
        ]);

        return redirect()->route('books.show', $book)->with('success', 'Review added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        // // Check if user is the owner or an admin
        if (auth()->user()->id !== $review->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('books.index')->with('error', 'Access denied.');
        }


        // I am passing the book and the review object to the view,as they are both needed
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        // Your update logic here, such as validation and updating review fields
        $review->update($request->only(['rating', 'comment']));

        return redirect()->route('books.show', $review->book_id)
                         ->with('success', 'Review updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        // Return to list of all books
        // However, what if you wanted to return to book show view
        // you'd need to pass the book to this view
        return to_route('books.index')->with('success','Review Deleted');

    }
}
