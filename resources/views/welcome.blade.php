<link rel="shortcut icon" href="img/plane.png">
<style>
    .jumbotron{
        height: 600px;
        background-image: url('img/home.jpg');
        background-attachment: fixed;
        background-size: cover;
    }

 section{
  min-height: 400px;
    }
   .benefit{
      min-height: 1200px;

    }
    .contact{
      background-color: #AAAAAA;
      color: #FFFFFF;
    }
i{
  font-size: 30px;
}
footer{
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 80px;
  background-color:#333;
  padding: 10px;
  }
html{
  position: relative;
}
body{
  margin-bottom: 100px;
 background-image: url('img/bg2.png');
}
.woow, .muncul-about{
  opacity: 0;
}
.woow.animated.infinite.swing, .muncul-about.animated.bounceIn, .gambar.animated.bounceIn, .tulisan.animated.bounceIn, .bulat.animated .bounceIn{
  opacity: 1;
  transform: translate(0,0);
}

.gambar, .tulisan{
  opacity: 0;
  transform: translate(0,-15px);
  transition: .5s;
}
.daftar{
  min-height: 700px;

}
.bulat{
  opacity: 0;
}



</style>

<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" href="ionicons-2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="css/animate.css">

    <title>TravelVlog</title>


<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

        <a href="#home" class="navbar-brand page-scroll">
        TravelVlog
        </a>
     </div>
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        @if (Route::has('login'))
                @auth

                @role('admin')
                <li><a href="#about" class="page-scroll">Tentang</a></li>
                <li><a href="#benefit" class="page-scroll">Manfaat</a></li>
                <li><a href="#daftar" class="page-scroll">Cara Booking</a></li>
                <li><a href="#contact" class="page-scroll">Kontak</a></li>


                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    {{ Auth::user()->username }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{route('admin.profile',['id' => Auth::user()->admin->id])}}">Profil</a>
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
                    <li><a href="#about" class="page-scroll">Tentang</a></li>
                    <li><a href="#benefit" class="page-scroll">Manfaat</a></li>
                    <li><a href="#daftar" class="page-scroll">Cara Booking</a></li>
                    <li><a href="#contact" class="page-scroll">Kontak</a></li>
                    <li><a href="{{route('home')}}" class="page-scroll">Beranda</a></li>
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
                @else
                  <li><a href="#about" class="page-scroll">Tentang</a></li>
                  <li><a href="#benefit" class="page-scroll">Manfaat</a></li>
                  <li><a href="#daftar" class="page-scroll">Cara Booking</a></li>
                  <li><a href="#contact" class="page-scroll">Kontak</a></li>

                  <li><a href="{{route('login')}}" class="page-scroll">Login</a></li>
                @endauth

        @endif


      </ul>
      </div>
      </div>
    </nav>

    {{-- jumbotron --}}
   <div class="jumbotron text-center" id="home">

    <h1>TravelVlog</h1>
    <p>Liburan Nyaman , Anda Puas , Kami Senang</p>
   </div>
    {{-- akhir jumbotron --}}

    <section class="about" id="about">
       <div class="container">
           <div class="row">
               <div class="col-md-8">
                   <h1 class="text-center">Tentang</h1>
                   <hr>
                   <p class="muncul-about">
                   TravelVlog adalah perusahaan yang menyediakan kebutuhan perjalanan yang akan membawa Anda ke berbagai provinsi yang ada di Indonesia, kami menyediakan tiket pesawat yang akan membawa Anda terbang. kami melayani pemesanan tiket lebih dari 1000 penerbangan yang ada di seluruh Indonesia.</p>
               </div>
               <div class="col-md-4">
                 <img src="img/koper.png" class="woow" alt="">
               </div>
           </div>
       </div>
       </section>

        {{-- benefit --}}
       <section class="benefit" id="benefit">
         <div class="container">
           <div class="row">
             <div class="col-md-12">
              <h1 class="text-center"> Kenapa Menggunakan TravelVlog ?</h1>
              <hr>
             </div>
           </div>
         <div class="row">
           <div class="col-md-6"> <img src="img/stiker.png" class="gambar" alt=""></div>
          <div class="col-md-6"></div>
         </div>
         <div class="row">
           <div class="col-md-6"><p class="tulisan">Kami memberikan pelayanan dan mengatur penyelenggaraan
           program insentif baik perorangan, rombongan, maupun perusahaan Anda.</p></div>
          <div class="col-md-6"><img src="img/stiker2.png" class="gambar" alt=""></div>
         </div>
         <div class="row">
           <div class="col-md-6"><img src="img/stiker3.png" class="gambar" alt=""></div>
          <div class="col-md-6"><p class="tulisan">Kami bertanggung jawab untuk mendukung kebutuhan perjalanan Anda mulai pada saat reservasi hingga kembali. Kami juga menyediakan berbagai macam tour dan menangani tour sesuai dengan keinginan Anda.</p></div>
         </div>
          <div class="row">
           <div class="col-md-6"><p class="tulisan">Semua kebutuhan untuk perjalanan dapat Anda serahkan kepada kami!Jadikan kami sebagai mitra Anda dalam perencanaan perjalanan yang inovatif dan informatif dengan berorientasi kepada kepuasan dan kepercayaan Anda
