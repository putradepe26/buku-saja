<!DOCTYPE html>
@extends('layout')
@section('title', 'Keranjang Belanja')
@section('content')
<body>
    <div class="container my-5">
        <h2 class="mb-4">Keranjang Belanja Anda</h2>

        <div class="row">
            <div class="col-lg-8">
                <div class="cart-item">
                    <img src="https://via.placeholder.com/100x100" alt="Nama Produk 1">
                    <div class="cart-item-details">
                        <h5>Nama Produk Bagus 1</h5>
                        <p class="text-muted mb-1">Ukuran: M, Warna: Biru</p>
                        <p class="cart-item-price">Rp 150.000</p>
                    </div>
                    <div class="quantity-control me-3">
                        <button class="btn btn-sm btn-outline-secondary">-</button>
                        <input type="text" class="form-control form-control-sm" value="1" readonly>
                        <button class="btn btn-sm btn-outline-secondary">+</button>
                    </div>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </div>

                <div class="cart-item">
                    <img src="https://via.placeholder.com/100x100" alt="Nama Produk 2">
                    <div class="cart-item-details">
                        <h5>Nama Produk Keren 2</h5>
                        <p class="text-muted mb-1">Model: Deluxe</p>
                        <p class="cart-item-price">Rp 250.000</p>
                    </div>
                    <div class="quantity-control me-3">
                        <button class="btn btn-sm btn-outline-secondary">-</button>
                        <input type="text" class="form-control form-control-sm" value="2" readonly>
                        <button class="btn btn-sm btn-outline-secondary">+</button>
                    </div>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </div>

                </div>
            <div class="col-lg-4">
                <div class="cart-summary">
                    <h4>Ringkasan Belanja</h4>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Subtotal:
                            <span>Rp 400.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pengiriman:
                            <span>Rp 20.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            Total:
                            <span>Rp 420.000</span>
                        </li>
                    </ul>
                    <button class="btn btn-primary w-100 mb-2">Lanjutkan ke Pembayaran</button>
                    <a href="index.html" class="btn btn-outline-secondary w-100">Lanjutkan Belanja</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Placeholder for future JavaScript to dynamically update cart count
        document.getElementById('cart-count').innerText = '2'; // Example: update to 2 items
    </script>
</body>
@endsection