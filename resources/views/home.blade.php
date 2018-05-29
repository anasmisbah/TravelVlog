
@extends('layouts.app')

@section('content')

<div class="container"  >
    <div class="row" style="min-height: 200px">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-warning">
        <div class="panel-heading text-center">
            <h3>Selamat Datang {{ auth()->user()->username }}</h3>
            </div>
            </div>

            <div class="row" style="min-height: 200px;">
              <div class="col-md-12" >
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/bintang.png" alt="">
                <img class="animasi" src="img/plane.png" style="height: 80px; width:80px" alt="">
              </div>
            </div>
 </div>
    </div>
    <div class="row">
     <div class="col-md-4 col-md-offset-4 text-center">
      <h1 class="animasi"> Cara Memesan</h1>
     </div>
    </div>
    <div class="row" style="min-height: 400px;">
      <div class="col-md-12 col-md-offset-1">

        <img class="animasi" src="img/bulat4.png" style="height: 200px; width: 200px" alt="">
        <img class="animasi" src="img/bulat4.1.png" style="height: 30px; width: 30px;" alt="">
        <img class="animasi" src="img/bulat4.1.png" style="height: 30px; width: 30px;" alt="">
        <img class="animasi" src="img/bulat22.png" style="height: 200px; width: 200px"  alt="">
        <img class="animasi" src="img/bulat2.png" style="height: 30px; width: 30px;" alt="">
        <img class="animasi" src="img/bulat2.png" style="height: 30px; width: 30px;" alt="">
        <img class="animasi" src="img/bulat3.png" style="height: 200px; width: 200px" alt="">
        <img class="animasi" src="img/bulat.png" style="height: 30px; width: 30px;" alt="">
        <img class="animasi" src="img/bulat.png" style="height: 30px; width: 30px;" alt="">
        <img class="animasi" src="img/bulat5.png" style="height: 200px; width: 200px" alt="">

      </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <h1 class="wow fadeInDown">
            Atau bisa juga dengan melihat penerbangan yang tersedia di bawah ini
          </h1>
        </div>
      </div>
      <div class="row" style="min-height: 300px;">
        <div align="center" class="col md-2 ">
          <i class="wow fadeInDown ion-arrow-down-a" style="font-size: 100px; color: aqua;" ></i>

        </div>
      </div>
              {{-- <div class="row">

              <div class="col-md-6 col-md-offset-4">
              <div class="panel panel-info" style="width: 300px">
                <div class="panel-heading text-center" >penerbangan yang ada</div></div>
              </div> --}}
              @foreach ($tiket as $Tiket)
                <div class="panel panel-default wow fadeInRight">
                <div class="panel-body ">

                   <div class="row" style="min-height: 30px">
                      <div class="col-md-3">
                    {{ $Tiket->unit }} | {{ $Tiket->date }}
                   </div>
                   </div>

                  <div class="row">
                    <div class="col-md-2">
                      {{ $Tiket->Kategori->kategori}}
                    </div>
                  </div>
                  <div class="row" style="min-height: 40px">
                     <div class="col-md-3 text-center" >
                       asal {{ $Tiket->from }}  <hr>
                     </div>
                      <div class="col-md-1">
                       <i class="ion-arrow-right-c"></i>
                     </div>
                     <div class="col-md-3 text-center">
                      tujuan {{ $Tiket->to }}<hr>
                     </div>

                     <div class="col-md-3 col-md-offset-2">
                       harga {{ $Tiket->cost }}
                     </div>
                   </div>
                   <div class="row" style="min-height: 40px">
                   <div class="col-md-3 text-center">
                      waktu1 {{ $Tiket->departure }}
                   </div>
                   <div class="col-md-3 col-md-offset-1 text-center">
                     waktu2 {{ $Tiket->arrival }}
                   </div>
                   <div class="col-md-3 col-md-offset-2">
                    <a href="{{route('penerbangan.detail',['id'=> $Tiket->id,'jml' => 0])}}" class="btn btn-primary">Detail</a> </td>
                   </div>
                    <div class="col-md-3">

                    </div>
                   </div>
                  </div>
                  </div>
              @endforeach

              {{ $tiket->links() }}
        </div>
@endsection
