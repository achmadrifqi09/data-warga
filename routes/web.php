<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\NeighbourhoodsController;

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

Route::get('/dashboard',  [DataController::class, 'index'])->middleware('auth');
Route::get('/create', [DataController::class, 'create'])->middleware('auth');

Route::resource('/dashboard/posts', DataController::class)->middleware('auth');
Route::get('/dashboard/export-data', [DataController::class, 'exel'])->middleware('auth');

Route::get('/data-rt', [NeighbourhoodsController::class, 'index'])->middleware('auth');
Route::get('/data-rt/export-data/{id}', [NeighbourhoodsController::class, 'excel'])->middleware('auth');

Route::get('/dashboard/print-view', [DataController::class, 'printView'])->middleware('auth');
Route::get('/data-rt/print-view/{id}', [NeighbourhoodsController::class, 'printView'])->middleware('auth');

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']); 

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




