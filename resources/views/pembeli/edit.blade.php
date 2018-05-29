@extends('templates.master')

@section('content')


<div class="container">
  <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Ubah Data Pembeli</h2>
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
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('pembeli.update',['id' => $pembeli->id]) }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username"> username
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="username" required="required" class="form-control col-md-7 col-xs-12" name="username" value="{{old('username') ? old('username') :$pembeli->user->username}}" disabled="disable">
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
                            <input type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="{{old('nama') ? old('nama') :  $pembeli->nama }}">
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
                              <option value="female" id="female" @if ($pembeli->gender == "female")
                                {{"selected"}}
                              @endif>Female</option>
                              <option value="male" id="male" @if ($pembeli->gender == "male")
                                {{"selected"}}
                              @endif>Male</option>
                              <option value="other" id="male" @if ($pembeli->gender == "other")
                                {{"selected"}}
                              @endif>Other</option>
                            </select>
                          </div>
                          @if ($errors->has('gender'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('gender') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('tempatlahir') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempatlahir"> Tempat Lahir <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="tempatlahir" required="required" class="form-control col-md-7 col-xs-12" name="tempatlahir" value="{{old('tempatlahir') ? old('tempatlahir') : $pembeli->tempatlahir }}">
                          </div>
                          @if ($errors->has('tempatlahir'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('tempatlahir') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('tgllahir') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgllahir"> Tanggal Lahir<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="tgllahir" type="date" class="form-control "  name="tgllahir" value="{{old('tgllahir') ? old('tgllahir') : $pembeli->tgllahir}}" max="{{ date('Y-m-d')}}">
                          </div>
                          @if ($errors->has('tgllahir'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('tgllahir') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> email
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" required="required" class="form-control col-md-7 col-xs-12" name="email" value="{{old('email') ? old('email') : $pembeli->user->email}}" disabled="disable">
                          </div>
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"> password
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="password" required="required" class="form-control col-md-7 col-xs-12" name="password" value="" disabled="disable">
                          </div>
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation"> Confirm password
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="password_confirmation" required="required" class="form-control col-md-7 col-xs-12" name="password_confirmation" value="" disabled="disable">
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('kewarganegaraan') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kewarganegaraan">kewarganegaraan<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="kewarganegaraan" class="form-control selectpicker" name="kewarganegaraan" data-live-search="true">
                              <option value="">-- Pilih Kewarganegaraan Anda --</option>
                              <option value="wni" @if ($pembeli->kewarganegaraan == "wni")
                                {{"selected"}}
                              @endif>Warga Negara Indonesia (WNI)</option>
                              <option value="wna" @if ($pembeli->kewarganegaraan == "wna")
                                {{"selected"}}
                              @endif>Warga Negara Asing (WNA)</option>
                            </select>
                          </div>
                          @if ($errors->has('kewarganegaraan'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('kewarganegaraan') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('jenis_identitas') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_identitas">jenis identitas<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="jenis_identitas" class="form-control selectpicker" name="jenis_identitas" data-live-search="true">
                              <option value="">-- Pilih jenis identitas Anda --</option>
                              <option value="ktp" @if ($pembeli->jenis_identitas == "ktp")
                                {{"selected"}}
                              @endif>KTP</option>
                              <option value="passport" @if ($pembeli->jenis_identitas == "passport")
                                {{"selected"}}
                              @endif>Passport</option>
                              <option value="ktm" @if ($pembeli->jenis_identitas == "ktm")
                                {{"selected"}}
                              @endif>KTM</option>
                            </select>
                          </div>
                          @if ($errors->has('jenis_identitas'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('jenis_identitas') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('no_identitas') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas"> Nomor Identitas <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="no_identitas" required="required" class="form-control col-md-7 col-xs-12" name="no_identitas" value="{{old('no_identitas') ? old('no_identitas') : $pembeli->no_identitas}}">
                          </div>
                          @if ($errors->has('no_identitias'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('no_identitias') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('notlp') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="notlp"> Nomor Telephone <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="notlp" required="required" class="form-control col-md-7 col-xs-12" name="notlp" value="{{old('notlp') ? old('notlp') : $pembeli->notlp}}">
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
                          <textarea id="alamat" name="alamat" class="form-control" rows="3" placeholder="Alamat">{{old('alamat') ? old('alamat') : $pembeli->alamat}}</textarea>
                        </div>
                        @if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">foto <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="{{asset('/storage/'.$pembeli->foto)}}" alt="" width="100px">
                        <input id="foto" type="file" name="foto" value="{{old('foto') ? old('foto') : $pembeli->foto}}" class="form-control">
                      </div>
                      @if ($errors->has('foto'))
                          <span class="help-block">
                              <strong>{{ $errors->first('foto') }}</strong>
                          </span>
                      @endif
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{route('pembeli.index')}}" class="btn btn-info">Kembali</a>
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
