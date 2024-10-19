<?php

use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::apiResource('/buku',BooksController::class);
Route::get('/buku',[BooksController::class,'index']);
Route::get('/buku/{books}',[BooksController::class,'show']);
Route::post('/buku',[BooksController::class,'store']);
Route::put('/buku',[BooksController::class,'store']);
