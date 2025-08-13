@extends('master')

@section('content')
    <section class="section">
        <section class="section-header">
            <h1>Edit Product</h1>
        </section>
        <div class="container">
            <section class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" name="sku" value="{{ old('sku', $product->sku) }}"
                                    class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Product</label>
                                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                    class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="price" value="{{ old('price', $product->price) }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                                    class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
        </div>
    </section>
@endsection
