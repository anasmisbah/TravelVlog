@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              @if(session('msg'))
                <div class="alert alert-success">
                  <p>{{session('msg')}}</p>
                </div>
              @endif
                <div class="panel-heading">Ubah Gambar</div>
                <div class="panel-body">
                <div class="row" style="min-height: 200px">
                <div class="col-md-4 col-md-offset-4">
                  <img src="{{ asset('storage/'.$pembeli->foto) }}"  alt="" class=" img-circle" style="width: 200px; height: 200px;border:solid #C0F2FD 2px;">
                  </div>
                  </div>
              <br>
                    <form class="form-horizontal" method="POST" action="{{ route('foto.update',['id'=> $pembeli->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                        {{--
                            <label for="foto" class="col-md-4 col-md-offset-4 control-label">foto</label> --}}

                            <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <input id="foto" type="file" class="form-control" name="foto" value="{{ old('foto') }}" required autofocus>

                                @if ($errors->has('foto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                           </div>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Ubah
                                </button>
                                <a href="{{route('profile.edit',['id'=> $pembeli->id])}}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
