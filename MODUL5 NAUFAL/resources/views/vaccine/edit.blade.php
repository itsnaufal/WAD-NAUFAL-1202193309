@extends('layouts.app')
@section('body')
    @include('layouts.nav')
    <div class="container mt-5">
        <h4 class="text-center">Edit Vaccine</h4>
        <form action="{{ route('vaccine.update', $vaccine->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="vaccine" class="form-label">Vaccine Name</label>
                <input type="text" class="form-control" id="vaccine" name="name" value="{{ $vaccine->name }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <label for="price" class="form-label">Price</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp</span>
                <input type="number" class="form-control" id="price" name="price" aria-describedby="basic-addon1" value="{{ $vaccine->price }}">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description" name="description">{{ $vaccine->description }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" name="image"  value="{{ $vaccine->image }}">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
@endsection
