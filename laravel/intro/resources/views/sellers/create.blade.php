@extends('layouts.main')

@section('main')
    <h1>Create Seller</h1>

    <form action="{{ route('sellers.store') }}" method="post">
        @csrf
        <label>
            First name
            <input name="first_name" type="text">
        </label>
        <label>
            Last name
            <input name="last_name" type="text">
        </label>
        <label>
            Phone
            <input name="phone" type="text">
        </label>
        <label>
            Code
            <input name="code" type="text">
        </label>
        <label>
            DNI
            <input name="dni" type="text">
        </label>
        <button type="submit">Create</button>
    </form>
@endsection
