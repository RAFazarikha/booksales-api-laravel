<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No author found',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Authors',
            'data' => $authors
        ], 200);
    }

    public function addAuthor(Request $request){
        
        // 1. Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string|max:1000',
        ]);

        // 2. Jika validasi gagal, kembalikan response error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. Simpan gambar ke storage
        $image = $request->file('photo');
        $image->store('authors', 'public');

        // 4. Simpan data buku ke database
        $author = Author::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio,
        ]);

        // 5. Kembalikan response sukses
        return response()->json([
            'success' => true,
            'message' => 'Author Created',
            'data' => $author
        ], 201);
    }
}
