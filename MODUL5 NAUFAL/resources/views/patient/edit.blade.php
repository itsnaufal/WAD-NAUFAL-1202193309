    @extends('layouts.app')
    @section('body')
        @include('layouts.nav')
        <div class="container mt-5">
            <h4 class="text-center">Edit {{ $patient->vaccine->name }} Patient</h4>
            <form action="{{ route('patient.update', $patient->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="vaccine" class="form-label">Vaccine Id</label>
                    <input type="text" class="form-control" id="vaccine" value="{{ $patient->vaccine->id }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Patient Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik" value="{{ $patient->nik }}">
                    @error('nik')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $patient->alamat }}">
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">KTP</label>
                    <input class="form-control" type="file" id="formFile" name="image_ktp">
                    @error('image_ktp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ $patient->no_hp }}">
                    @error('no_hp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </form>
        </div>
    @endsection
