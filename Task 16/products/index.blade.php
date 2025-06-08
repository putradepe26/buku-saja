<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-light">{{__('Daftar Produk Baru')}}</h2>
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
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-primary" href="#" data-bs-target="#tambahProdukModal">
                <i class="fas fa-plus"></i> Tambah Produk
            </button>
        </div>

        <div class="table-responsive">
        <table class="table table-bordered ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Example rows - In a real application, you would loop through your categories here --}}
                <tr>
                    <td>1</td>
                    <td>Topi Dope</td>
                    <td>Topi berkualitas tinggi dan terjangkau</td>
                    <td>90</td>
                    <td>90000</td>
                    <td><img src="https://via.placeholder.com/150" ></td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                {{-- End of example rows --}}
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="namaKategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="namaKategori" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlahProduk" class="form-label">Jumlah Produk</label>
                            <input type="number" class="form-control" id="jumlahProduk" value="0" min="0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Kategori</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editKategoriModal" tabindex="-1" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKategoriModalLabel">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editNamaKategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="editNamaKategori" value="Pondok Pesantren Modern" required>
                        </div>
                        <div class="mb-3">
                            <label for="editJumlahProduk" class="form-label">Jumlah Produk</label>
                            <input type="number" class="form-control" id="editJumlahProduk" value="150" min="0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update Kategori</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>