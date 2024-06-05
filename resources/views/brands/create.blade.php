@extends('layouts.app')

@section('content')
    <h1>Create Brand</h1>
    <form action="{{ route('brands.store') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
