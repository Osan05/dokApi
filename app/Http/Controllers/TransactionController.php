<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = $request->validate([
            'buyer_name' => 'required|string',
            'book_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $book = Book::find($data['book_id']);
        if (!$book || $book->stock < $data['quantity']) {
            return response()->json(['message' => 'Insufficient stock'], 400);
        }

        $totalPrice = $book->price * $data['quantity'];

        $transaction = Transaction::create([
            'buyer_name' => $data['buyer_name'],
            'book_id' => $data['book_id'],
            'quantity' => $data['quantity'],
            'total_price' => $totalPrice,
        ]);

        $book->stock -= $data['quantity'];
        $book->save();

        return response()->json($transaction);
    }

    public function index()
    {
        return Transaction::with('book')->get();
    }
}
