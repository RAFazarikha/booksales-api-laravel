<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No genre found',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Genres',
            'data' => $genres
        ], 200);
    }

    public function store(Request $request){
        
        // 1. Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // 2. Jika validasi gagal, kembalikan response error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. Simpan data buku ke database
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // 4. Kembalikan response sukses
        return response()->json([
            'success' => true,
            'message' => 'Genre Created',
            'data' => $genre
        ], 201);
    }

    public function show($id){
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Genre not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Genre',
            'data' => $genre
        ], 200);
    }

    public function update(Request $request, $id){
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Genre not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $genre->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Genre Updated',
            'data' => $genre
        ], 200);
    }

    public function destroy($id){
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Genre not found',
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Genre Deleted',
        ], 200);
    }

}
