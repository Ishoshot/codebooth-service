<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Logs In a User.
     *
     * @param  Request $request
     * @return \App\User
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($user->email)->plainTextToken;

        return response()->json([
            "user" => $user,
            "token" => $token,
        ], 200);
    }


    /**
     * Logs Out a User.
     *
     * @param  Request $request
     * @return \App\User
     */
    public function logout(Request $request)
    {
        $id = $request->user;

        $user = User::findorFail($id);

        $logout = $user->tokens()->where('name', $user->email)->delete();

        if ($logout) {
            return response()->json(
                ['message' => 'User Logged Out Successfully'],
                200
            );
        } else {
            return response()->json(
                ['message' => 'User is not Logged In'],
                200
            );
        }
    }
}
