<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthenticantionController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request -> all(), [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()]);
        }

        $user = User::create([
            'role_id' => 3,
            'user_name' => $request->user_name,
            'user_photo' => 'https://demosserve.000webhostapp.com/storage/images/default_photo_profile.png',
            'password' => Hash::make($request->password),
            'user_email' => $request->user_email,
            'user_bio' => null,
            'user_phone' => null,
            'user_verify' => false,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => null
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Register success',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'data' => $user,
        ]);
        
    }

    public function login(Request $request)
    {
        if(! Auth::attempt($request->only('user_email', 'password'))){
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('user_email', $request->user_email)->firstOrFail();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials incorect.']
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login Success',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'data' => $user
        ]);
    }

    public function loginGoogle(Request $request)
    {
        $user = User::where('user_email', $request->account_email)->first();

        if (!$user) {
            $user = User::create([
                'role_id' => 3,
                'user_name' => $request->account_name,
                'user_photo' => $request->account_photo,
                'password' => Hash::make($request->account_id),
                'user_email' => $request->account_email,
                'user_bio' => null,
                'user_phone' => null,
                'user_verify' => false,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => null
            ]);
        } elseif (!Hash::check($request->account_id, $user->password)) {
            return response()->json([
                'message' => 'You may have registered in another method'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login Sucess',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'data' => $user
        ]);

        
    }

    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout success'
        ]);
    }
}
