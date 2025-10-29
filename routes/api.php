<?php

use App\Http\Controllers\Api\V1\ProductController as V1ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// API Version 1
Route::prefix('v1')->group(function () {
    // Health check endpoint
    Route::get('/health', function () {
        return response()->json([
            'status' => 'success',
            'version' => '1.0',
            'message' => 'API is running',
            'timestamp' => now()->toDateTimeString()
        ]);
    });

    // Auth routes
    Route::post('/login', [AuthController::class, 'login']);

    // Product routes
    Route::prefix('products')->group(function () {
        Route::get('/', [V1ProductController::class, 'index'])->name('api.v1.products.index');
    });

    // Protected routes (require authentication)
    Route::middleware('auth:sanctum')->group(function () {
        // Product routes
        Route::post('/products', [V1ProductController::class, 'store'])
            ->name('api.v1.products.store');
        Route::put('/products/{product}', [V1ProductController::class, 'update'])
            ->name('api.v1.products.update');
        Route::delete('/products/{product}', [V1ProductController::class, 'destroy'])
            ->name('api.v1.products.destroy');

        // Transaction routes
        Route::post('/transactions', [\App\Http\Controllers\Api\V1\TransactionController::class, 'store'])
            ->name('api.v1.transactions.store');
    });
});

// Default route (legacy or latest version)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Catch-all for undefined routes
Route::fallback(function () {
    return response()->json([
        'status' => 'error',
        'message' => 'Endpoint not found. Please check the API version and endpoint.',
        'documentation' => url('/api/documentation') // You can add a link to your API documentation here
    ], 404);
});
