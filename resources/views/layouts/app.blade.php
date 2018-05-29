<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <link rel="shortcut icon" href="img/plane.png">
    <style>
    body {
    background-image: url('{{asset('img/bg2.png')}}');
    }
    .animasi{
      opacity: 0;
    }
    .animasi.animated .bounceIn{
      opacity: 1;
      transform: translate(0,0);
    }
    .sidenav {
    height: 100%;
    width: 240px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color:#A8CEE0;
    overflow-x: hidden;
    padding-top: 60px;
    }
    .sidenav a {
    padding: 6px 8px 6px 20px;
    text-decoration: none;
    font-size: 15px;
    color: #548BDD;
    display: block;
    }
    .sidenav a:hover {
    color: #707B7A;
    }
    .sidenav li {
    min-height: 10px;
    }
    @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
    }
    .terserah2 {
      opacity: 0;
    }
    .terserah2.animated.slideInRight {
      opacity: 1;
    }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{Auth::check() ? Auth::user()->id : ''}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ionicons-2.0.1/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">



  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-inverse navbar-static-top" >
        <div class="container-fluid">
          <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
              {{-- {{ config('app.name') }} --}}
              TravelVlog
            </a>
          </div>
          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
              &nbsp;
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @guest
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Daftar</a></li>
              @else
              @role('admin')
              <li><a href="{{ route('tiket.index') }}">Tiket</a></li>
              <li><a href="{{ route('kategori.index') }}">Kategori</a></li>
              <li><a href="{{ route('pembeli.index') }}">Data Pembeli</a></li>
              {{-- <li><a href="{{ route('penerbangan.index') }}">Penerbangan</a></li> --}}
              <li><a href="{{ route('kota.index') }}">Kota</a></li>
              <li><a href="{{ route('order.index') }}">Pesanan</a></li>
              <li><a href="{{ route('admin.index') }}">Data Admin</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                  {{ Auth::user()->username }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
              @endrole
              @role('pembeli')
              <li><a href="{{ route('home') }}">Beranda</a></li>
              <li><a href="{{ route('penerbangan.index') }}">Penerbangan</a></li>
              <li><a href="{{ route('pembeli_order.index',['id'=> Auth::user()->pembeli->id ]) }}">Bookingan Saya</a></li>

              <notification v-bind:notifications="notifications"></notification>


              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                  {{ Auth::user()->username }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="{{route('pembeli.profile',['id' => Auth::user()->pembeli->id])}}">Profil</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
              @endrole
              @endguest
            </ul>
          </div>
        </div>
      </nav>
     @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/wow/dist/wow.min.js') }}"></script>
    <script>
    $(window).on('load', function(){
      $('.terserah2').each(function(i){
        setTimeout(function(){
          $('.terserah2').eq(i).addClass('animated slideInRight');
        }, 200 * (i+1));
      });
    });

    $(window).on('load',function() {
     $('.animasi').each(function(i){
       setTimeout(function(){
         $('.animasi').eq(i).addClass('animated bounceIn');
       },200* (i+1));
     });

    });

    new WOW().init();

   // $(window).scroll(function() {
   //   /* Act on the event */
   //   var scroll = $(this).scrollTop();
   //
   //   if (scroll>$('.animasi2').offset().top -450 ){
   //     $('.animasi2').each(function(j ){
   //       setTimeout(function(){
   //         $('.animasi2').eq(j).addClass('animated fadeInDown');
   //       },200* (j+1));
   //     });
   //   }
   //    if (scroll>$('.animasi3').offset().top -450 ){
   //     $('.animasi3').each(function(k ){
   //       setTimeout(function(){
   //         $('.animasi3').eq(k).addClass('animated infinite flash');
   //       },200* (k+1));
   //     });
   //   }
   //  });

    // $(window).scroll(function() {
    //   var X = $(this).scrollTop();

    //   $('.sidenav').css({
    //     'padding-top' : '0'
    //   });
    // });
  </script>
  </body>

</html>
