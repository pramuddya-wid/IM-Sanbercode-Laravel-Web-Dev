@extends('layouts.master')
@section('title')
    Tampil Product
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Auth::check() && Auth::user()->role === 'admin')
        <a href="/product/create" class="btn btn-sm btn-primary my-3">Tambah</a>
    @endif

    <div class="row g-4">
        @forelse ($products as $item)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card h-100 w-100 shadow-sm">

                    <img class="card-img-top" src="{{ asset('image/' . $item->image) }}"
                        style="height: 200px; object-fit: cover;" alt="{{ $item->name }}">


                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ Str::limit($item->name, 50, '...') }}</h5>

                        @if (Auth::check() && Auth::user()->role === 'admin')

                            <a href="/category/{{ $item->category_id }}"
                                class="badge bg-primary text-white align-self-start mb-2">{{$item->category->name}}</a>

                        @else
                            <span class="badge bg-primary text-white align-self-start mb-2">{{$item->category->name}}</span>
                        @endif


                        <h6 class="text-primary">{{ $item->price}}</h6>
                        <h6 class="text-primary">stock: {{ $item->stock}}</h6>
                        <p class="card-text text-muted">{{ Str::limit($item->description, 100, '...') }}</p>


                        <div class="d-grid mt-auto pt-3">
                            <a href="/product/{{ $item->id }}" class="btn btn-primary">Read More</a>
                        </div>
                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <div class="row">
                                <div class="col">
                                    <div class="d-grid mt-auto pt-3">
                                        <a href="/product/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>

                                    </div>

                                </div>
                                <div class="col">
                                    <div class="d-grid mt-auto pt-3">
                                        <form action="/product/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <input type="submit" value="Delete" class="btn btn-danger">

                                        </form>

                                    </div>


                                </div>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <h4 class="text-center text-muted">Tidak ada produk</h4>
            </div>
        @endforelse
    </div>

@endsection