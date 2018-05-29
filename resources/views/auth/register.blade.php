@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row main">
        <div class="panel panel-default col-sm-6 col-sm-offset-3">
            <div class="main-login main-center">
                <h3 class="text-center">Register</h3>
                <div class="panel-body">
                    <form class="form-horizontal " method="post" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="cols-sm-2  control-label">Username</label>
                            <div class="cols-sm-10">
                                <div class="input-group ">
                                    <span class="input-group-addon">
                                        <i class="ion-android-person"></i>
                                    </span>
                                    <input id="username" type="text" class="form-control" name="username" aria-describedby="basic-addon1" required autofocus value="{{ old('username') }}" placeholder="Enter Your Username">
                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="cols-sm-2 control-label">Full Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-ios-personadd"></i>
                                    </span>
                                    <input id="nama" type="text" class="form-control" name="nama" aria-describedby="basic-addon1"  value="{{ old('nama') }}" required autofocus placeholder="Enter Your Full Name">
                                    @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="cols-sm-2 control-label">Gender</label>
                            <div class="cols-sm-4">
                                <div class="input-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <span class="input-group-addon">
                                        <i class="ion-female"></i>
                                    </span>
                                    <select name="gender" class="form-control selectpicker" data-live-search="true">
                                        <option value="">-- Gender --</option>
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
                        </div>
                        <div class="form-group {{ $errors->has('tempatlahir') ? ' has-error' : '' }}" >
                            <label for="tempatlahir" class="cols-sm-2 control-label">Birth Place</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-ios-location"></i>
                                    </span>
                                    <input id="tempatlahir" type="text" class="form-control" name="tempatlahir" value="{{ old('tempatlahir') }}" aria-describedby="basic-addon1" required autofocus placeholder="Enter Your Birth Place">
                                    @if ($errors->has('tempatlahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempatlahir') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tgllahir') ? ' has-error' : '' }}">
                            <label for="tgllahir" class="cols-sm-2 control-label">Birth Date</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-ios-calendar"></i>
                                    </span>
                                    <input id="tgllahir" type="date" class="form-control" name="tgllahir" value="{{ old('tgllahir') }}" aria-describedby="basic-addon1" required autofocus placeholder="Choose Your Birth Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="cols-sm-2 control-label">E-Mail Address</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-email"></i>
                                    </span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" aria-describedby="basic-addon1" required autofocus placeholder="Enter Your Email">
                                    <span class="input-group-addon" id="basic-addon2">@example.com</span>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-ios-locked"></i>
                                    </span>
                                    <input id="password" type="password" class="form-control" name="password"  aria-describedby="basic-addon1" required autofocus placeholder="Enter Your Password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-ios-locked"></i>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" aria-describedby="basic-addon1" required autofocus placeholder="Confirm Your Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('kewarganegaraan') ? ' has-error' : '' }}">
                            <label for="kewarganegaraan" class="cols-sm-2 control-label">Choose Citizenship</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-ios-home-outline"></i>
                                    </span>
                                    <select name="kewarganegaraan" class="form-control selectpicker" data-live-search="true">
                                        <option value="">-- Choose Citizenship --</option>
                                        <option value="wni">Warga Negara Indonesia (WNI)</option>
                                        <option value="wna">Warga Negara Asing (WNA)</option>
                                    </select>

                                </div>
                                @if ($errors->has('kewarganegaraan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kewarganegaraan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('jenis_identitas') ? ' has-error' : '' }}">
                            <label for="jenis_identitas" class="cols-sm-2 control-label">Choose Identity</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-ios-body"></i>
                                    </span>
                                    <select name="jenis_identitas" class="form-control selectpicker" data-live-search="true">
                                        <option value="">-- Choose Identity --</option>
                                        <option value="ktp">Kartu Tanda Penduduk (KTP)</option>
                                        <option value="passport">Passport</option>
                                        <option value="ktm">Kartu Tanda Mahasiswa (KTM)</option>
                                    </select>

                                </div>
                                @if ($errors->has('jenis_identitas'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jenis_identitas') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('no_identitas') ? ' has-error' : '' }}" >
                            <label for="no_identitas" class="cols-sm-2 control-label">Identity Number</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-android-contacts"></i>
                                    </span>
                                    <input id="no_identitas" type="text" class="form-control" name="no_identitas" value="{{ old('no_identitas') }}" aria-describedby="basic-addon1" required autofocus placeholder="Enter Your Identity">
                                    @if ($errors->has('no_identitas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_identitas') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('notlp') ? ' has-error' : '' }}" >
                            <label for="notlp" class="cols-sm-2 control-label">Phone Number</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-android-phone-portrait"></i>
                                    </span>
                                    <input id="notlp" type="text" class="form-control" name="notlp" value="{{ old('notlp') }}" aria-describedby="basic-addon1" required autofocus placeholder="Enter Your Phone Number">
                                    @if ($errors->has('notlp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notlp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}" >
                            <label for="alamat" class="cols-sm-2 control-label">Address</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-ios-home"></i>
                                    </span>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat" required autofocus placeholder="Enter Your Address">{{old('alamat')}}</textarea>
                                    @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="cols-md-10 text-center">
                                <button type="submit" class="btn btn-primary">
                                Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
