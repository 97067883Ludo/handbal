<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\createPdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\mailPdfController;
use App\Http\Controllers\UploadController;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
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

Route::middleware('auth')->group(function () {
    Route::get('/home/mail-pdf', [mailPdfController::class, 'view'])->name('mailPdf');
    Route::post('/home/create-pdf', [createPdfController::class, 'createPdf'])->name('createPdf');
    Route::post('/home/check', [CheckController::class, 'show']);
    Route::post('/home/upload', [UploadController::class, 'FileUploaded']);
    Route::get('/home', [HomeController::class, 'GetHomePage'])->name('/home');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/home/send-email', [mailPdfController::class, 'sendMail'])->name('sendEmail');
    Route::get('/home/archive', [ArchiveController::class, 'show'])->name('archive');
    Route::get('home/delete-pdf', [ArchiveController::class, 'delete'])->name('deleteMediaItem');
});


Route::middleware('guest')->post('/login', [AuthController::class, 'authenticate']);

Route::middleware('guest')->get('/login', [AuthController::class, 'getLoginScreen'])->name('/login');
