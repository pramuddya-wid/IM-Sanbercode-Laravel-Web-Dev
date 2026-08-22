@extends('layouts.master')
@section('title')
    Tambah Transaction
@endsection

@section('content')

    <form method="POST" action="/transaction">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        <div class="mb-3">
            <label class="form-label">Product</label>
            <select name="product_id" class="form-control">
                <option value="">Select a Product</option>
                @forelse ($products as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} (Stok: {{ $item->stock }})</option>
                @empty
                    <option value="">Tidak ada product</option>
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="type" class="form-control">
                <option value="in">in (Produk Masuk)</option>
                <option value="out">out (Produk Keluar)</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" min="1">
        </div>

        <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control" cols="30" rows="5">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection