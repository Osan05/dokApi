<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'buyer_name', 
        'book_id', 
        'quantity', 
        'total_price', 
        'payment_status', 
        'payment_method'
    ];
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
