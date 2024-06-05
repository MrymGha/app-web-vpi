@extends('layouts.app')

@section('content')
    <h1>Brands</h1>
    <a href="{{ route('brands.create') }}">Create Brand</a>
    <ul>
        @foreach ($brands as $brand)
            <li>
                <a href="{{ route('brands.show', $brand->id) }}">{{ $brand->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
