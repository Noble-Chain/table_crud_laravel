<?php

use App\Http\Controllers\WorkerController;
use App\Models\Worker;
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

Route::get('/',[WorkerController::class, 'index'])->name('index');
Route::post('/create',[WorkerController::class, 'store'])->name('create');
Route::delete('/destroy/{id}',[WorkerController::class,'destroy'])->name('destroy');
Route::get('/edit/{id}',[WorkerController::class,'edit'])->name('edit');
Route::put('/update/${id}',[WorkerController::class,'update'])->name('update');