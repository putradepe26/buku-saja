<?php
    // Memeriksa apakah data dikirim menggunakan metode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form
        $nama = htmlspecialchars($_POST['nama']); // htmlspecialchars untuk mencegah XSS
        $harga = htmlspecialchars($_POST['harga']);
        $deskripsi = htmlspecialchars($_POST['deskripsi']);

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Saya</title>
</head>
<body>
    <h1>Form HTML</h1>
    <form method="POST">
        <label for="nama">Nama Produk :</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Kirim Data">
    </form>
</body>
</html>