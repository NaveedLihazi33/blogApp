<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[BlogController::class,'index']);

Route::get('/login',function()
{
    return view('/LoginPage');
});

Route::get('/registration',function()
{
    return view('RegistrationPage');
});

Route::post('/register' , [UserController::class,'register'])->name('register');
