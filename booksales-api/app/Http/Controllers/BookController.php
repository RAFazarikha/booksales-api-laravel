<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function store(Request $request){
        
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

    public function show($id){
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Book',
            'data' => $book
        ], 200);
    }

    public function update(Request $request, $id){
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found',
            ], 404);
        }

        // 1. Validasi data
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'description' => 'string|max:1000',
            'price' => 'numeric|min:0',
            'stock' => 'integer|min:0',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'exists:authors,id',
            'genre_id' => 'exists:genres,id',
        ]);

        // 2. Jika validasi gagal, kembalikan response error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. Siapkan data untuk update
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
        ];

        // 4. Handle cover photo update
        if ($request->hasFile('cover_photo')) {
            $image = $request->file('cover_photo');
            $image->store('books', 'public');

            if ($book->cover_photo) {
                // Hapus foto lama jika ada
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }

            $data['cover_photo'] = $image->hashName();
        }

        // 5. Update data buku ke database
        $book->update($data);

        // 6. Kembalikan response sukses
        return response()->json([
            'success' => true,
            'message' => 'Book Updated',
            'data' => $book
        ], 200);
    }

    public function destroy($id){
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found',
            ], 404);
        }

        // Hapus foto jika ada
        if ($book->cover_photo) {
            Storage::disk('public')->delete('books/' . $book->cover_photo);
        }

        // Hapus data buku dari database
        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book Deleted',
        ], 200);
    }
}
