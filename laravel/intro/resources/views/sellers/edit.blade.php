@extends('layouts.main')

@section('main')
    <h1>Edit Seller</h1>
    <form action="{{ route('sellers.update', ['seller' => $seller->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <label>
            First name
            <input name="first_name" type="text" value="{{ $seller->first_name }}">
        </label>
        <label>
            Last name
            <input name="last_name" type="text" value="{{ $seller->last_name }}">
        </label>
        <label>
            Phone
            <input name="phone" type="text" value="{{ $seller->phone }}">
        </label>
        <label>
            Code
            <input name="code" type="text" value="{{ $seller->code }}">
        </label>
        <label>
            DNI
            <input name="dni" type="text" value="{{ $seller->dni }}">
        </label>
        <button type="submit">Edit</button>
    </form>
@endsection
