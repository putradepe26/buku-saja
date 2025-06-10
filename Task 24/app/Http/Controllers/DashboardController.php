<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahProduk = Product::count();

        $jumlahKategori = ProductCategory::count();

        $jumlahKlikProduk = Product::sum('click');

        //Kirim data ke view
        return view('dashboard',
        compact(
            'jumlahProduk',
            'jumlahKategori',
            'jumlahKlikProduk'
        ));
    }
}
