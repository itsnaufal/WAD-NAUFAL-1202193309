@extends('layouts.app')
@section('body')
    @include('layouts.nav')
    <div class="container mt-5">
        <h4 class="text-center">Delete Vaccine</h4>
        <form action="{{ route('vaccine.destroy', $vaccine->id) }}" method="POST" enctype="multipart/form-data">
            @method('delete')
            @csrf
            <div class="mb-3">
                <label for="vaccine" class="form-label">Vaccine Name</label>
                <input type="text" class="form-control" id="vaccine" name="name" value="{{ $vaccine->name }}" disabled>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Hapus</button>
        </form>
    </div>
@endsection
