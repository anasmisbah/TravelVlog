@extends('templates.master')

@section('content')

  <div class="container">
    <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Tambah Data Order</h2>
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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('order.simpan') }}">
                            {{ csrf_field() }}
                          <div class="form-group {{ $errors->has('pembeli_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pembeli_id">Pembeli<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control selectpicker" name="pembeli_id" data-live-search="true">
                                <option value="">-- Pilih Pembeli --</option>
                                @foreach ($pembeli as $Pembeli)
                                  <option value="{{ $Pembeli->id }}">{{$Pembeli->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="form-group {{ $errors->has('tiket_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tiket_id">Tiket<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control selectpicker" name="tiket_id" data-live-search="true">
                                <option value="">-- Pilih Tiket --</option>
                                @foreach ($tiket as $Tiket)
                                  <option value="{{ $Tiket->id }}">{{$Tiket->id}} | {{$Tiket->from}} -> {{$Tiket->to}} | {{$Tiket->date}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="form-group {{ $errors->has('jml_tiket') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jml_tiket"> Jumlah Tiket <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="jml_tiket" required="required" class="form-control col-md-7 col-xs-12" name="jml_tiket" value="{{ old('jml_tiket')}}">
                            </div>
                          </div>

                          <div class="form-group {{ $errors->has('total_pembayaran') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_pembayaran"> Total Pembayaran <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="total_pembayaran" required="required" class="form-control col-md-7 col-xs-12" name="total_pembayaran" value="{{ old('total_pembayaran')  }}" disabled="disabled">
                            </div>
                          </div>

                          <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control selectpicker" name="status" data-live-search="true">
                                <option value="0">Belum Bayar</option>
                                <option value="1">Menunggu Konfirmasi</option>
                                <option value="2">Pembayaran Telah Dikonfirmasi</option>
                                <option value="3">Closed</option>
                              </select>
                            </div>
                          </div>
                          
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <a href="{{route('order.index')}}" class="btn btn-info">kembali</a>
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
