@extends('layouts.master')
@section('title')
    Tampil Category

@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="/category/create" class="btn btn-primary btn-sm my-3">create</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @forelse($categories as $item)

                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>
                        <form action="/category/{{ $item->id }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <a href="/category/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/category/{{ $item->id }}/edit" class="btn btn-primary btn-sm">Edit</a>

                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">

                        </form>
                    </td>

                </tr>



            @empty
                <tr>
                    <td>Kategori masih kosong</td>
                </tr>

            @endforelse


        </tbody>
    </table>





@endsection