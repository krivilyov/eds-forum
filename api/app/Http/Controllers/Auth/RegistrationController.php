<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    public function registration(Request $request)
    {
        try {

            //check user information
            $validation = Validator::make($request->all(), [
                'name'     => 'required|string|max:255',
                'email'    => 'required|string|email|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);

            if($validation->fails())
            {
                return response([
                    'error' => $validation->errors()->all()
                ], 422);
            }

            //turns password in hash and add create token
            $request['password'] = Hash::make($request['password']);
            $request['remember_token'] = Str::random(15);

            //create user
            $user = User::create($request->toArray());

            return response()->json([
                'status_code' => 200,
                'message'     => 'Registration successfully',
            ]);

        }catch (\Exception $error){
            return response()->json([
                'status_code' => 500,
                'message'     => 'Error with registration',
                'error'       => $error,
            ]);
        }
    }
}
