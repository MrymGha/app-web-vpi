@extends('layouts.app')

@section('content')
    <h1>Edit Brand</h1>
    <form action="{{ route('brands.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>
        
        <button type="submit">Update</button>
    </form>
@endsection