<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/carousel', [CarouselItemController::class, 'index']);
Route::post('/carousel', [CarouselItemController::class, 'store']);
Route::get('/carousel/{id}', [CarouselItemController::class, 'show']);
Route::post('/carousel/{id}', [CarouselItemController::class, 'update']);
Route::delete('/carousel/{id}', [CarouselItemController::class, 'destroy']);


Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user/name/{id}', [UserController::class, 'update'])->name('user.update');
Route::post('/user/email/{id}', [UserController::class, 'email'])->name('user.email');
Route::post('/user/password/{id}', [UserController::class, 'password'])->name('user.password');
Route::delete('/user/{id}', [UserController::class, 'destroy']);

/*
Route::get('/message', [CommentController::class, 'index']);
Route::post('/message', [CommentController::class, 'store']);
Route::post('/message/{id}', [CommentController::class, 'update']);
*/

Route::get('/comment', [CommentController::class, 'index']);
Route::post('/comment', [CommentController::class, 'store']);
Route::post('/comment/{id}', [CommentController::class, 'update']);