@extends('layouts.app')

@section('content')
  @if(session('msg'))
  <div class="alert alert-success">
    <p>{{session('msg')}}</p>
  </div>
  @endif

  <div class="sidenav">
    <ul class="nav">
      <li ><a href="{{route('penerbangan.index')}}">Cari Penerbangan</a></li>
    </ul>
  </div>

  <div class="container-fluid">
    <div class="row">

      <div class="col-md-9 ">
        <div class="row">
          <div class="panel panel-info col-sm-4 col-sm-offset-7 text-center">
            <h4>Pesanan Saya</h4>
          </div>
        </div>
        <!-- Data Booking -->
        @foreach($orders as $order)
        <div class="terserah2 panel panel-info col-sm-8 col-sm-offset-5 ">
          <div class="panel-body">
            <div class="row" style="min-height: 40px">
              <div class="col-sm-2">
                {{ $order->tiket->from }}
              </div>
              <i class="ion-arrow-right-c col-sm-2 text-center"></i>
              <div class="col-sm-2">
                {{ $order->tiket->to }}
              </div>
            </div>
            <div class="row">
              <div class="col-sm-1">
                <p class="small">Status</p>
              </div>
              <div class="col-sm-3 text-left">
                @if ($order->status==0)
                <span class="label label-warning">Belum bayar</span>
                @elseif ($order->status==1)
                <span class="label label-info">Menunggu Konfirmasi</span>
                @elseif ($order->status==2)
                <span class="label label-success">Telah Dibayar</span>
                @elseif ($order->status==3)
                <span class="label label-default">Kesalahan Upload</span>
                @elseif ($order->status==4)
                <span class="label label-default">Close</span>
                @endif
              </div>
              <div class="col-sm-3 ">
                Jumlah Tiket  : {{ $order->jml_tiket }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                {{ $order->tiket->unit }}
              </div>
              <div class="col-sm-4">
                <small>Tanggal Keberangkatan</small>
                {{ $order->tiket->date }}
              </div>
            <!-- </div>
            <div class="row"> -->
              <div class="button btn-primary text-center col-sm-1 col-sm-offset-10">
                <a href="{{route('pembeli_order.detail',['order_id'=> $order->id])}}" class="btn btn-info">Detail</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- Akhir Data Booking -->
        <div class="terserah2 panel panel-info col-sm-8 col-sm-offset-5 ">

          {{ $orders->links() }}
        </div>

      </div>

    </div>
  </div>
@endsection
