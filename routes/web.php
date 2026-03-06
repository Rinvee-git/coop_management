<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Optional catch-all for React Router (so /about, /pricing etc. don't 404 on server)
Route::get('/{path?}', function () {
    return view('welcome');
})->where('path', '.*')->name('spa');

Route::view('/scanner', 'qr-scanner');
