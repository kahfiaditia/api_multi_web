<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;


// Test route
Route::get('/ping', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API is working!',
        'timestamp' => now()->toISOString()
    ]);
});

// Simple banner route
Route::get('/banners', [BannerController::class, 'api_ku']);

// Atau dengan prefix v1
Route::prefix('v1')->group(function () {
    Route::get('/banners', [BannerController::class, 'api_ku']);
    Route::get('/test', function () {
        return response()->json(['message' => 'V1 API working']);
    });
});