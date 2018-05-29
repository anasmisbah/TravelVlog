@extends('templates.master')

@section('content')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Kategori</h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('kategori.simpan') }}">
                        {{ csrf_field() }}
                      <div class="form-group {{ $errors->has('kategori') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kategori">Kategori <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="kategori" required="required" class="form-control col-md-7 col-xs-12" name="kategori" value="{{ old('kategori') }}" autofocus>
                        </div>
                          @if ($errors->has('kategori'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('kategori') }}</strong>
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

@endsection
