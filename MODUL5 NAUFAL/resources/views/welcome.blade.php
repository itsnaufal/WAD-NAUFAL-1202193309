@extends('layouts.app')
@section('body')
   @include('layouts.nav') 
   <div class="container">
       <h4 class="text-center mt-5">About Us</h4>
       <div class="row align-items-center">
           <div class="col-md-5">
               <img src="{{ asset('image/health.svg') }}" alt="">
           </div>
           <div class="col-md-7">
                <p class="fs-5">Vaksin dibuat untuk mencedah penyakit. Vaksin Covid-19 adalah harapan terbaik untuk menekan penularan virus corona. Mendapatkan vaksin COVID-19 maka bisa memberikan perlindungan kepada tubuh dengan menciptakan respons antibodi di tubuh tanpa harus sakit karena virus corona. Atau, apabila kamu tertular COVID-19, vaksi dapat mencegah tubuh dari sakit parah atau potensi hadirnya kompilasi serius. Dengan mendapatkan vaksin, kamu juga kan membantu melindungi orang orang sekitar dari virus corona. Terutama orang-orang yang berisiko tinggi terkena penyakit parah akibat COVID-19.</p>
           </div>
       </div>
   </div>
@endsection
