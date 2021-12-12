<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- FONT AWSOME4 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>EAD Health Center</title>
  </head>
  <body>
      <section style="min-height: 95vh;">
        @yield('body')
      </section>
      <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesan Pesan Praktikum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Kesan: <p class="fw-light d-inline">Jika Praktikum WAD ini dianalogikan sebagai les renang, pertemuan ke 1-3 itu cuman langkah langkah tentang cara renang, lalu pertemuan ke 4-5 itu si murid langsung disuruh berenang antar benua. <i class="fa fa-smile-o" aria-hidden="true"></i>                </p>
                <br>
                <br>
                Pesan: <p class="d-inline fw-light">Akan lebih baik jika, praktikum WAD ini dilengkapi juga dengan video tutorial seperti pada praktikum SCM. Agar si calon murid dimasa depan tidak kesulitan dalam mengarungi rintanganya disamudra.</p>
                <br>
                <br>
                Pesan Untuk Kak Thasya: <p class="d-inline fw-light">Makasih kak thasyaaa udah ngebantuin aku di praktikum WAD selama 1 semester ini, <p class="text-decoration-line-through d-inline">Ga</p><p class="d-inline fw-light"> Kerasa Sekarang udah modul terakhir lagi, Maafin aku kalau aku ada salah dan nyusahin kakak. Kakak semangat ya NgeTA nya! semoga dilancarkan terus sampai wisuda nanti Aaamiin.</p>
            
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
      <footer>
          <div class="text-center pb-1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Made with <i class="fa fa-heart text-primary" aria-hidden="true"></i> Muhammad Naufal Wirawan - 1202193309
          </div>
      </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
