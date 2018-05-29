<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>E-tiket</title>
	</head>
	<link rel="stylesheet" href="css/app.css">
	<body style="background-color: #FFFFFF;">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<strong><h1>E-tiket</h1></strong>
				</div>
				<div align="center" class="col-md-5">
				<img src="img/logo.png" style="width: 200px;" alt="">
					<h3 class="text-center">TravelVlog</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<h3>Detail Penerbangan</h3>
				</div>
			</div>
			<div class="row" style="border:solid 1px; width: 850px;" >
				<div class="row" style="min-height: 30px;"></div>
				<div class="col-md-8">

					<div class="row">
						<div class="col-md-4">
							Vlog Air
						</div>
						<div class="col-md-7">
							<u><strong>{{ $order->tiket->unit }}</strong></u>

						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
						</div>
						<div class="col-md-5">
							<strong>{{ $order->tiket->date }}</strong>
						</div>
					</div >
					<div class="row">
						<div class="col-md-4">
							{{$order->id}}
						</div>
						<div class="col-md-4">
							{{ $order->tiket->from }}
						</div>
						<div class="col-md-4">
							{{$order->tiket->to}}
						</div>
					</div>
				{{-- 	<div class="row">
						<div class="col-md-4">
							================
						</div>
						<div class="col-md-4">
							Ngurah Rai Int'l(DPS)
						</div>
						<div class="col-md-4">
							Soekarno Hatta Intl(CGK)
						</div>
					</div> --}}
					<div class="row" style="min-height: 40px;">
						<div class="col-md-4">

						</div>
						<div class="col-md-4">
							Berangkat {{$order->tiket->departure}}
						</div>
						<div class="col-md-4">
							Tiba {{$order->tiket->arrival}}
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							Dioperasikan oleh Vloger Indonesia
						</div>
					</div>

				</div>
			</div>
			<strong>
					NOTE:
				</strong>
			<ul>
			</ul>
			<li>Semua waktu tertera adalah waktu bandara setempat</li>
			<li>Mohon lakukan check-in minimal 1 jam (domestik) sebelum berangkat</li>

		</div>
    <div class="row no-print">
      <a href="{{route('etiket.cetak',['id'=>$order->id])}}">Download PDF</a>
      <button type="button" class="btn btn-primary" onclick="window.print()">print</button>
    </div>
	</body>
</html>
