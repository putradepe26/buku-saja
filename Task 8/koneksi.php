<?php
$servername = "localhost"; // Ganti jika host database Anda berbeda
$username = "root";     // Ganti dengan username database Anda
$password = "";         // Ganti dengan password database Anda (kosong jika tidak ada)
$dbname = "e-commerce"; // Nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// echo "Koneksi berhasil"; // Uncomment ini untuk tes koneksi awal
?>