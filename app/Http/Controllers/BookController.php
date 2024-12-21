<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        return Book::create($data);
    }

    public function checkStock($id)
    {
        $book = Book::find($id);
        if ($book) {
            return response()->json([
                'title' => $book->title,
                'stock' => $book->stock,
            ]);
        }

        return response()->json(['message' => 'Book not found'], 404);
    }
}
