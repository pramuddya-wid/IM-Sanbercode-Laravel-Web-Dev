@extends('layouts.master')
@section('title')
    Detail Category

@endsection
@section('content')

    <h1 class="text-primary">{{ $categories->name }}</h1>
    <p>{{ $categories->description }}</p>
    <a href="/category" class="btn btn-secondary btn-sm">Kembali</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name Product</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories->products as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$item->name  }}</td>
                    <td> <a href="/product/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a> </td>
                </tr>
            @empty
                <tr>
                    <td>
                        Tidak ada produk
                    </td>
                </tr>
            @endforelse


        </tbody>
    </table>

@endsection