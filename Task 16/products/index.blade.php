@extends('layout')
@section('title', 'Produk')
@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Manajemen  Produk</h2>

    <div class="mb-3">
        <a href="#" class="btn btn-primary">Tambah Produk</a>
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

    {{-- Pagination can be added here if you have many categories --}}
    {{-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav> --}}

</div>
@endsection