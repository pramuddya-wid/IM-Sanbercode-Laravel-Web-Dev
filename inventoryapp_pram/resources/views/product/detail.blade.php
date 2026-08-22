@extends('layouts.master')
@section('title', 'Detail Product')
@section('content')

    <img src="{{ asset('image/' . $products->image) }}" width="100%" height="400px" alt="" style="object-fit: cover;">

    <h1 class="text-primary mt-3">{{ $products->name }}</h1>
    @if (Auth::check() && Auth::user()->role === 'admin')

        <a href="/category/{{ $products->category_id }}"
            class="badge bg-primary text-white align-self-start mb-2">{{$products->category->name}}</a>

    @else
        <span class="badge bg-primary text-white align-self-start mb-2">{{$products->category->name}}</span>
    @endif
    <h5 class="text-primary">{{ $products->price }}</h5>
    <h5 class="text-primary"> stock: {{ $products->stock }}</h5>
    <p>{{ $products->description }}</p>
    <a href="/product" class="btn btn-secondary btn-sm">Kembali</a>


@endsection