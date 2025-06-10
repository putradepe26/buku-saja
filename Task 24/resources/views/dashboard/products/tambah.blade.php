<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-light">{{__('Tambah Produk Baru')}}</h2>
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
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
        @endif
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
         <form action="{{route('product.store')}}" method="POST"> <div class="form-group" enctype="multipart/form-data">
            @csrf
                <label for="namaProduk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="namaProduk" name="nama_produk" value="{{old('name')}}" placeholder="Masukkan nama produk" required>
            </div>
            <div class="form-group">
                <label for="deskripsiProduk" class="form-label">Deskripsi Produk</label>
                <textarea class="form-control" id="deskripsiProduk" name="deskripsi_produk" rows="3" placeholder="Deskripsikan produk Anda">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="hargaProduk" class="form-label">Harga</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control" id="price" name="price"  value="{{old('price')}}" min="0" placeholder="0" required>
                </div>
            </div>
            <div class="form-group">
                <label for="hargaProduk" class="form-label">Stok</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control" id="stock" name="stock"  value="{{old('stock')}}" min="0" placeholder="0" required>
                </div>
            </div>
            <div class="form-group">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-select" id="category_id" value="{{old('category_id')}}" name="kategori_produk" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ old('category_id') == $category->id ?'@selected :'}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="gambarProduk" class="form-label">Gambar Produk</label>
                <input type="file" class="form-control" id="gambarProduk" name="gambar_produk" accept="image/*">
            </div>

            <div class="form-group">
                <label for="category_id" class="form-label">Kategori</label>
                <input type="file" class="form-control" id="gambarProduk" name="gambar_produk" accept="image/*">
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{(route('products-index'))}}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali ke Kategori
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan Produk
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>