<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::middleware('guest')->get('/', function () {
    if (Auth::check()){
        return redirect()->route('/home');
    }
    return redirect()->route('/login');

})->name('login');

Route::middleware('guest')->post('/login', [AuthController::class, 'authenticate']);

Route::middleware('guest')->get('/login', [AuthController::class, 'getLoginScreen'])->name('/login');

Route::middleware('auth')->get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->get('/home', [HomeController::class, 'GetHomePage'])->name('/home');
