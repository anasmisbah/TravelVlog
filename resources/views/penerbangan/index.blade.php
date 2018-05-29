@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row" style="min-height: 100px"></div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-warning">
        <div class="panel-heading text-center"><h2>Cari penerbangan</h2></div>
        <div class="panel-body">
          <form class="form-horizontal animated bounceIn" method="GET" action="{{route('penerbangan.search')}}" >
          {{csrf_field()}}
            {{-- asal --}}
            <div class="row" style="min-height: 30px;"></div>
            <div class="row">
              <div class="col-md-4 col-md-offset-1">
                <div class="input-group form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                  <span class="input-group-addon" id="basic-addon1"><i class="ion-plane"></i> Asal</span>
                  <select class="selectpicker form-control" aria-describedby="basic-addon1" name="from" data-live-search="true">
                    <option value="">-- Pilih Kota Asal --</option>
                    @foreach ($kota as $Kota)
                    <option value="{{ $Kota->namakota }}">{{$Kota->namakota }} {{ $Kota->kd_kota }}</option>
                    @endforeach
                  </select>
                </div>
              </div>


              <div class="col-md-1" ><i class="ion-arrow-right-c" style="font-size: 18px;text-align: center;"></i></div>
              {{-- tujuan --}}
              <div class="col-md-5 ">
                <div class="input-group form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                  <span class="input-group-addon" id="basic-addon1"><i class="ion-ios-location"></i> Tujuan</span>
                  <select class="selectpicker form-control" aria-describedby="basic-addon1" name="to" data-live-search="true">
                    <option value="">-- Pilih Kota Tujuan --</option>
                    @foreach ($kota as $Kota)
                    <option value="{{ $Kota->namakota }}">{{$Kota->namakota }} {{ $Kota->kd_kota }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-4 col-md-offset-1">
                <div class="input-group form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                  <span class="input-group-addon" id="basic-addon1"><img src="{{ asset('img/kursi.png') }}" style="width: 15px;" alt=""> Kategori</span>
                  <select class="selectpicker form-control" aria-describedby="basic-addon1" name="kategori_id" data-live-search="true">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $Kategori)
                    <option value="{{ $Kategori->id }}">{{$Kategori->kategori}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div class="input-group form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                  <span class="input-group-addon" id="basic-addon1"><i class="ion-document"></i> Jumlah Tiket</span>
                  <input id="amount" type="number" placeholder="jumlah tiket" aria-describedby="basic-addon1" class="form-control" name="amount" value="{{old('amount') }}" min="1" max="5" required autofocus>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-10 col-md-offset-1 ">
                <div class="input-group form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                  <span class="input-group-addon" id="basic-addon1"><i class="ion-calendar"></i> Tanggal keberangkat</span>
                  <input id="calendar" type="date" class="form-control date" name="date" value="{{ old('date')}}" min="{{ date('Y-m-d')}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-md-5 col-md-offset-4">
                  <button type="submit" class="btn btn-primary" style="width: 120px;">
                  Cari!
                  </button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
