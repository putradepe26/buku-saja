<?php
session_start();
include 'koneksi.php'; // Memanggil file koneksi database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cart-item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Davipp E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="cart.php">Keranjang
                            <?php
                            // Perhitungan jumlah item keranjang langsung dari database
                            $session_id = session_id();
                            $count_query = "SELECT SUM(quantity) as total_items FROM carts WHERE session_id = '$session_id'";
                            $count_result = mysqli_query($koneksi, $count_query);
                            $total_items = 0;
                            if ($count_result && mysqli_num_rows($count_result) > 0) {
                                $row_count = mysqli_fetch_assoc($count_result);
                                $total_items = $row_count['total_items'];
                            }
                            if ($total_items > 0) {
                                echo '<span class="badge bg-primary">' . $total_items . '</span>';
                            }
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4 text-center">Keranjang Belanja Anda</h1>

        <?php
        $current_session_id = session_id();
        $query_cart_items = "SELECT carts.product_id, carts.quantity, products.namaProduk, products.harga, products.gambar
                             FROM carts
                             JOIN products ON carts.product_id = products.id
                             WHERE carts.session_id = '$session_id'
                             ORDER BY carts.id ASC";
        $result_cart_items = mysqli_query($koneksi, $query_cart_items);

        if ($result_cart_items && mysqli_num_rows($result_cart_items) > 0) {
            $total_harga = 0;
        ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($item = mysqli_fetch_assoc($result_cart_items)) {
                            $subtotal = $item['harga'] * $item['quantity'];
                            $total_harga += $subtotal;
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td>
                                    <?php
                                    $gambar_path = 'gambar/' . htmlspecialchars($item['gambar']);
                                    if (!file_exists($gambar_path) || empty($item['gambar'])) {
                                        $gambar_path = 'https://via.placeholder.com/80x80?text=No+Image';
                                    }
                                    ?>
                                    <img src="<?php echo $row['gambar'] ?>" class="img-thumbnail cart-item-image" alt="">
                                </td>
                                <td><?php echo htmlspecialchars($item['namaProduk']); ?></td>
                                <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                                <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                <td>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                                <td>
                                    <a href="cart_delete.php?id=<?php echo $item['product_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus produk ini dari keranjang?');">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end"><strong>Total Belanja:</strong></td>
                            <td><strong>Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></strong></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="index.php" class="btn btn-secondary">Lanjutkan Belanja</a>
                <button class="btn btn-primary">Lanjutkan ke Checkout</button>
            </div>

        <?php
        } else {
            echo '<div class="alert alert-info text-center" role="alert">';
            echo 'Keranjang belanja Anda kosong. <a href="index.php">Mulai belanja sekarang!</a>';
            echo '</div>';
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
mysqli_close($koneksi); // Menutup koneksi database
?>