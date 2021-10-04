<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function Register(Request $request){

     $validated = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
       if(!$validated){
           return response()->json($validated->errors()->toJson(), 400);
       }
       else{

           User::create([
               'name' => $request->get('name'),
               'surname' => $request->get('surname'),
               'age' => null,
               'weight' => null,
               'height' => null,
               'email' => $request->get('email'),
               'password' => Hash::make($request->get('password')),
           ]);

           return ['redirect' => route('login')];
       }
    }
}
