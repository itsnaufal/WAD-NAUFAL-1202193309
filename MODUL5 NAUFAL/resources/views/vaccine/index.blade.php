    @extends('layouts.app')
    @section('body')
        @include('layouts.nav')
        <div class="container mt-5">
            <h4 class="text-center mb-5">List Vaccine</h4>
            <div class="text-center mb-5">
                <a href="{{ route('vaccine.create') }}" class="btn btn-primary">Tambah Vaksin</a>
            </div>
            @if($vaccines->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vaccines as $vaccine)
                        <tr>
                            <th scope="row">{{ ($loop->index+1) }}</th>
                            <td>{{ $vaccine->name }}</td>
                            <td>Rp. {{ $vaccine->price }}</td>
                            <td>
                                <a href="{{ route('vaccine.edit', $vaccine->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('vaccine.delete', $vaccine->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="mt-5 pt-5">
                    <p class="text-center">Datanya ngga ada :( yu tambahin dulu</p>
                </div>
            @endif
        </div>
    @endsection
