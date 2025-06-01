<?php
$host = "localhost"; // Ganti jika database Anda di server lain
$user = "root"; // Ganti dengan nama pengguna database Anda
$pass = ""; // Ganti dengan kata sandi database Anda
$db = "e-commerce"; // Nama database yang Anda buat

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>