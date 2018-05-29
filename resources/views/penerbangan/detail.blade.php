@extends('layouts.app')

@section('content')
<section class="awal">
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <h2 class="col-sm-6 col-sm-offset-3 text-center">Detail Tiket</h2>
      </div>
      <!--  -->
      <hr class="col-sm-6 col-sm-offset-3">
      <!--  -->
      <div class="row text-center" >
        <div class="col-sm-3">
          Asal
        </div>
        <div class="col-sm-5">
          Tujuan
        </div>
        <div class="col-sm-3" >
          Tanggal Keberangkatan
        </div>
      </div>
      <!--  -->
      <div class="row text-center" style="min-height: 20px">
        <p class="col-sm-3">
          {{$tiket->from}}
        </p>
        <i class="ion-arrow-right-c col-sm-1 text-center"></i>
        <p class="col-sm-3">
          {{$tiket->to}}
        </p>
        <p class="col-sm-5">
          {{$tiket->date}}
        </p>
      </div>
      <!--  -->
      <div class="row text-center" style="min-height: 40px">
        <div class="col-sm-3">
          ( {{$tiket->departure}} )
        </div>
        <div class="col-sm-5">
          ( {{$tiket->arrival}} )
        </div>
      </div>
      <!--  -->
      <hr>
      <!--  -->
      <div class="row text-center" style="min-height: 40px">
        <div class="col-sm-3">
          Jenis Pesawat
        </div>
        <div class="col-sm-3">
          Harga Tiket
        </div>
        <div class="col-sm-3">
          @if ($jml == 0)
            <label for="jml_tiket">Masukkan Jumlah Tiket</label>
          @endif

        </div>
      </div>
      <div class="row text-center">
        <p class="col-sm-3">
          {{$tiket->unit}}
        </p>
        <div class="col-sm-3">
          <p class="label label-primary">Rp. {{$tiket->cost}} ,-</p>
          @if ($jml == 0)
          @else
          <p>Jumlah Tiket {{$jml}}</p>
          <p>Total Pembayaran {{$total}}</p>
          @endif
        </div>

        <form method="post" action="{{route('penerbangan.order')}}" class="form-horizontal">
          <div class="col-sm-3">
            <input type="hidden" name="tiket_id" value="{{$tiket->id}}">
            <input type="hidden" name="pembeli_id" value="{{auth()->user()->pembeli->id}}">
            <input type="hidden" name="total_pembayaran" value="{{$total}}">
            @if ($jml == 0)
            <input type="number" name="jml_tiket" value="" id="jml_tiket">
            @else
            <input type="hidden" name="jml_tiket" value="{{$jml}}">
            @endif
          </div>
          <div class="col-sm-3 text-left">
            {{csrf_field()}}
            <button type="submit" name="button" class="btn btn-primary">Lanjut Booking</button>
          </div>

        </form>
      </div>

    </div>

  </div>
</section>

@endsection
