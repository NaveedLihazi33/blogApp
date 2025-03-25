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

Route::get('/', [BlogController::class, 'index']);
Route::get('/export',[UserController::class,'export']);
Route::get('/import',function()
{
    return view('import');
});
Route::post('/import-users', [UserController::class, 'import'])->name('users.import');

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('/LoginPage');
    })->name('login');

    Route::get('/registration', function () {
        return view('RegistrationPage');
    });
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/userLogin', [UserController::class, 'login'])->name('userLogin');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/createBlog', [BlogController::class, 'create']);
    Route::post('/blogCreate', [BlogController::class, 'store'])->name('blogCreate');
});

Route::get('/blogs/{id}',function($id)
{
    $blog = Blog::with('user')->find($id);
    return view("particularBlog",[
        "blog"=>$blog
    ]);

})->name('showParticularBlog');
