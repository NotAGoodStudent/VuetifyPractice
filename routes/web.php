<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('index');
// View that we returns that contains vue content
Route::view('/getUsers', 'allUsers')->name('getUsers');
//Route that we utilise in order to retrieve users in the database and print them with vue
Route::get('/users', [\App\Http\Controllers\UserController::class, 'users'])->name('users');
Auth::routes();
Route::post('/authenticatelogin', [\App\Http\Controllers\LoginController::class, 'login'])->name('authlogin');
Route::post('/registerUser', [\App\Http\Controllers\RegisterController::class, 'register'])->name('registerUser');
Route::middleware('auth')->group(function() {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::view('/editProfile', 'auth.editProfile')->name('editProfile');
    Route::view('/myRoutines', "myRoutines")->name('myRoutines');
    Route::get('/getCurrUser', [\App\Http\Controllers\UserController::class, 'getCurrUser'])->name('getCurrUser');
    Route::post('/saveProfile', [\App\Http\Controllers\UserController::class, 'saveData'])->name('saveData');
    Route::get('/getMyRoutines', [\App\Http\Controllers\RoutinesController::class, 'getRoutines'])->name('getMyRoutines');
    Route::post('/addRoutine' , [\App\Http\Controllers\RoutinesController::class, 'addRoutine'])->name('addRoutine');
});
