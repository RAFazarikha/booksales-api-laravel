<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index(){

        $transactions = Transaction::with(['user', 'book'])->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No transaction found',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All transactions',
            'data' => $transactions
        ], 200);
    }

    public function store(Request $request){
        // 1. validasi
        $validator = Validator::make(request()->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // 2. generate order number
        $uniqueCode = 'ORD-' . strtoupper(uniqid());

        // 3. ambil user yang login & cek login
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated',
            ], 401);
        }

        // 4. cari data buku berdasarkan id
        $book = Book::find($request->book_id);

        // 5. cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient stock for the requested book',
            ], 400);
        }

        // 6. hitung total harga
        $totalAmount = $book->price * $request->quantity;

        // 7. kurangi stok buku
        $book->stock -= $request->quantity;
        $book->save();

        // 8. simpan transaksi
        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully',
            'data' => $transaction
        ], 201);
    }

    public function show($id){
        $transaction = Transaction::with(['user', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Transaction by ID',
            'data' => $transaction
        ], 200);
    }

    public function destroy($id){
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
            ], 404);
        }

        // Kembalikan stok buku
        $book = Book::find($transaction->book_id);
        $book->stock += $transaction->quantity;
        $book->save();

        // Hapus transaksi
        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully',
        ], 200);
    }

    public function update(Request $request, $id){
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
            ], 404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Cek stok buku
        $book = Book::find($transaction->book_id);
        $quantityOld = $transaction->total_amount / $book->price;

        if ($book->stock + $quantityOld < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient stock for the requested book',
            ], 400);
        }

        // Update stok buku
        $book->stock += $quantityOld - $request->quantity;
        $book->save();

        // Update transaksi
        $transaction->total_amount = $book->price * $request->quantity;
        $transaction->save();

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully',
            'data' => $transaction
        ], 200);
    }
}
