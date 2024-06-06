@extends('layouts.app')

@section('content')
    <h1>{{ $brand->name }}</h1>
    <p>{{ $brand->description }}</p>
    <p>{{ $brand->price }}</p>
    <a href="{{ route('brands.edit', $brand->id) }}">Edit</a>

    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
