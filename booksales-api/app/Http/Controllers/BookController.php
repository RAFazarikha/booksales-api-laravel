<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        if ($books->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No book found',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Books',
            'data' => $books
        ], 200);
    }

    public function addBook(Request $request){
        
        // 1. Validasi data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
        ]);

        // 2. Jika validasi gagal, kembalikan response error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. Simpan gambar ke storage
        $image = $request->file('cover_photo');
        $image->store('books', 'public');

        // 4. Simpan data buku ke database
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(),
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
        ]);

        // 5. Kembalikan response sukses
        return response()->json([
            'success' => true,
            'message' => 'Book Created',
            'data' => $book
        ], 201);
    }
}
