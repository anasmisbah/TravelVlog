@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-warning">
        <div class="panel-heading text-center"><h2>Cari penerbangan</h2></div>
        <div class="panel-body">
        <form class="form-horizontal animated bounceIn" method="GET" action="{{route('penerbangan.search')}}" >

          {{csrf_field()}}

          <div class="row" style="min-height: 30px;"></div>
          <div class="row">
            <div class="col-md-4 col-md-offset-1">
              <div class="input-group form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1"><i class="ion-plane"></i> Asal</span>
                <select class="selectpicker form-control"  name="from">
                  <option value="">-- Pilih Kota Asal --</option>
                  @foreach ($kota as $Kota)
                  <option value="{{ $Kota->namakota }}" @if ($request)
                    @if ($request->from == $Kota->namakota)
                    {{"selected"}}
                    @endif
                  @endif>{{$Kota->namakota }} {{ $Kota->kd_kota }}</option>
                  @endforeach
                </select>

              </div>
              @if ($errors->has('from'))
                  <span class="help-block">
                      <strong>{{ $errors->first('from') }}</strong>
                  </span>
              @endif
            </div>


            <div class="col-md-1" ><i class="ion-arrow-right-c" style="font-size: 18px;text-align: center;"></i></div>

            <div class="col-md-5">
              <div class="input-group form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1"><i class="ion-ios-location"></i> Tujuan</span>
                <select class="selectpicker form-control" name="to">
                  <option value="">-- Pilih Kota Tujuan --</option>
                  @foreach ($kota as $Kota)
                  <option value="{{ $Kota->namakota }}" @if ($request)
                    @if ($request->to == $Kota->namakota)
                    {{"selected"}}
                    @endif
                  @endif>{{$Kota->namakota }} {{ $Kota->kd_kota }}</option>
                  @endforeach
                </select>
              </div>
              @if ($errors->has('to'))
                  <span class="help-block">
                      <strong>{{ $errors->first('to') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="row" >
            <div class="col-md-4 col-md-offset-1">
              <div class="input-group form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                <span class="input-group-addon" aria-describedby="basic-addon1" id="basic-addon1"><img src="{{ asset('img/kursi.png') }}" style="width: 15px;" alt=""> Kategori</span>
                <select class="selectpicker form-control" name="kategori_id">
                  <option value="">-- Pilih Kategori --</option>
                  @foreach ($kategori as $Kategori)
                  <option value="{{ $Kategori->id }}" @if ($request)
                    @if ($request->kategori_id == $Kategori->id)
                    {{"selected"}}
                    @endif
                  @endif>{{$Kategori->kategori}}</option>
                  @endforeach
                </select>
              </div>
              @if ($errors->has('kategori'))
                  <span class="help-block">
                      <strong>{{ $errors->first('kategori') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-md-1"><i class="ion-arrow-right-c" style="font-size: 18px;"></i></div>

            <div class="col-md-5">
              <div class="input-group form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1"><i class="ion-document"></i> Jumlah Tiket</span>
                <input id="amount" type="number" class="form-control" aria-describedby="basic-addon1"  name="amount" value="{{$request ? $request->amount: old('amount') }}" min="1" max="5" required autofocus>
              </div>
              @if ($errors->has('amount'))
                  <span class="help-block">
                      <strong>{{ $errors->first('amount') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1"><i class="ion-calendar"></i> Tanggal keberangkat</span>
                <input id="date" type="date" class="form-control" name="date" value="{{ $request ? $request->date : old('date')}}" min="{{ date('Y-m-d')}}" required>
              </div>
              @if ($errors->has('date'))
                  <span class="help-block">
                      <strong>{{ $errors->first('date') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary" style="width: 150px">
                Search!
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
</div>

@if(count($tiket))
<div class="container">
<div class="row">
  <div class="col-sm-2 col-sm-offset-5 text-center">
    <div class="panel panel-info">
      <strong>Tiket Tersedia</strong>
    </div>
  </div>
</div>
 @foreach($tiket as $Tiket)
<div class="row">
  <div class="panel panel-default">
    <div class="panel-body ">

      <div class="row" style="min-height: 20px">
        <div class="col-md-3 col-md-offset-1">
          {{ $Tiket->unit }} | {{ $Tiket->date }}
        </div>
      </div>

      <div class="row" style="min-height: 40px">
        <div class="col-md-2 col-md-offset-1">
          {{ $Tiket->Kategori->kategori}}
        </div>
      </div>
      <div class="row" style="min-height: 40px">
        <div class="col-md-3 text-center" >
          asal {{ $Tiket->from }} <hr>
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
          <a href="{{route('penerbangan.detail',['id'=> $Tiket->id,'jml' => $request->amount])}}" class="btn btn-primary">Detail</a> </td>
        </div>

      </div>
    </div>
  </div>
</div>

@endforeach

</div>

@else
  <div class="row">

    <div class="col-md-6 col-md-offset-5">
      <div class="panel panel-danger" style="width: 300px">
        <div class="panel-heading text-center" >Tiket Tidak Tersedia</div></div>
      </div>
    </div>
@endif
<div class="container">
</div>

</div>

@endsection
