@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h2 class="text-center">Ubah Profil</h2>
          </div>
          </div>

    </div>
    </div>
        <div class="panel-body">

      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <div class="jumbotron text-center">
              <img src="{{asset('storage/'.$pembeli->foto)}}" alt="" class="img-circle" style="width: 200px; height: 200px; min-height: 200px;">
              <h2>{{ $pembeli->nama }}</h2>
              <a href="{{ route('foto.edit',['id'=> $pembeli->id]) }}">Ubah Gambar</a>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-md-offset-1">

          <div class="row">
            <div class="panel panel-info">
              <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('profile.simpan',['id'=> $pembeli->id]) }}">
                  {{ csrf_field() }}
                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-4 control-label">Username</label>
                    <div class="col-md-6">
                      <input id="username" type="text" class="form-control" name="username" value="{{ old('username') ? old('username'):  $pembeli->user->username }}" required autofocus >
                      @if ($errors->has('username'))
                      <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                    <label for="nama" class="col-md-4 control-label">Nama Lengkap</label>
                    <div class="col-md-6">
                      <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama'): $pembeli->nama }}" required autofocus >
                      @if ($errors->has('nama'))
                      <span class="help-block">
                        <strong>{{ $errors->first('nama') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label for="gender" class="col-md-4 control-label">Gender</label>
                    <div class="col-md-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if ($pembeli->gender == "male")
                        {{"checked"}}
                        @endif >
                        <label class="form-check-label" for="male">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" @if ($pembeli->gender == "female")
                        {{ "checked" }}
                        @endif >
                        <label class="form-check-label" for="female">
                          female
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" @if ($pembeli->other == "other")
                        {{"checked"}}
                        @endif >
                        <label class="form-check-label" for="other">
                          other
                        </label>
                      </div>
                    </div>
                    @if ($errors->has('gender'))
                    <span class="help-block">
                      <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('tempatlahir') ? ' has-error' : '' }}">
                    <label for="tempatlahir" class="col-md-4 control-label">tempat lahir</label>
                    <div class="col-md-6">
                      <input id="tempatlahir" type="text" class="form-control" name="tempatlahir" value="{{old('tempatlahir') ? old('tempatlahir'):  $pembeli->tempatlahir }}" required autofocus >
                      @if ($errors->has('tempatlahir'))
                      <span class="help-block">
                        <strong>{{ $errors->first('tempatlahir') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('tgllahir') ? ' has-error' : '' }}">
                    <label for="tgllahir" class="col-md-4 control-label">Tanggal Lahir</label>
                    <div class="col-md-6">
                      <input id="tgllahir" type="date" class="form-control" name="tgllahir" value="{{ old('tgllahir') ? old('tgllahir'): $pembeli->tgllahir }}" required >
                      @if ($errors->has('tgllahir'))
                      <span class="help-block">
                        <strong>{{ $errors->first('tgllahir') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                    <div class="col-md-6">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email'):  $pembeli->user->email }}" required >
                      @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>
                    <div class="col-md-6">
                      <input id="password" type="password" class="form-control" name="password" value="" required >
                      @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>
                    <div class="col-md-6">
                      <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required >
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('kewarganegaraan') ? ' has-error' : '' }}">
                    <label for="kewarganegaraan" class="col-md-4 control-label">kewarganegaraan</label>
                    <div class="col-md-6">
                      <select class="form-control" name="kewarganegaraan" >
                        <option value="">-- Pilih Kewarganegaraan --</option>
                        <option value="wni" @if ($pembeli->kewarganegaraan == "wni")
                          {{"selected"}}
                        @endif>Warga Negara Indonesia (WNI)</option>
                        <option value="wna" @if ($pembeli->kewarganegaraan == "wna")
                          {{"selected"}}
                        @endif>Warga Negara Asing (WNA)</option>
                      </select>
                      @if ($errors->has('kewarganegaraan'))
                      <span class="help-block">
                        <strong>{{ $errors->first('kewarganegaraan') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('jenis_identitas') ? ' has-error' : '' }}">
                    <label for="jenis_identitas" class="col-md-4 control-label">jenis identitas</label>
                    <div class="col-md-6">
                      <select class="form-control" name="jenis_identitas" >
                        <option value="">-- Pilih Jenis Identitas --</option>
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
                      @if ($errors->has('jenis_identitas'))
                      <span class="help-block">
                        <strong>{{ $errors->first('jenis_identitas') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('no_identitas') ? ' has-error' : '' }}">
                    <label for="no_identitas" class="col-md-4 control-label">No Identitias</label>
                    <div class="col-md-6">
                      <input id="no_identitas" type="text" class="form-control" name="no_identitas" value="{{ old('no_identitas') ? old('no_identitas'): $pembeli->no_identitas }}" required autofocus >
                      @if ($errors->has('no_identitias'))
                      <span class="help-block">
                        <strong>{{ $errors->first('no_identitias') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('notlp') ? ' has-error' : '' }}">
                    <label for="notlp" class="col-md-4 control-label">No Telephone</label>
                    <div class="col-md-6">
                      <input id="notlp" type="text" class="form-control" name="notlp" value="{{ old('notlp') ? old('notlp'):$pembeli->notlp }}" required autofocus >
                      @if ($errors->has('notlp'))
                      <span class="help-block">
                        <strong>{{ $errors->first('notlp') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                    <label for="alamat" class="col-md-4 control-label">alamat</label>
                    <div class="col-md-6">
                      <textarea class="form-control" id="alamat" rows="3" name="alamat" required autofocus >{{old('alamat') ? old('alamat'):$pembeli->alamat}}</textarea>
                      @if ($errors->has('alamat'))
                      <span class="help-block">
                        <strong>{{ $errors->first('alamat') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-6 col-md-offset-4">
                      <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
