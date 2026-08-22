@extends('layouts.master')
@section('title')
    Tampil Transaction
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="/transaction/create" class="btn btn-primary btn-sm my-3">Input Transaction</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Product</th>
                <th scope="col">Type (In Out)</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>

            @forelse($transactions as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>
                        @if ($item->type === 'in')
                            <span class="btn btn-primary btn-sm disabled">in</span>
                        @else
                            <span class="btn btn-danger btn-sm disabled">out</span>
                        @endif
                    </td>
                    <td>{{ $item->amount }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Transaksi masih kosong</td>
                </tr>
            @endforelse

        </tbody>
    </table>

@endsection