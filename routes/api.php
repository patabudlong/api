<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('tasks', TaskController::class);
});

// Health Check Endpoint
Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
        'timestamp' => now(),
        'environment' => config('app.env'),
        'services' => [
            'database' => checkDatabaseConnection(),
            'storage' => checkStorageAccess(),
            'cache' => checkCacheConnection(),
        ]
    ]);
});

// Helper functions for health checks
function checkDatabaseConnection() {
    try {
        DB::connection()->getPdo();
        return ['status' => 'healthy', 'message' => 'Database connection successful'];
    } catch (\Exception $e) {
        return ['status' => 'unhealthy', 'message' => 'Database connection failed'];
    }
}

function checkStorageAccess() {
    try {
        Storage::disk('local')->put('health_check.txt', 'Health check');
        Storage::disk('local')->delete('health_check.txt');
        return ['status' => 'healthy', 'message' => 'Storage is accessible'];
    } catch (\Exception $e) {
        return ['status' => 'unhealthy', 'message' => 'Storage is not accessible'];
    }
}

function checkCacheConnection() {
    try {
        Cache::put('health_check', 'test', 10);
        Cache::get('health_check');
        Cache::forget('health_check');
        return ['status' => 'healthy', 'message' => 'Cache is working'];
    } catch (\Exception $e) {
        return ['status' => 'unhealthy', 'message' => 'Cache is not working'];
    }
}
