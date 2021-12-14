    @extends('layouts.app')
    @section('body')
    @include('layouts.nav') 
    <div class="container">
        <h4 class="text-center mt-5 mb-5">List Vaccine</h4>
        <div class="row">
                @foreach ($vaccines as $vaccine)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/'.$vaccine->image) }}" height="300px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $vaccine->name }}</h5>
                                <p class="text-secondary">Rp {{ $vaccine->price }}</p>
                                <p class="card-text">{{ $vaccine->description }}</p>
                            </div>
                            <div class="card-footer mt-auto d-grid">
                                <a href="{{ route('patient.create', $vaccine->id) }}" class="btn btn-primary btn-block">Vaccine Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
    <br>
    <br>
    <br>

    @endsection
