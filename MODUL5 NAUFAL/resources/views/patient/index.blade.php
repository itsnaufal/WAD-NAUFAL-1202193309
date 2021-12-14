    @extends('layouts.app')
    @section('body')
        @include('layouts.nav')
        <div class="container mt-5">
            <h4 class="text-center mb-5">List Pasien</h4>
            <div class="text-center mb-5">
                <a href="{{ route('patient.create_vaccine') }}" class="btn btn-primary">Register Pasien</a>
            </div>
            @if($patients->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Vaccine</th>
                        <th scope="col">Name</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $patient->vaccine->name }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->nik }}</td>
                                <td>{{ $patient->alamat }}</td>
                                <td>{{ $patient->no_hp }}</td>
                                <td>
                                    <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('patient.delete', $patient->id) }}" class="btn btn-danger">Delete</a>
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
