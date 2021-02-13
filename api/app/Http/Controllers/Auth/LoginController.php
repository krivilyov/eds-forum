<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {

            //check user information
//            $validation = Validator::make($request->all(), [
//                'email'    => 'required|email',
//                'password' => 'required',
//            ]);
//
//            if($validation->fails())
//            {
//                return response([
//                    'error' => $validation->errors()->all()
//                ], 422);
//            }

            $request->validate([
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            $credentials = request(['email', 'password']);

            if(!Auth::attempt($credentials))
            {
                return response()->json([
                    'status_code' => 422,
                    'message'     => 'Unauthorized',
                ]);
            }

            $user = User::where('email', $request->email)->first();

           if(!Hash::check($request->password, $user->password, []))
           {
               return response()->json([
                   'status_code' => 422,
                   'message'     => 'Pasword don\'t match',
               ]);
           }

           $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'message'     => 'Authorisation successfully',
                'token_type'  => $token
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
