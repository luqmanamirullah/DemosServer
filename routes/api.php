<?php

use App\Http\Controllers\AuthenticantionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrendingListController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/breakingNews', [NewsController::class, 'getBreakingNews']);

Route::get('/news/{id}', [NewsController::class, 'getNewsDetail']);
Route::get('/news-type', [NewsController::class, 'getNewsType']);
Route::get('/news-view/{id}', [NewsController::class, 'updateNewsView']);

Route::get('/trending-lists', [TrendingListController::class, 'getTrends']);

Route::get('/everything', [SearchController::class, 'getEverything']);

Route::post('/login', [AuthenticantionController::class, 'login']);
Route::post('/login-google', [AuthenticantionController::class, 'loginGoogle']);
Route::post('/register', [AuthenticantionController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/opinions/{policyId}', [OpinionController::class, 'get']);
    Route::post('/create-opinion/{policyId}', [OpinionController::class, 'create']);
    Route::get('/checkAuthorization/{opinionId}', [OpinionController::class, 'checkAuthorization']);
    Route::delete('/delete-opinion/{opinionId}/{policyId}', [OpinionController::class, 'delete']);

    Route::get('/policy', [PolicyController::class, 'get']);
    Route::get('/policy-file/{id}', [PolicyController::class, 'getFile']);
    Route::get('/policy-details/{id}', [PolicyController::class, 'getDetails']);

    Route::get('/user', [UserController::class, 'getUser']);
    Route::patch('/user', [UserController::class, 'editProfile']);
    Route::post('/logout', [AuthenticantionController::class, 'logout']);
});
