<?php

namespace App\Http\Controllers;

use App\Models\routines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutinesController extends Controller
{
    public function getRoutines(){
        $routines = routines::where('user_id', '=', Auth::id())->get();
        return $routines;
    }

    public function addRoutine(Request $request){
        $id = Auth::id();
        routines::create([
            'user_id' => $id,
            'title' => $request->get('routineTitle'),
        ]);

    }
}
