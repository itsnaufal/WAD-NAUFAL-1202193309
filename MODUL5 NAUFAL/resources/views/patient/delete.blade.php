@extends('layouts.app')
@section('body')
    @include('layouts.nav')
    <div class="container mt-5">
        <h4 class="text-center">Delete Patient</h4>
        <form action="{{ route('patient.destroy', $patient->id) }}" method="POST" enctype="multipart/form-data">
            @method('delete')
            @csrf
            <div class="mb-3">
                <label for="patient" class="form-label">Patient Name</label>
                <input type="text" class="form-control" id="patient" name="name" value="{{ $patient->name }}" disabled>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Hapus</button>
        </form>
    </div>
@endsection
