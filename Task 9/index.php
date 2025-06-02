<?php
session_start(); // Mulai session di awal file
include 'koneksi.php'; // Memanggil file koneksi database

// Inisialisasi variabel filter kategori
$filter_kategori = '';
if (isset($_GET['kategori']) && !empty($_GET['kategori'])) {
    $filter_kategori = mysqli_real_escape_string($koneksi, $_GET['kategori']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online Sederhana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            margin-bottom: 20px;
        }
        .product-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Toko Online PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Keranjang
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
        <h1 class="mb-4 text-center">Produk Terbaru</h1>

        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <form action="" method="GET" class="d-flex align-items-center justify-content-center">
                    <label for="kategori_filter" class="form-label me-2 mb-0">Filter Kategori:</label>
                    <select class="form-select w-auto" id="kategori_filter" name="kategori" onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        <?php
                        // Ambil daftar kategori unik dari database
                        $query_kategori = "SELECT DISTINCT kategori FROM products WHERE kategori IS NOT NULL AND kategori != '' ORDER BY kategori ASC";
                        $result_kategori = mysqli_query($koneksi, $query_kategori);
                        while ($cat = mysqli_fetch_assoc($result_kategori)) {
                            $selected = ($filter_kategori == $cat['kategori']) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($cat['kategori']) . "' " . $selected . ">" . htmlspecialchars($cat['kategori']) . "</option>";
                        }
                        ?>
                    </select>
                </form>
            </div>
        </div>
        <div class="row">
            <?php
            // Membangun query berdasarkan filter
            $query = "SELECT * FROM products"; // Menggunakan 'products' sesuai file Anda
            if (!empty($filter_kategori)) {
                $query .= " WHERE kategori = '$filter_kategori'";
            }
            $query .= " ORDER BY id DESC"; // Urutkan produk terbaru tampil di atas

            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card product-card">
                        <?php
                        // Penanganan gambar kosong/tidak ada
                        $gambar_path = 'gambar/' . htmlspecialchars($row['gambar']);
                        if (!file_exists($gambar_path) || empty($row['gambar'])) {
                            $gambar_path = 'https://via.placeholder.com/200x200?text=No+Image'; // Gambar placeholder
                        }
                        ?>
                        <img src="<?php echo $row['gambar'] ?>" class="card-img-top product-image" alt="<?php echo htmlspecialchars($row['namaProduk']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['namaProduk']); ?></h5>
                            <p class="card-text">Kategori: <span class="badge bg-secondary"><?php echo htmlspecialchars($row['kategori']); ?></span></p>
                            <p class="card-text"><?php echo substr(htmlspecialchars($row['deskripsi']), 0, 100); ?>...</p>
                            <p class="card-text"><strong>Harga: Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></strong></p>
                            <form method="POST">
                            <div class="mb-3">
                                <input type="number" name="quantity" class="form-control" min="1" max="<? $row['stok']?>" value="1" required>
                            </div>
                            
                            <a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Tambah ke Keranjang</a>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>Belum ada produk yang tersedia dalam kategori ini.</p>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
mysqli_close($koneksi); // Menutup koneksi database
?>