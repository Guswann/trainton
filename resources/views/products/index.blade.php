@extends('master')

@section('title')
    <title>Categories</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Products</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-outline-primary">Tambah Produk</a>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>SKU</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $item)
                                            {{-- make edit delete --}}
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->sku }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->category_id }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->stock }}</td>
                                                <td>
                                                    <a href="{{ route('product.edit', $item->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('product.destroy', $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Belum Ada Data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
