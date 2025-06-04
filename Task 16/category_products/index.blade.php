@extends('layout')
@section('title', 'Kategori Produk')
@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Manajemen Kategori Produk</h2>

    <div class="mb-3">
        <a href="#" class="btn btn-primary">Tambah Kategori</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Example rows - In a real application, you would loop through your categories here --}}
                <tr>
                    <td>1</td>
                    <td>Elektronik</td>
                    <td>150</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Pakaian Pria</td>
                    <td>230</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Pakaian Wanita</td>
                    <td>300</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Aksesoris</td>
                    <td>80</td>
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