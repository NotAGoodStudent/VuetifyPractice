<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function getUsers(){
        return view('allUsers');
    }

    public function users(){
        $users =  User::all();
        return $users;
    }

    public function getCurrUser(){
        $user = Auth::user();
        return $user;
    }

    public function saveData(Request $request){

        echo $request;
        if(User::where('email', '=', $request->input('email'))->where('id', '!=', $request->get('id'))->exists()){
            return response()->json('Email already in use', 400);
        }
        else{

            $user = User::findOrFail($request->get('id'));
            $user->email = $request->get('email');
            $user->name = $request->get('name');
            $user->surname = $request->get('surname');
            $user->height = $request->get('height');
            $user->weight = $request->get('weight');
            $user->save();
            return ['redirect' => route('editProfile')];
        }
    }

}
