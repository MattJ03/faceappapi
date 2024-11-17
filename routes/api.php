<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/persons', [PersonController::class, 'index'])->name('persons.index');
Route::delete('/persons{$id}', [PersonController::class, 'destroy'])->name('persons.destroy');
Route::get('/persons{$id}', [PersonController::class, 'show'])->name('persons.show');
Route::post('/persons', [PersonController::class, 'store'])->name('persons.store');
Route::put('/persons{$id}', [PersonController::class, 'update'])->name('persons.update');
