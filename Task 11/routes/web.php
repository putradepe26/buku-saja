<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HalamanController;


Route::get('/', function () 
{
    return 'Ini adalah halaman utama';
});

Route::get('/products', function () 
{
    return 'Ini adalah halaman products';
});

Route::get('/checkout', function () 
{
    return 'Ini adalah halaman checkout';
});

Route::get('/cart', function () 
{
    return 'Ini adalah halaman cart';
});

//Route::get('/contoh',HalamanController::class, 'index');
//Route::get('index',HalamanController::class, 'index');
//Route::resource('products',ProductController::class);
Route::resource('products',ProductController::class);




