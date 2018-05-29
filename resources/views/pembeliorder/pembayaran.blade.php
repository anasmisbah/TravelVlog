@extends('layouts.app')

@section('content')
  @if(session('msg'))
  <div class="alert alert-success">
    <p>{{session('msg')}}</p>
  </div>
  @endif

  <div class="container">

    <div class="jumbotron col-sm-10">
      @if(count($errors)>0)
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="row">
        <div class="col-sm-9 col-sm-offset-1 text-center">
          <p>Silahkan lakukan pembayaran dan upload bukti pembayaran</p>
        </div>
      </div>
      <hr>
      <p>Harga tiket yang perlu Anda bayar sebesar
        <span class="label label-info"> Rp. {{$order->total_pembayaran}} ,- </span>
      </p>
      <p>Pilihlah salah satu bank dibawah ini untuk melakukan pembayaran : </p>
      <p><i class="ion-arrow-right-c text-center"></i> <small>BRI (Bank Rakyat Indonesia)</small></p>
      <p><i class="ion-arrow-right-c text-center"></i> <small>BNI (Bank Negara Indonesia) </small></p>
      <p><i class="ion-arrow-right-c text-center"></i> <small>BCA </small></p>
      <p><i class="ion-arrow-right-c text-center"></i> <small>Mandiri </small></p>
      <hr>
      <h4>Silahkan upload bukti pembayaran ke form dibawah ini :</h4>
      <!--  -->
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('pembeli_order.pembayaran',['id' => $order->id])}}" enctype="multipart/form-data">
            <div class="form-group">
              {{ csrf_field() }}
              <input type="file" id="bukti_pembayaran" name="bukti_pembayaran">
            </div>
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <div class="col-sm-6 col-sm-offset-6">
                <button type="submit" class="btn btn-primary">
                Kirim Bukti Pembayaran
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
