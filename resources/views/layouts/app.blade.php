<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Dashboard Menu</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
	</head>
	<body>

		<!-- Loading Spinner -->
		<div id="overlay" style="display:none;">
			<div class="spinner">
			</div>
			<br />
			Loading...
		</div>
		<!-- /Loading Spinner -->

		<div class="container-fluid" id="container-base" style="margin: 0px">
			<!-- Navigation Menu -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 0px">
				<div class="container-fluid" id="container-nav">
					<a class="navbar-brand" href="#">Dashboard</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('dashboard.transaksi') }}">Transaksi Harian H-0</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ request()->is('dashboard-rekon') ? 'active' : '' }}" href="{{ route('dashboard.rekon') }}">Rekon Naik</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ request()->is('proses-rekon') ? 'active' : '' }}" href="{{ route('proses.rekon') }}">Proses Rekon Naik</a>
							</li>
						</ul>
					</div>
                    <div id="runningText" style="font-size: 18px; color: white; text-align: center;"></div>
				</div>
			</nav>
	
			<!-- Content Area -->
			<div id="content-area" class="mt-4">
				@yield('content')
			</div>
		</div>
		
		{{-- js --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
		<script src="{{ asset('vendor/apexcharts/apexcharts.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
		@yield('js')
		{{-- end js --}}

	</body>

</html>