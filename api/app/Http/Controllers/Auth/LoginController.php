<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            if(!$token = auth()->attempt($request->only('email', 'password')))
            {
                return response(null, 401);
            }

            $user = User::where('email', $request->email)->first();

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'message'     => 'Authorisation successfully',
                'token'       => $token
            ]);

        }catch (\Exception $error){
            return response()->json([
                'status_code' => 500,
                'message'     => 'Error with authorisation',
                'error'       => $error,
            ]);
        }
    }
}
