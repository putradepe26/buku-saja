<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .cart-item {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 15px;
        }
        .cart-item-details {
            flex-grow: 1;
        }
        .cart-item-details h5 {
            margin-bottom: 5px;
        }
        .cart-item-price {
            font-weight: bold;
            color: #28a745;
        }
        .quantity-control {
            display: flex;
            align-items: center;
        }
        .quantity-control input {
            width: 60px;
            text-align: center;
            margin: 0 5px;
        }
        .cart-summary {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 30px 0;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>
<body>
    <!--Navbar-->
    @include('navbar')

   <!--Content-->
   <div style="min-height:100vh">
    @yield('content')
    </div>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Placeholder for future JavaScript to dynamically update cart count
        document.getElementById('cart-count').innerText = '2'; // Example: update to 2 items
    </script>
</body>
</html>