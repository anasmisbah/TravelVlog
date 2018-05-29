@extends('templates.master')

@section('content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Detail Order</h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Detail</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
            <div class="profile_img">
              <div id="crop-avatar">
                <!-- Current avatar -->
                <h3>Booking ID | {{$order->id}}</h3>
              </div>
            </div>
            <h4><i class="fa fa-user"></i>Nama Pembeli | {{$order->pembeli->nama}}</h4>
            <h4><i class="fa fa-calendar"></i>Tanggal Keberangkatan {{$order->tiket->date}}</h4>
            <h4><i class="fa fa-plane"></i>Asal | {{$order->tiket->from}}</h4>
            <h4><i class="fa fa-map-marker"></i>Tujuan | {{$order->tiket->to}}</h4>
            <h4><i class="fa fa-clock-o"></i>Keberangkatan | {{$order->tiket->departure}}</h4>
            <h4><i class="fa fa-clock-o"></i>Kedatangan | {{$order->tiket->arival}}</h4>
            <h4><i class="fa fa-ticket"></i>Total Tiket | {{$order->jml_tiket}}</h4>
            <h4><i class="fa fa-money"></i>Jumlah Pembayaran | {{$order->total_pembayaran}}</h4>
            <a href="{{route('order.index')}}" class="btn btn-default">Kembali</a>
            <br />
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Detail</a>
                </li>

              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  @if ($order->status == 0)
                    <p>Pembeli Belum Melakukan Upload Bukti Pembayaran. Silahkan Tunggu Hingga Waktu yang ditentukan</p>
                    <a href="{{route('order.cancel',['id'=>$order->id])}}" class="btn btn-danger">Batalkan Pemesanan</a>
                  @elseif ($order->status == 1)
                    <p>{{$order->pembeli->nama}} Sudah Melakukan Upload Bukati Pembayaran Silahkan Cek Butki Pembayaran Dibawah ini</p>
                    <img src="{{asset('storage/'.$order->bukti_pembayaran)}}" alt="" width="400px"><br>
                    <p>Jika Pembayaran Pembeli Telah Susuai Maka Silahkan Konfirmasi Pembayaran Dengan menekan tombol dibawah ini</p>

                    <form method="post" action="{{route('order.konfirmasibayar',['id' => $order->id])}}">
                      <input type="hidden" name="_method" value="PUT">
                      {{csrf_field()}}
                      <button type="submit" class="btn btn-primary">Konfirmasi Bukti Pembayaran</button>
                      <a href="{{route('order.cancel',['id'=>$order->id])}}" class="btn btn-danger">Batalkan Pemesanan</a>
                      <a href="{{route('order.salahbukti',['id'=>$order->id])}}" class="btn btn-warning">Bukti Pembayaran salah</a>
                    </form>

                  @elseif ($order->status == 2)
                    <h3>Konfirmasi Pembayaran Telah Berhasil</h3>
                    <p>Pembeli Bisa Melakukan Cetak E-Tiket Atau Langsung mengunduh E-tiket yang Telah Disediakan</p>
                    <p>Admin Silahkan tutup Orderan Jika waktu telah terlewat</p>
                    <a href="{{route('order.cancel',['id'=>$order->id])}}" class="btn btn-danger">Cancel Pemesanan</a>
                  @elseif ($order->status == 3)
                    <h3>Waiting Upload</h3>
                    <p>Menunggu pembeli {{$order->pembeli->nama}} untuk Mengupload ulang bukti pembayaran</p>

                      <a href="{{route('order.cancel',['id'=>$order->id])}}" class="btn btn-danger">Tutup</a>


                  @else
                    <h1>Closed</h1>
                  @endif
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
