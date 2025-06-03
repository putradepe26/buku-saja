@extends('layout')
@section('title', 'E-Commerce Website')
@section('content')
<style>
    .thumbnail_product
    {
        background-position: center;
        background-size: cover;
        height: 300px;
        width: 100%;
    }
</style>
<body>
    <div class="container-fluid bg-primary text-white text-center py-5 mb-5">
        <h1 class="display-4">Selamat Datang di Toko Online Saya!</h1>
        <p class="lead">Temukan produk terbaik dengan harga menarik.</p>
        <a href="#" class="btn btn-light btn-lg">Lihat Semua Produk</a>
    </div>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Produk Pilihan</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Buat halaman produk -->
            @foreach($products as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100">
                        <div class="thumbnail_product" style="background-image: url({{$product->image}});"></div>
                        <div class="card-body text-center">
                            <p class="card-title">{{$product->name}}</p>
                            <p class="cart-text">{{$product->price}}</p>
                            <a href="#" class="btn btn-success">Beli Sekarang</a>
                        </div>
                </div>
            </div>
            @endforeach
            <div class="row mt-4">
                <div class="col-12">
                    {{$products->links()}}
                </div>   
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@endsection