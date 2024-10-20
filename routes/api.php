<?php

use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('kategori',BookCategoryController::class);
Route::get('/buku',[BooksController::class,'index']);
Route::get('/buku/{books}',[BooksController::class,'show']);
Route::post('/buku',[BooksController::class,'store']);
Route::put('/buku/{books}',[BooksController::class,'update']);
Route::get('/search', [BooksController::class, 'search']);
