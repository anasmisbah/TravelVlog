@extends('templates.master')

@section('content')
<div class="container">
  <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Tambah Data Tiket</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('tiket.simpan') }}">
                          {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('unit') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="unit"> Kode Unit <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="unit" required="required" class="form-control col-md-7 col-xs-12" name="unit" value="{{old('unit')}}">
                          </div>
                          @if ($errors->has('unit'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('unit') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"> Tanggal Keberangkatan<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="date" type="date" class="form-control "  name="date" value="{{old('date')}}" min="{{ date('Y-m-d')}}">
                          </div>
                          @if ($errors->has('date'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('date') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="form-group {{ $errors->has('from') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from">Kota Asal<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control selectpicker" name="from" data-live-search="true" id="from">
                              <option value="">-- Pilih Kota Asal --</option>
                              @foreach ($kota as $Kota)
                                <option value="{{ $Kota->namakota }}">{{$Kota->namakota }} {{ $Kota->kd_kota }}</option>
                              @endforeach
                            </select>
                            @if ($errors->has('from'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('from') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('to') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to">Kota Tujuan<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control selectpicker" name="to" data-live-search="true" id="to">
                              <option value="">-- Pilih Kota tujuan --</option>
                              @foreach ($kota as $Kota)
                                <option value="{{ $Kota->namakota }}">{{$Kota->namakota }} {{ $Kota->kd_kota }}</option>
                              @endforeach
                            </select>
                          </div>
                          @if ($errors->has('to'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('to') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="form-group {{ $errors->has('departure') ? ' has-error' : '' }}">
                          <label for="departure" class="control-label col-md-3 col-sm-3 col-xs-12">Jam Keberangkatan<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type='time' name="departure" value="{{old('departure')}}" class="form-control" id="departure" />
                          </div>
                          @if ($errors->has('departure'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('departure') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="form-group {{ $errors->has('arrival') ? ' has-error' : '' }}">
                          <label for="arrival" class="control-label col-md-3 col-sm-3 col-xs-12">Jam Kedatangan<span class="required">*</span> </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="arrival" type='time' name="arrival" value="{{old('arrival')}}" class="form-control" />
                          </div>
                          @if ($errors->has('arrival'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('arrival') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount"> Jumlah Tiket <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="amount" required="required" class="form-control col-md-7 col-xs-12" name="amount" value="{{old('amount')}}" min="0">
                          </div>
                          @if ($errors->has('amount'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('amount') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('cost') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost"> Harga Tiket <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="cost" required="required" class="form-control col-md-7 col-xs-12" name="cost" value="{{old('cost')}}" min="0">
                          </div>
                          @if ($errors->has('cost'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('cost') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('kategori_id') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kategori_id">Pilih Kategori<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control selectpicker" id="kategori_id" name="kategori_id" data-live-search="true">
                              <option value="">-- Pilih Kategori --</option>
                              @foreach ($kategori as $Kategori)
                                <option value="{{ $Kategori->id }}">{{$Kategori->kategori}}</option>
                              @endforeach
                            </select>
                          </div>
                          @if ($errors->has('kategori_id'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('kategori_id') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{route('kategori.index')}}" class="btn btn-info">Kembali</a>
  						              <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
</div>




@endsection
