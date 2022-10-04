<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Book::create($request->all())) {
            return response()->json([
                'message' => 'Book successfully registered'
            ], 201);
        }

        return response()->json([
            'message' => 'Book register failed'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($book)
    {
        $book = Book::find($book);

        if ($book) {
            $book->testament;
            $book->verses;

            return $book;
        }

        return response()->json([
            'message' => 'Book not exists'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        $book = Book::find($book);

        if ($book) {
            $book->update($request->all());

            return $book;
        }

        return response()->json([
            'message' => 'Book not exists'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book)
    {
        if (Book::destroy($book)) {
            return response()->json([
                'message' => 'Book successfully removed'
            ], 201);
        }

        return response()->json([
            'message' => 'Book not exists'
        ], 404);
    }
}
