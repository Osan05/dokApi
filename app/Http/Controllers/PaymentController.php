<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function process(Request $request)
    {
        $data = $request->validate([
            'transaction_id' => 'required|integer',
            'payment_method' => 'required|string',
        ]);

        $teransaction = Transaction::find($data['transaction_id']);
        if (!$teransaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $teransaction->update([
            'payment_status' => 'paid',
            'payment_method' => $data['payment_method'],
        ]);

        return response()->json($teransaction);
    }
}
