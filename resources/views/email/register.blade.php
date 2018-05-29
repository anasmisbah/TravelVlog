 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Veirify</title>
    {{-- <link rel="stylesheet" href="css/app.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    {{-- <h1>Register TravelVlog</h1>
    <a href="http://localhost:8000/verify/{{$user->token}}/{{$user->id}}">Klik Untuk Mengaktifkan Akun</a> --}}
    <div class="container">
    <br><br>
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-info">
    <div class="panel-body" style="min-height: 400px">
    	<div class="row">
    		<div class="col-md-4 col-md-offset-5">
    			<img src="http://tinypic.com?ref=2dkwdfo" style="height: 150px; width: 150px;" alt="">
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-12 text-center">
    			<h4>Verifikasikan Alamat Email Anda</h4>
    		</div>
    	</div>
    	<br>
    	<div class="row">
    		<div class="col-md-12 text-center">
    			Untuk menjadikan akun Anda lebih aman, silahkan gunakan tombol dibawah ini untuk verifikasi email Anda. 	<br> Pesan konfirmasi akan dikirimkan kemudian.
    		</div>
    	</div>
    	<br><br>
    	<div class="row">
    	<div class="col-md-6 col-md-offset-4">
    		<a href="http://localhost:8000/verify/{{$user->token}}/{{$user->id}}" class="btn btn-success" style="width: 350px">Verifikasi Alamat Email</a>
    	</div>
    	</div>
    </div>
    </div>
    </div>
    </div>
    </div>
  </body>
</html>
