<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return ['redirect' => route('home')];
        }
        else return response()->json([
            'errors' => 'Incorrect data introduced.'
        ], 401);
    }
}
