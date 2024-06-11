<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatatanKeuanganController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [ProfileController::class, 'getProfile']);
    Route::put('profile/update', [ProfileController::class, 'updateProfile']);
    Route::post('catatan-keuangan', [CatatanKeuanganController::class, 'tambahCatatanKeuangan']);
    Route::put('catatan-keuangan/{id}', [CatatanKeuanganController::class, 'updateCatatanKeuangan']);
    Route::get('users-with-records', [CatatanKeuanganController::class, 'listUsersWithRecords']);
});
