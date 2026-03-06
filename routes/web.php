<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

// Optional catch-all for React Router (so /about, /pricing etc. don't 404 on server)
Route::get('/{path?}', function () {
    return view('welcome');
})->where('path', '.*')->name('spa');

Route::get('/scan', function () {
    $data = json_decode(request('data'), true);
    if (!$data) abort(404);
    return view('scan-result', ['user' => $data]);
});