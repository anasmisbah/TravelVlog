@extends('layouts.app')

@section('content')
  <div style="min-height: 200px;"></div>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
            @if(session('msg'))
              <div class="panel panel-success">
              <div class="panel-heading text-center">
                <p>{{session('msg')}}</p>
                </div>
                       @endif
            <div class="panel-body">
            <div class="container">
            <div class="row">
            <div class="col-md-7">
            Transaksi Anda sudah selesai! Silakan menunggu hingga admin mengkonfirmasi transaksi Anda. Terima kasih telah mempercayai TravelVlog untuk kebutuhan perjalanan Anda
            </div>
            </div>
            <p>Silahkan Klik Tombol Kembali untuk kembali ke menu Bookingan saya</p>
            <div class="row">
            <div class="col-md-4 col-md-offset-3">
            <a href="{{route('pembeli_order.index',['id'=>auth()->user()->pembeli->id])}}" class="btn btn-danger">Kembali</a>
            </div>
            </div>
            </div>
            </div>
          </div>
      </div>
  </div>
   </div>
@endsection
