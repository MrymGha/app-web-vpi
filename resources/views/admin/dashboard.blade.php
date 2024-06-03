{{-- resources/views/admin/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin dashboard.</p>
    <ul>
        <li><a href="{{ route('brands.index') }}">Manage Brands</a></li>
        <li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
        <li><a href="{{ route('products.index') }}">Manage Products</a></li>
    </ul>
@endsection
