@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="jumbotron">
        <!--  -->
        <div class="row">
          <h3 class="col-sm-6 col-sm-offset-3 text-center">Detail Pemesanan Tiket</h3>
        </div>
        <!--  -->
        <hr class="col-sm-7 col-sm-offset-2">
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
            {{$order->tiket->from}}
          </p>
          <i class="ion-arrow-right-c col-sm-1 text-center"></i>
          <p class="col-sm-3">
            {{$order->tiket->to}}
          </p>
          <p class="col-sm-5">
            {{$order->tiket->date}}
          </p>
        </div>
        <!--  -->
        <div class="row text-center" style="min-height: 40px">
          <div class="col-sm-3">
            ( {{$order->tiket->departure}} )
          </div>
          <div class="col-sm-5">
            ( {{$order->tiket->arrival}} )
          </div>
        </div>
        <!--  -->
        <hr>
        <!--  -->
        <div class="row text-center" >
          <div class="col-sm-3">
            Jumlah Tiket
          </div>
          <div class="col-sm-3">
            Total Harga
          </div>
          <div class="col-sm-3">
            Jenis Pesawat
          </div>
        </div>
        <!--  -->
        <div class="row text-center" style="min-height: 50px">
          <p class="col-sm-3">
            {{$order->jml_tiket}}
          </p>
          <p class="col-sm-3">
            Rp. {{$order->total_pembayaran}} ,-
          </p>
          <p class="col-sm-3">
            {{$order->tiket->unit}}
          </p>
        </div>
        <!--  -->
        <hr>
        <!--  -->

        @if ($order->status == 0)
        <div class="row">
          <small >
          - Klik Lakukan Pembayaran untuk upload bukti pembayaran agar dapat dikonfirmasi dengan pihak penerbangan.
          </small>
        </div>
        <div class="row" style="min-height: 40px">
          <small>
          - Klik Batalkan Pemesanan untuk membatalkan pemesanan tiket yang sudah Anda pesan.
          </small>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <a href="{{route('pembeli_order.transfer',['id' => $order->id])}}" class="btn btn-primary">Upload Bukti Pembayaran</a>
          </div>
          <div class="col-sm-3">
            <form  action="{{route('pembeli_order.cancelorder',['id' => $order->id])}}" method="post">
              {{csrf_field()}}

              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin membatalkan pemesanan? ');">Batalkan Pemesanan</button>
            </form>
          </div>
        </div>
        <!--  -->
        @elseif ($order->status == 1)
        <div class="row">
          <small >
          - Saat ini bukti pembayaran yang Anda kirim sedang diperiksa dan tiket yang Anda pesan dalam antrian. Mohon tunggu beberapa saat.
          </small>
        </div>
        <div class="row" style="min-height: 40px">
          <small>
          - Klik Cancel Pemesanan untuk membatalkan pemesanan tiket yang sudah Anda pesan.
          </small>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <a href="#" class="btn btn-primary">Menunggu Proses Konfirmasi</a>
          </div>
        </div>
        <!--  -->
        @elseif ($order->status == 2)
        <div class="row">
          <small >
          - Klik unduh PDF untuk mengunduh E-tiket.
          </small>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <a href="{{route('etiket.cetak',['id'=>$order->id])}}" class="btn btn-primary">Unduh PDF</a>

            {{-- <a href="{{route('etiket',['id'=>$order->id])}}" class="btn btn-primary">Cetak E-Tiket </a> --}}
          </div>

        </div>
        <!--  -->
        @elseif ($order->status == 3)
          <div class="row">
            <small >
            - Bukti Pembayaran yang telah anda masukkan terdapat kesalahan silahkan upload ulang
            </small>
          </div>
          <div class="row" style="min-height: 40px">
            <small>
            - Klik Batalkan Pemesanan untuk membatalkan pemesanan tiket yang sudah Anda pesan.
            </small>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <a href="{{route('pembeli_order.transfer',['id' => $order->id])}}" class="btn btn-primary">upload ulang bukti pembayaran</a>
            </div>
            <div class="col-sm-3">
              <form  action="{{route('pembeli_order.cancelorder',['id' => $order->id])}}" method="post">
                {{csrf_field()}}

                <button type="submit" class="btn btn-sm btn-danger">Batalkan Pemesanan</button>
              </form>
            </div>
          </div>
        @else
        <div class="row" style="min-height: 40px">
          <small >
          - Pemesanan Tiket Anda sudah tutup/berakhir.
          </small>
        </div>
        <div class="row" >

        <div class="col-sm-4 col-sm-offset-1">
          <div class="btn btn-default">Sudah Tutup</div>
        </div>
        </div>
        @endif
      </div>
      <!--  -->
    </div>
  </div>
</div>
</div>
@endsection
