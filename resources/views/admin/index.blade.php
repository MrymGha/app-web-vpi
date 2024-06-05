@extends('layouts.app')


@section('content')
    {{-- <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome to the admin dashboard.</p>
        <ul>
            <li><a href="{{ route('brands.index') }}">Manage Brands</a></li>
            <li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
            <li><a href="{{ route('products.index') }}">Manage Products</a></li>
        </ul>
    </div>
 --}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">E-Comm Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('brands.index') }}">Brands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
                    <a href="{{ route('brands.index') }}" class="list-group-item list-group-item-action">Brands</a>
                    <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action">Categories</a>
                    <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Products</a>
                    <a href="#" class="list-group-item list-group-item-action">Users</a>
                    <a href="#" class="list-group-item list-group-item-action">Settings</a>
                </div>
            </div>
            <div class="col-md-9">
                <h3>Dashboard</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Products</div>
                            <div class="card-body">
                                <h5 class="card-title">150</h5>
                                <p class="card-text">Total Products</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Orders</div>
                            <div class="card-body">
                                <h5 class="card-title">75</h5>
                                <p class="card-text">Total Orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Users</div>
                            <div class="card-body">
                                <h5 class="card-title">200</h5>
                                <p class="card-text">Total Users</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Additional content can go here -->
            </div>
        </div>
    </div>

@endsection