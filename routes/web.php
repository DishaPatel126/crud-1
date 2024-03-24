<?php

use App\Http\Controllers\ProductController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::webhooks('webhooks');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);


// require __DIR__ . '/auth.php';

// Route::middleware('auth')->group(function () {
//     Route::resource('products', ProductController::class);
// });