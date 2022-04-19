@extends('layouts.main')

@section('main')
    <h1>Sellers</h1>
    <a href="{{ route('sellers.create') }}">Create Seller</a>
    <br/>
    <br/>
    <table>
        <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sellers as $seller)
            <tr>
                <td>{{ $seller->first_name }}</td>
                <td>{{ $seller->last_name }}</td>
                <td>{{ $seller->created_at }}</td>
                <td>
                    {{--                        <a href="{{ route('sellers.edit', ['seller' => $seller->id]) }}">Edit</a>--}}
                    <a href="{{ route('sellers.edit', [$seller]) }}">Edit</a>
                    <form action="{{ route('sellers.destroy', [$seller]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
