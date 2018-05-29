@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if (session('warning'))
          <div class="alert alert-danger">
            <ul>
              {{session('warning')}}
            </ul>
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading text-center">Login To Your Account</div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}

              <div class="row">
                <div class="col-md-4 col-md-offset-4 ">
                  <img src="img/login.png" alt="" style="">
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="input-group form-group ">
                    <span class="input-group-addon" {{ $errors->has('email') ? ' has-error' : '' }}><i class="ion-at"></i></span>

                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" aria-describedby="basic-addon1" value="{{ old('email') }}" required autofocus>

                  </div>
                  @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="input-group form-group">
                    <span class="input-group-addon" {{ $errors->has('password') ? ' has-error' : ''}}><i class="ion-locked"></i></span>

                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon1" required>
                    @if ($errors->has('password'))
                      <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                  <div class="checkbox">
                    <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                    Login
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
