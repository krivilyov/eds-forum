<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userData(Request $request)
    {
        return $request->user();
    }

    public function logout()
    {
        Auth::user()->token()->delete();
    }
}
