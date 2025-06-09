<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-light">{{__('Edit Produk')}}</h2>
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
         <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data"> <div class="form-group" >
            @method('PUT') 
            @csrf
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="namaProduk" name="name" value="{{$product->name}}" placeholder="Masukkan nama produk" required>
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Deskripsi Produk</label>
                <textarea class="form-control" id="deskripsiProduk" name="description" rows="3" placeholder="Deskripsikan produk Anda">
                    {{$product->description}}
                </textarea>
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Harga</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product('price')}}"  min="0" placeholder="0" required>
                </div>
            </div>
            <div class="form-group">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"{{$product->category_id == id ? 'selected' : ''}}>{{$category->name}}<</option>
                    @endforeach
                </select>
            </div>
            <img src="{{asset($product->image)}}" alt="{{$product->name}}" width="100">
            <div class="form-group">
                <label for="gambarProduk" class="form-label">Gambar Produk</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            
            <div class="d-flex justify-content-between mt-4">
                <a href="kategori_pondok.html" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali ke Produk
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Perbarui Produk
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>