<?php
session_start();
include 'koneksi.php'; // Include koneksi database

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id_to_remove = mysqli_real_escape_string($koneksi, $_GET['id']);
    $session_id = session_id(); // Ambil ID sesi saat ini

    // 1. Hapus dari database (keranjang_db)
    $query_delete_db = "DELETE FROM carts WHERE session_id = '$session_id' AND product_id = '$product_id_to_remove'";
    mysqli_query($koneksi, $query_delete_db);

    // 2. Hapus dari session PHP (sinkronisasi)
    if (isset($_SESSION['keranjang'])) {
        foreach ($_SESSION['keranjang'] as $key => $item) {
            if ($item['id'] == $product_id_to_remove) {
                unset($_SESSION['keranjang'][$key]);
                $_SESSION['keranjang'] = array_values($_SESSION['keranjang']);
                break;
            }
        }
    }
    
    header("Location: cart.php?status=removed_from_cart");
    exit();

} else {
    header("Location: cart.php?status=error_invalid_remove_id");
    exit();
}

mysqli_close($koneksi); // Tutup koneksi database
?>