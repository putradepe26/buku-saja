<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index.html">
        <img src="https://via.placeholder.com/40x40" alt="Logo">
        DavippOlshop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kategori</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="cart.html">Keranjang (<span id="cart-count">0</span>)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white ms-lg-3" href="#">Login</a>
                </li>
                @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                    </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
            @endif
            </ul>
        </div>
    </div>
</nav>