@extends('templates.master')

@section('content')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ubah Data Kota</h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('kota.update',['id'=>$kota->id ]) }}">
                        {{ csrf_field() }}
                      <div class="form-group {{ $errors->has('namakota') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namakota">Nama Kota <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="namakota" required="required" class="form-control col-md-7 col-xs-12" name="namakota" value="{{ (old('namakota')) ? old('namakota') : $kota->namakota }}" autofocus>
                        </div>
                          @if ($errors->has('namakota'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('namakota') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="form-group {{ $errors->has('kd_kota') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kd_kota">Kode Kota <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="kd_kota" required="required" class="form-control col-md-7 col-xs-12" name="kd_kota" value="{{ (old('kd_kota')) ? old('kd_kota') : $kota->kd_kota }}" autofocus>
                        </div>
                          @if ($errors->has('kd_kota'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('kd_kota') }}</strong>
                              </span>
                          @endif
                      </div>
                        <input type="hidden" name="_method" value="PUT">
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{route('kota.index')}}" class="btn btn-info">Kembali</a>
						              <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
@endsection
