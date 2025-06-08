<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-light">{{__('Edit Kategori')}}</h2>
    </x-slot> 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="#" method="POST"> <div class="form-group">
                <label for="namaKategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="namaKategori" name="nama_kategori" placeholder="Masukkan nama kategori" required>
            </div>
            <div class="form-group">
                <label for="jumlahProduk" class="form-label">Jumlah Produk</label>
                <input type="number" class="form-control" id="jumlahProduk" name="jumlah_produk" value="0" min="0" placeholder="Masukkan jumlah produk (opsional)">
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="kategori_pondok.html" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Perbarui Kategori
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>