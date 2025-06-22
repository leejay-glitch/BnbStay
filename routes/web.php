<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BnBController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
});

Route::get('/search', [BnBController::class, 'search'])->name('bnb.search');
Route::post('/book', [BnBController::class, 'store'])->name('bnb.store');
Route::view('/booking-confirmation', 'bnb.confirmation')->name('bnb.confirmation');