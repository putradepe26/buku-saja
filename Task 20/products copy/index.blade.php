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
            <a class="btn btn-primary" href="{{ route('products-tambah') }}"  data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
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
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->stock}}</td>
                    <td>Rp{{number_format($product->price, 0,",",".")}}</td>
                    <td>{{$product->image}}</td>
                    <td><img src="{{$product->cateogry->name}}" alt="Product A" class="img-fluid" style="max-height: 50px "></td>
                    <td>
                        <a href="{{route('products-edit')}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>1</td>
                    <td>Topi Dope</td>
                    <td>Topi berkualitas tinggi dan terjangkau</td>
                    <td>90</td>
                    <td>90000</td>
                    <td><img src="https://via.placeholder.com/150" ></td>
                    <td>
                        <a href="{{route('products-edit')}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
        {{$products->links()}}
    </div>

    <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST"> <div class="form-group">
                            <label for="namaProduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="namaProduk" name="nama_produk" placeholder="Masukkan nama produk" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsiProduk" class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" id="deskripsiProduk" name="deskripsi_produk" rows="3" placeholder="Deskripsikan produk Anda"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="hargaProduk" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="hargaProduk" name="harga_produk" min="0" placeholder="0" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategoriProduk" class="form-label">Kategori</label>
                            <select class="form-select" id="kategoriProduk" name="kategori_produk" required>
                                <option value="">Pilih Kategori</option>
                                <option value="1">Topi</option>
                                <option value="2">Pakaian</option>
                                <option value="3">Sepatu</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="gambarProduk" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control" id="gambarProduk" name="gambar_produk" accept="image/*">
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Produk</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProdukModalLabel">Edit Produk</h5>
                    <a href="#" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                     <formS>
                            <label for="namaProduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="namaProduk" name="nama_produk" placeholder="Masukkan nama produk" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsiProduk" class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" id="deskripsiProduk" name="deskripsi_produk" rows="3" placeholder="Deskripsikan produk Anda"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="hargaProduk" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="hargaProduk" name="harga_produk" min="0" placeholder="0" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategoriProduk" class="form-label">Kategori</label>
                            <select class="form-select" id="kategoriProduk" name="kategori_produk" required>
                                <option value="">Pilih Kategori</option>
                                <option value="1">Topi</option>
                                <option value="2">Pakaian</option>
                                <option value="3">Sepatu</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="gambarProduk" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control" id="gambarProduk" name="gambar_produk" accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update Produk</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>