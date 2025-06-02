<?php

use Illuminate\Support\Facades\Route;

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



