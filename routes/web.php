<?php

use App\Http\Controllers\Admin\Home\HomeController;
use Illuminate\Support\Facades\Auth;
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



Route::redirect('/', 'admin');
Route::group(['middleware' => 'auth', 'prefix' => 'admin','as' => 'admin.'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
});


Auth::routes(['register' => false]);

