<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PDFController;

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


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [CustomAuthController::class, 'signup']);
Route::get('/register', [RegisterController::class, 'signup']);
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin');
Route::get('signup', [CustomAuthController::class, 'signup'])->name('register-user');
Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('catatan',[CustomAuthController::class, 'catatan']);
Route::get('isidata',[CustomAuthController::class, 'isidata']);
Route::get('dashboard', [CustomAuthController::class, 'home'])->name('dashboard');
Route::get('catatan', [DataController::class, 'index'])->name('catatan');
Route::post('isidata', [DataController::class, 'store'])->name('isidata.store');
Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');



