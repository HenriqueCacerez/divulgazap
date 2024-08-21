<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
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

Route::get('/',             [GroupController::class,    'index']);
Route::get('/group/create', [GroupController::class,    'create']);
Route::get('/group/{uri}',  [GroupController::class,    'show']);
Route::get('/categories',   [CategoryController::class, 'index']);