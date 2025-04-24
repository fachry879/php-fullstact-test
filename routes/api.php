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
    Route::get('/data_client/{client}', [ClientController::class, 'show']);
    Route::post('/update_client/{client}', [ClientController::class, 'update']);
    Route::delete('/delete_client/{client}', [ClientController::class, 'destroy']);
});
