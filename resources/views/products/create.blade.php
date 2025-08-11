@extends('master')

@section('title')
    <title>Add Categories</title>
@endsection

@section('content')
    <section class="section">
        <section class="section-header">
            <h1>Add Product</h1>
        </section>
        <section class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('product.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <table class="table table-bordered">
                            <tr>
                                <td>SKU</td>
                                <td><input type="text" class="form-control" name="sku" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" class="form-control" name="name" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Kategori ID</td>
                                <td>
                                    {{-- <input type="text" class="form-control" name="category_id" autocomplete="off"> --}}
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="text" class="form-control" name="price" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td><input type="text" class="form-control" name="stock" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><button class="btn btn-primary" type="submit">Save</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </section>
    </section>
@endsection
