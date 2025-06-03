@extends('layout')
@section('title', 'E-Commerce Website')
@section('content')
<body>
    <div class="container-fluid bg-primary text-white text-center py-5 mb-5">
        <h1 class="display-4">Selamat Datang di Toko Online Saya!</h1>
        <p class="lead">Temukan produk terbaik dengan harga menarik.</p>
        <a href="#" class="btn btn-light btn-lg">Lihat Semua Produk</a>
    </div>

    <div class="container">
        <h2 class="text-center mb-4">Produk Pilihan</h2>
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="product-card">
                    <img src="https://via.placeholder.com/300x200" alt="Nama Produk 1">
                    <h5>Nama Produk Bagus 1</h5>
                    <p class="text-muted">Deskripsi singkat produk ini, fitur utamanya.</p>
                    <div class="product-price">Rp 150.000</div>
                    <a href="#" class="btn btn-success">Beli Sekarang</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="product-card">
                    <img src="https://via.placeholder.com/300x200" alt="Nama Produk 2">
                    <h5>Nama Produk Keren 2</h5>
                    <p class="text-muted">Deskripsi singkat produk ini, fitur utamanya.</p>
                    <div class="product-price">Rp 250.000</div>
                    <a href="#" class="btn btn-success">Beli Sekarang</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="product-card">
                    <img src="https://via.placeholder.com/300x200" alt="Nama Produk 3">
                    <h5>Nama Produk Unik 3</h5>
                    <p class="text-muted">Deskripsi singkat produk ini, fitur utamanya.</p>
                    <div class="product-price">Rp 75.000</div>
                    <a href="#" class="btn btn-success">Beli Sekarang</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="product-card">
                    <img src="https://via.placeholder.com/300x200" alt="Nama Produk 4">
                    <h5>Nama Produk Terbaik 4</h5>
                    <p class="text-muted">Deskripsi singkat produk ini, fitur utamanya.</p>
                    <div class="product-price">Rp 300.000</div>
                    <a href="#" class="btn btn-success">Beli Sekarang</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="product-card">
                    <img src="https://via.placeholder.com/300x200" alt="Nama Produk 5">
                    <h5>Nama Produk Terbaru 5</h5>
                    <p class="text-muted">Deskripsi singkat produk ini, fitur utamanya.</p>
                    <div class="product-price">Rp 120.000</div>
                    <a href="#" class="btn btn-success">Beli Sekarang</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="product-card">
                    <img src="https://via.placeholder.com/300x200" alt="Nama Produk 6">
                    <h5>Nama Produk Diskon 6</h5>
                    <p class="text-muted">Deskripsi singkat produk ini, fitur utamanya.</p>
                    <div class="product-price">Rp 90.000 <span class="text-decoration-line-through text-danger">Rp 100.000</span></div>
                    <a href="#" class="btn btn-success">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@endsection