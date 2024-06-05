@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price">
        </div>
        <div>
            {{-- <label>Photo</label>
            <input type="text" name="photo"> --}}
            <label for="image">Product Photo</label>
            <input type="file" class="form-control-file" id="image" name="photo">
        </div>
        <div>
            <label>Brand</label>
            <select name="brand_id">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Category</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Stock quantity</label>
            <input type="text" name="stock_quanity">
        </div>
        <button type="submit">Create</button>
    </form>

    {{-- <h3>Add New Product</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form> --}}
@endsection
