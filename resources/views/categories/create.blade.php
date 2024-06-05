@extends('layouts.app')

@section('content')
    <h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
