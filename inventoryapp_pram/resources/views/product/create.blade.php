@extends('layouts.master')
@section('title')
    Tambah Product

@endsection
@section('content')


    <form method="POST" action="/product" enctype="multipart/form-data">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Post Form -->
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="10"
                value="{{ old('description') }}"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" min=0>

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" min=0>

        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category</label>

            <select name="category_id" id="" class="form-control">
                <option value="">Select a Category</option>
                @forelse ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>

                @empty
                    <option value="">Tidak ada category</option>
                @endforelse

            </select>

        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/* image/jfif ">

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection