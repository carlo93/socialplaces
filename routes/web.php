<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'create'])->name('contact-view');
Route::post('/store', [ContactController::class, 'store']);
Route::get('/view', [ContactController::class, 'view']);
Route::delete('/destroy/{id}', [ContactController::class, 'destroy'])->name('destroy');

// Route::get('{any}', function () {
//     return view('layouts.front');
// })->where('any', '.*');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [ContactController::class, 'index'])->name('dashboard');
