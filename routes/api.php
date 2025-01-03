<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TeransactionController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;






/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);

Route::get('check-stock/{id}', [BookController::class, 'checkStock']);
Route::post('transaction', [TransactionController::class, 'store']);
Route::get('transactions', [TransactionController::class, 'index']);
Route::post('payment', [PaymentController::class, 'process']);
Route::post('logout', [AuthController::class, 'logout']);
    
