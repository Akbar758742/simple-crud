<?php

use App\Models\post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome',['posts'=>post::paginate(3)]);
})->name('home');
Route::get('/create',[PostController::class,'create']);
Route::post('/store',[PostController::class,'ourStore'])->name('store');
Route::get('/edit/{id}',[PostController::class,'editMethod'])->name('edit');
Route::get('/delete/{id}',[PostController::class,'deleteMethod'])->name('delete');
Route::post('/update/{id}',[PostController::class,'updateMethod'])->name('update');

