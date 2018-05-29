@extends('layouts.app')
@section('content')
<div class="container">
  <div class="jumbotron ">
    <div class="row" style="min-height: 40px;">
      <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center">Profil</h2>
        <hr style="color: #FFFFFF">
      </div>
      <div class="col-md-2 col-md-offset-2">
        <a href="{{route('profile.edit',['id'=> $pembeli->id])}}" class="btn btn-primary">Ubah Data</a>
      </div>
    </div>
    <div class="row"  style="min-height: 300px;">
      <div class="col-md-4 col-md-offset-4 text-center">

        <img src="{{asset('storage/'.$pembeli->foto)}}" alt="" class="img-circle" style="width: 200px; height: 200px; border:solid #C0F2FD 2px;">
        <h2>{{ $pembeli->nama }}</h2>

       {{--  <a href="{{ route('foto.edit',['id'=> $pembeli->id]) }}">change pict</a> --}}
      </div>
    </div>



    <div class="panel panel-info">
    <div class="panel-body">
        <div class="row">
      <div class="col-md-4 col-md-offset-1">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <h4> Username: </h4>
            </div>
            <div class="col-md-6">
              <h4>
              {{ $pembeli->user->username }}
              </h4>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <h4>
              Nama Lengkap:
              </h4>
            </div>
            <div class="col-md-6">
              <h4>{{ $pembeli->nama }}
              </h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4>
              Jenis kelamin:</h4>
            </div>
            <div class="col-md-6">
              <h4>{{$pembeli->gender}}
              </h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4>
              Tempat lahir:
              </h4>
            </div>
            <div class="col-md-6">
              <h4>{{ $pembeli->tempatlahir}}
              </h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4> Email:
              </h4>
            </div>
            <div class="col-md-6">
              <h4>{{$pembeli->user->email}}</h4>
            </div>
          </div>
        </div>
        <div class="col-md-5 col-md-offset-2">
          <div class="row">
            <div class="col-md-6">
              <h4>
              Kewarganegaraan :
              </h4>
            </div>
            <div class="col-md-6">
              <h4>
              {{$pembeli->kewarganegaraan}}
              </h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4>
              Jenis identitas :
              </h4>
            </div>
            <div class="col-md-6">
              <h4>
              {{$pembeli->jenis_identitas}}
              </h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4>
              Nomor identitas :
              </h4>
            </div>
            <div class="col-md-6">
              <h4>
              {{$pembeli->no_identitas}}
              </h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4>
              Nomor telepon:
              </h4>
            </div>
            <div class="col-md-6">
              <h4>
              {{$pembeli->notlp}}
              </h4>
            </div>
            <div class="row">
              <div class="col-md-5 col-md-offset-1">
                <h4>
                Alamat:
                </h4>
              </div>
              <div class="col-md-6">
                <h4>
                {{$pembeli->alamat}}
                </h4>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  @endsection
