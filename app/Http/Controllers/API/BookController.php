<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = auth()->user()->books;
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'page_count' => 'required|integer',
        ]);

        $book = auth()->user()->books()->create($request->all());
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'page_count' => 'required|integer',
            'status' => 'in:Reading,Read,To Read',
        ]);

        $book->update($request->all());
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }

    /**
     * Update the reading progress of the specified resource in storage.
     */
    public function updateReadingProgress(Request $request, Book $book)
    {
        $request->validate([
            'page_number' => 'required|integer',
        ]);

        $book->update([
            'status' => 'Reading',
            'page_number' => $request->page_number,
        ]);

        return response()->json($book);
    }
}
