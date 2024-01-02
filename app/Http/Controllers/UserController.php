<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        return new UserResource($request->user());
    }

    public function editProfile(Request $request)
    {

        $validator = Validator::make($request -> all(), [
            'user_name' => 'required|string|max:255',
            'user_bio' => 'required|string|max:225',
            'user_photo' => 'required|string|max:225',
        ], 
        [
            'user_name.required' => 'Please put your user name correctly',
            'user_bio.required' => 'Please put your bio correctly',
            'user_photo.required' => 'Please put your photo correctly',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Edit profile failed',
                'errors' =>  $validator->errors()
            ], 422);
        }


        $user = User::findOrFail('id', $request->id);
        $user->fill([
            'user_name' => $request->user_name,
            'user_bio' => $request->user_bio,
            'user_phone' => $request->user_phone,
        ]);
        $user->save();

        return response()->json([
            'message' => 'Edit Profile Success',
            'data' => $user,
        ], 200);
    }
}
