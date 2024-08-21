<?php

use App\Http\Controllers\Api\GroupController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('referer')->post('/group',                [GroupController::class, 'store']);
Route::middleware('referer')->get('/group/validate/{code}', [GroupController::class, 'validateInviteLink']);