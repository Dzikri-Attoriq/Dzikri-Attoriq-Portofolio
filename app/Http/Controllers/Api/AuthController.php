<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
            'alamat' => 'required',
            'no' => 'required',
            'instagram' => 'required',
            'image' => 'required|file|image|max:2048',
        ]);
        
        if($validator->fails()) {
            return response()->json([
                'message' => 'invalid',
                'data' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
                'no' => $request->no,
                'instagram' => $request->instagram,
                'role' => '2',
                'image' => $request->file('image')->store('image-users')
            ]);
            DB::commit();

            $user = User::where('email', $request->email)->first();
            $token = $user->createToken($user->email)->plainTextToken;
            return response()->json([
                'message' => 'register success',
                'data' => [
                    'token_type' => 'Bearer',
                    'token' => $token,
                    'user' => [
                        'id' => $user->id,
                        'nama' => $user->nama,
                        'email' => $user->email,
                        'alamat' => $user->alamat,
                        'no' => $user->no,
                        'instagram' => $user->instagram,
                        'role' => $user->role,
                        'image' => $user->image,
                    ]
                ]
            ], 200);
        } catch (\Throwable $error) {
            Storage::delete($request->file('image')->store('image-users'));
            DB::rollBack();
            return response()->json([
                'message' => $error->getMessage()
            ], 200);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'invalid',
                'data' => $validator->getMessageBag()
            ], 422);
        }

        try {
            $user = User::where('email', $request->email)->first();
            if(!$user) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $cek_password = Hash::check($request->password, $user->password);
            if(!$cek_password) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $token = $user->createToken($user->email)->plainTextToken;
            return response()->json([
                'message' => 'login success',
                'data' => [
                    'token_type' => 'Bearer',
                    'token' => $token,
                    'user' => [
                        'id' => $user->id,
                        'nama' => $user->nama,
                        'email' => $user->email,
                        'alamat' => $user->alamat,
                        'no' => $user->no,
                        'instagram' => $user->instagram,
                        'role' => $user->role,
                        'image' => $user->image,
                    ]
                ]
            ], 200);
        } catch (\Throwable $error) {
            return response()->json([
                'message' => $error->getMessage()
            ], 500);
        }

    } 

    public function logout(Request $request) 
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'logout success'
        ], 201);
    }
}
