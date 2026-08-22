@extends('layouts.master')
@section('title')
    Update Profile

@endsection
@section('content')

    <form action="/profile" method="POST">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Create Post Form -->
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Age</label>
            <input type="number" name="age" value="{{ old('age', $profile->age) }}" class="form-control " min=10>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Bio</label>
            <textarea name="bio" class="form-control" cols="30" rows="10">{{ old('bio', $profile->bio) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection