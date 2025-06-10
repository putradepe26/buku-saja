<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

use App\Models\Product;
use App\Models\ProductCATEGORY;



//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::middleware(('admin'))->group(function () {
//   Route::get('/admin/dashboard', [AdminController::class, 'index']);
//});

Route::middleware(['auth','admin'])->group(function () {

      Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
   
      Route::get('/products', function() {
         return view('dashboard.products.index');
      })->name('products');
      Route::resource('product-category', ProductCategoryController::class);
      Route::resource('product', ProductController::class);
});

Route::middleware('admin')->group(function () {
      Route::get('/products', function() {
         return view('dashboard.products.index');
      })->name('products');
      Route::resource('product-category', ProductCategoryController::class);
});


Route::get('/products', function () {
   return view('dashboard.products.index');
})->name('products');

Route::get('/products/tambah', function () {
   return view('dashboard.products.tambah');
})->name('products-tambah');

Route::get('/products/edit', function () {
   return view('dashboard.products.edit');
})->name('products-edit');


Route::get('/category-products', function () {
   return view('dashboard.category_products.index');
})->name('category-products');

Route::get('/category-products/tambah', function () {
   return view('dashboard.category_products.tambah');
})->name('category-products-tambah');

Route::get('/category-products/edit', function () {
   return view('dashboard.category_products.edit');
})->name('category-products-edit');


require __DIR__.'/auth.php';
