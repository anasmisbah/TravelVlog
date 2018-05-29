@extends('templates.master')
@section('content')
<div class="container">
  <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Tambah Data Admin</h2>
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
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('admin.simpan') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username"> username <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="username" required="required" class="form-control col-md-7 col-xs-12" name="username" value="{{old('username')}}">
                          </div>
                          @if ($errors->has('username'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('username') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama"> Nama Lengkap <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="{{old('nama')}}">
                          </div>
                          @if ($errors->has('nama'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nama') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">gender<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control selectpicker" name="gender" data-live-search="true">
                              <option value="">-- Pilih Gender Anda --</option>
                              <option value="female" id="female">Female</option>
                              <option value="male" id="male">Male</option>
                              <option value="other" id="male">Other</option>
                            </select>
                          </div>
                          @if ($errors->has('gender'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('gender') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('tgllahir') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgllahir"> Tanggal Lahir<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" class="form-control "  name="tgllahir" value="{{old('tgllahir')}}" max="{{ date('Y-m-d')}}">
                          </div>
                          @if ($errors->has('tgllahir'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('tgllahir') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> email <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" required="required" class="form-control col-md-7 col-xs-12" name="email" value="{{old('email')}}">
                          </div>
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"> password <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="password" required="required" class="form-control col-md-7 col-xs-12" name="password" value="">
                          </div>
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation"> password <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="password_confirmation" required="required" class="form-control col-md-7 col-xs-12" name="password_confirmation" value="">
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('no_identitas') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas"> Nomor Identitas <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="no_identitas" required="required" class="form-control col-md-7 col-xs-12" name="no_identitas" value="{{old('no_identitas')}}">
                          </div>
                          @if ($errors->has('no_identitas'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('no_identitas') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('notlp') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="notlp"> Nomor Telephone <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="notlp" required="required" class="form-control col-md-7 col-xs-12" name="notlp" value="{{old('notlp')}}">
                          </div>
                          @if ($errors->has('notlp'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('notlp') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="alamat" name="alamat" class="form-control" rows="3" placeholder="Alamat"></textarea>
                        </div>
                        @if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Foto <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="" alt="foto" width="70px">
                        <input type="file" name="foto" value="" class="form-control" id="foto">
                      </div>
                    </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{route('admin.index')}}" class="btn btn-info">Kembali</a>
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
