<?php
    // Memeriksa apakah data dikirim menggunakan metode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form
        $nama = htmlspecialchars($trim($_POST['nama'])); // htmlspecialchars untuk mencegah XSS
        $harga = htmlspecialchars($trim($_POST['harga']));
        $deskripsi = htmlspecialchars($trim($_POST['deskripsi']));

        //Validasi Form Data
        if (empty($nama) || empty($harga))
        {
            echo "Nama Produk dan Harga harus diisi terlebih dahulu";
            exit;
        }

        // Menampilkan data yang diterima
        echo",<h1>Data berhasil disimpan!</h1>";
        echo "<p><strong>Nama:</strong> " . $nama . "</p>";
        echo "<p><strong>Harga:</strong> " . $harga . "</p>";
        echo "<p><strong>Deskripsi:</strong> " . $deskripsi . "</p>";

        // - Melakukan validasi lebih lanjut
        echo "<p>Data berhasil diproses!</p>";

    } else {
        // Jika diakses langsung tanpa submit form
        echo "<p>Tidak ada data yang dikirim.</p>";
    }
?>
