@extends('templates.master')

@section('content')
<div class="container">
  <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  @if(count($errors)>0)
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Ubah Data Order</h2>
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
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('order.update',['id' => $order->id]) }}">
                          {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('order_id') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="order_id"> ID Order <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="order_id" required="required" class="form-control col-md-7 col-xs-12" name="order_id" value="{{ old('order_id') ? old('order_id') : $order->id }}" disabled="disabled">
                          </div>
                        </div>
                        <div class="form-group {{ $errors->has('pembeli_id') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pembeli_id">Pembeli<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control selectpicker" name="pembeli_id" data-live-search="true">
                              <option value="">-- Pilih Pembeli --</option>
                              @foreach ($pembeli as $Pembeli)
                                <option value="{{ $Pembeli->id }}" @if ($Pembeli->id == $order->pembeli_id)
                                  {{ "selected" }}
                                @endif>{{$Pembeli->nama}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('jml_tiket') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jml_tiket"> Jumlah Tiket <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="jml_tiket" required="required" class="form-control col-md-7 col-xs-12" name="jml_tiket" value="{{ old('jml_tiket') ? old('jml_tiket') : $order->jml_tiket }}">
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('total_pembayaran') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_pembayaran"> Total Pembayaran <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="total_pembayaran" required="required" class="form-control col-md-7 col-xs-12" name="total_pembayaran" value="{{ old('total_pembayaran') ? old('total_pembayaran') : $order->total_pembayaran }}" disabled="disabled">
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control selectpicker" name="status" data-live-search="true">
                              <option value="0" @if ($order->status==0)
                                {{"selected"}}
                              @endif>Belum Bayar</option>
                              <option value="1"  @if ($order->status==1)
                                {{"selected"}}
                              @endif>Menunggu Konfirmasi</option>
                              <option value="2"  @if ($order->status==2)
                                {{"selected"}}
                              @endif>Pembayaran Telah Dikonfirmasi</option>
                              <option value="3"  @if ($order->status==3)
                                {{"selected"}}
                              @endif>Closed</option>
                            </select>
                          </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

  						  <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Change</button>
                          </div>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
</div>
@endsection
