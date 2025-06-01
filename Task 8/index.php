<?php
include 'koneksi.php'; // Memanggil file koneksi database

// Inisialisasi variabel filter kategori
$filter_kategori = '';
if (isset($_GET['kategori']) && !empty($_GET['kategori'])) {
    // Sanitize input untuk mencegah SQL Injection
    $filter_kategori = mysqli_real_escape_string($koneksi, $_GET['kategori']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Davipp E-Commerce</title>
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
            <a class="navbar-brand" href="#">Toko Online Davipp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Keranjang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
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
            $query = "SELECT * FROM products";
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
                        // Asumsi folder gambar ada di 'gambar/'
                        $gambar_path = 'gambar/' . htmlspecialchars($row['gambar']);
                        // Cek apakah file gambar ada atau kolom gambar kosong
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
                            <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                            <a href="#" class="btn btn-success btn-sm">Tambah ke Keranjang</a>
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