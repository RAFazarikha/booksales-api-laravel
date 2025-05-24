<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        // 1. validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // 2. jika validasi gagal, kembalikan response error
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. buat user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 4. kembalikan response sukses
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User registered successfully',
                'data' => $user
            ], 201);
        }

        // 5. jika gagal, kembalikan response error
        return response()->json([
            'success' => false,
            'message' => 'User registration failed',
        ], 409);
    }


    public function login(Request $request){
        // 1. Validasi data
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // 2. Jika validasi gagal, kembalikan response error
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. Cek kredensial
        $credentials = $request->only('email', 'password');

        // 4. Jika kredensial salah, kembalikan response error
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized Email and Password',
            ], 401);
        }

        // 5. Kembalikan response sukses dengan token
        return response()->json([
            'success' => true,
            'message' => 'User logged in successfully',
            'user' => auth()->guard('api')->user(),
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request){
        try{
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully',
            ], 200);
        } catch (JWTException $e){
            return response()->json([
                'success' => false,
                'message' => 'Failed to logout, please try again',
            ], 500);
        }
    }
}
