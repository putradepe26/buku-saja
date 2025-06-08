<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-light">{{__('Daftar Kategori Baru')}}</h2>
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
            <button class="btn btn-primary" href="{{ route('category-products-tambah') }}" data-bs-target="#tambahKategoriModal">
                <i class="fas fa-plus"></i> Tambah Kategori
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Produk</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pondok Pesantren Modern</td>
                        <td>150</td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm btn-action" data-bs-toggle="modal" data-bs-target="#editKategoriModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-danger btn-sm btn-action">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pondok Tahfiz Al-Qur'an</td>
                        <td>80</td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm btn-action" data-bs-toggle="modal" data-bs-target="#editKategoriModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-danger btn-sm btn-action">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pondok Salafiyah</td>
                        <td>120</td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm btn-action" data-bs-toggle="modal" data-bs-target="#editKategoriModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-danger btn-sm btn-action">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    </tbody>
            </table>
        </div>
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