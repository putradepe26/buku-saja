<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
//use App\Http\Controllers\HalamanController;

Route::get('/',[HomeController::class, 'index']);
Route::get('/cart',[HomeController::class, 'cart']);

Route::get('/products', function () 
{
    return 'Ini adalah halaman products';
});

Route::get('/checkout', function () 
{
    return 'Ini adalah halaman checkout';
});

Route::resource('products',ProductController::class);




