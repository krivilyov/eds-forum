<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userData(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'email' => $user->email,
            'name'  => $user->name,
        ]);
    }

    public function logout()
    {
        Auth::user()->token()->delete();
    }
}
