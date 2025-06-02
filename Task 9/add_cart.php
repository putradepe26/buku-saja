<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $session_id = session_id(); // Ambil ID sesi saat ini

    // 1. Ambil detail produk dari database (tetap diperlukan untuk validasi dan info)
    $query_product = "SELECT id, namaProduk, harga, gambar FROM products WHERE id = '$product_id'";
    $result_product = mysqli_query($koneksi, $query_product);

    if (mysqli_num_rows($result_product) > 0) {
        $product = mysqli_fetch_assoc($result_product);

        // 2. Cek apakah produk sudah ada di carts untuk sesi ini
        $query_check_cart = "SELECT id, quantity FROM carts WHERE session_id = '$session_id' AND product_id = '$product_id'";
        $result_check_cart = mysqli_query($koneksi, $query_check_cart);

        if (mysqli_num_rows($result_check_cart) > 0) {
            // Produk sudah ada di keranjang_db, update kuantitasnya
            $cart_item = mysqli_fetch_assoc($result_check_cart);
            $new_quantity = $cart_item['quantity'] + 1;
            $query_update_cart = "UPDATE carts SET quantity = '$new_quantity' WHERE id = '{$cart_item['id']}'";
            mysqli_query($koneksi, $query_update_cart);
        } else {
            // Produk belum ada di keranjang_db, tambahkan sebagai item baru
            $query_insert_cart = "INSERT INTO carts(session_id, product_id, quantity) VALUES ('$session_id', '$product_id', 1)";
            mysqli_query($koneksi, $query_insert_cart);
        }

        // Opsional: Sinkronkan session keranjang PHP (untuk tampilan real-time di navbar, dll)
        // Jika Anda hanya mengandalkan DB, bagian ini bisa dihilangkan,
        // tapi navbar di index.php akan perlu query DB juga.
        // Untuk menjaga konsistensi dengan tampilan awal, kita tetap pakai session.
        if (!isset($_SESSION['keranjang'])) {
            $_SESSION['keranjang'] = array();
        }
        $found_in_session = false;
        foreach ($_SESSION['keranjang'] as $key => $item) {
            if ($item['id'] == $product_id) {
                $_SESSION['keranjang'][$key]['quantity']++;
                $found_in_session = true;
                break;
            }
        }
        if (!$found_in_session) {
            $_SESSION['keranjang'][] = array(
                'id'       => $product['id'],
                'namaProduk' => $product['namaProduk'],
                'harga'    => $product['harga'],
                'gambar'   => $product['gambar'],
                'quantity' => 1
            );
        }
        
        header("Location: index.php?status=success_add_cart");
        exit();

    } else {
        header("Location: index.php?status=error_product_not_found");
        exit();
    }
} else {
    header("Location: index.php?status=error_invalid_id");
    exit();
}

mysqli_close($koneksi);
?>