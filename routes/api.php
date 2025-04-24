<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('client')->group(function () {
    Route::get('/list_client', [ClientController::class, 'index']);
    Route::post('/store_client', [ClientController::class, 'store']);
});
