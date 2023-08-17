<?php

use Illuminate\Support\Facades\Route;
// Added by me
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// By me
Auth::routes();
// Route User
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[HomeController::class, 'userHome'])->name("home");

    Route::post('generate-shorten-link', [HomeController::class, 'store'])->name('generate.shorten.link.post');  
    Route::get('{code}', [HomeController::class, 'shortenLink'])->name('shorten.link');  
});


// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[HomeController::class, 'adminHome'])->name("admin.home");
    Route::get('{code}', [HomeController::class, 'shortenLink'])->name('shorten.link');  
});
