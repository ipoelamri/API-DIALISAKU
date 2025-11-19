<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16|unique:users,nik',
            'name' => 'required|string',
            'jenis_kelamin' => 'required|string|max:1',
            'alamat' => 'required|string',
            'umur' => 'required|integer',
            'pendidikan' => 'required|string',
            'bb_awal' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
            'pendidikan' => $request->pendidikan,
            'bb_awal' => $request->bb_awal,
            'password' => $request->password,
        ]);

        $user->jadwal()->create([]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => '000',
            'message' => 'User registered successfully',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',

        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('nik', $request->nik)->first();

        if ( !$user ||! Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => '001',
                'message' => 'Password atau NIK salah',
            ], 200);
        }


        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => '000',
            'message' => 'Login berhasil!',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => '000',
            'message' => 'Logout successful',
        ], 200);
    }
}
