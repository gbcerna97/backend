<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;

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
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user', [UserController::class, 'store'])->name('user.store')->name('user.register');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();    
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::controller(CarouselItemController::class)->group(function () {
        Route::get('/carousel', 'index');
        Route::post('/carousel', 'store');
        Route::get('/carousel/{id}', 'show');
        Route::post('/carousel/{id}', 'update');
        Route::delete('/carousel/{id}', 'destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/{id}', [UserController::class, 'show']);
        Route::post('/user/name/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/user/email/{id}', [UserController::class, 'email'])->name('user.email');
        Route::post('/user/password/{id}', [UserController::class, 'password'])->name('user.password');
        Route::delete('/user/{id}', [UserController::class, 'destroy']);
    });
    
    
    Route::controller(MessageController::class)->group(function () {
        Route::get('/message', [MeessageController::class, 'index']);
        Route::post('/message', [MessageController::class, 'store']);
        Route::post('/message/{id}', [MessageController::class, 'update']);
    });
    
    Route::controller(CommentController::class)->group(function () {
        Route::get('/comment', [CommentController::class, 'index']);
        Route::post('/comment', [CommentController::class, 'store']);
        Route::post('/comment/{id}', [CommentController::class, 'update']);
    });
});