</p> </div>
         <div class="col-md-6"></div>
          </div>
         </div>
       </section>
       {{-- contact --}}


       <section class="daftar" id="daftar">
         <div class="container">
         <div class="row" style="min-height: 200px;">
           <div class="col-md-12 text-center"><h1>Bagaimana cara memesan tiket</h1><hr>
           </div>
         </div>

           <div class="row"> {{-- class bulat --}}
            <div class="col-md-2 col-md-offset-1">
            <img src="img/bulat1welcome.png" class="bulat" style="width: 200px;height: 200px" alt="">
            </div>
            <div class="col-md-1">
            <img src="img/bulat1welcomepolos.png" class="bulat" style="width: 30px;height:30px" alt="">
            </div>
            <div class="col-md-1">
            <img src="img/bulat1welcomepolos.png" class="bulat" style="width: 30px;height:30px" alt="">
            </div>
            <div class="col-md-2">
            <img src="img/bulat2welcome.png" class="bulat" style="width: 200px;height: 200px" alt="">
            </div>
            <div class="col-md-1">
            <img src="img/bulat4.1.png" class="bulat" style="width: 30px;height:30px" alt="">
            </div>
            <div class="col-md-1">
            <img src="img/bulat4.1.png" class="bulat" style="width: 30px;height:30px" alt="">
            </div>
            <div class="col-md-1">
            <img src="img/bulat3welcome.png" class="bulat" style="width: 200px;height: 200px" alt="">
            </div>
            </div>
           </div>
         </section>

<section class="contact" id="contact">
  <div class="container">
    <div class="row">
    <div class="col-md-4">
    <h1>Kontak</h1>
    <div class="row">
   <div class="col-md-1">
       <i class="ion-ios-telephone"></i>
      </div>
      <div class="col-md-2">08565294808 </div>
      </div>
      <div class="row">
      <div class="col-md-1">
      <i class="ion-social-twitter"></i>
      </div>
      <div class="col-md-2">travelVlog</div>
      </div>
      <div class="row">
       <div class="col-md-1"><i class="ion-social-facebook"></i></div>
      <div class="col-md-2">travlog</div>
      </div>
      <div class="row">
      <div class="col-md-1"><i class="ion-social-googleplus"></i></div>
      <div class="col-md-2">travlog@gmail.com</div>
      </div>
    </div>
     <div class="col-md-5">
          <h3>Bergabung Bersama Kami</h3>
        <div class="row">
          <div class="col-md-1"><i class="ion-android-exit"></i></div>
          <div class="col-md-2"><a href="login" style="color: #FFFFFF">Login</a></div>
        </div>
        <div class="row">
          <div class="col-md-1"><i class="ion-person-add"></i></div>
          <div class="col-md-2"><a href="register"style="color: #FFFFFF">Daftar</a></div>
        </div>
        </div>
        <div class="col-md-3">
          <h3>Segera tersedia</h3>
          <div class="row">
            <div class="col-md-12">
              <img src="img/google.png" alt="" width="150px">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <img src="img/ios.png" alt="" width="150px">
            </div>
          </div>
        </div>
    </div>
    </div>
</section>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="text-center" style="color: white;">Copyright &copy;2018 TravelVlog</p>
        <p class="text-center" style="color: white;"> Powered by <a href="https://laravel.com/">Laravel</a>| designed by <a href="https://getbootstrap.com/">Bootsrap</a></p>
  </div>
  </div>
  </footer>


  <script src="js/app.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script>
       $('.page-scroll').on('click',function() {
// ambil isi href
var tujuan= $(this).attr('href');
//tangkap elemen
var elemenHref = $(tujuan);



$('body').animate({
scrollTop: elemenHref.offset().top -50

}, 1000,'easeInOutExpo');

});

$(window).scroll(function() {
/* Act on the event */
var scroll = $(this).scrollTop();
if (scroll>$('.woow').offset().top -300){
$('.woow').addClass('animated infinite swing');
}

if (scroll>$('.muncul-about').offset().top -300){
$('.muncul-about').addClass('animated bounceIn');

}


if (scroll>$('.gambar').offset().top -400 ){
  $('.gambar').each(function(i ){
    setTimeout(function(){
      $('.gambar').eq(i).addClass('animated bounceIn');
    },200* (i+1));
  });
}
if (scroll>$('.tulisan').offset().top -400 ){
  $('.tulisan').each(function(i ){
    setTimeout(function(){
      $('.tulisan').eq(i).addClass('animated bounceIn');
    },200* (i+1));
  });
}

if (scroll>$('.bulat').offset().top -600 ){
  $('.bulat').each(function(l ){
    setTimeout(function(){
      $('.bulat').eq(l).addClass('animated bounceIn');
    },400* (l+1));
  });
}

});
  </script>
