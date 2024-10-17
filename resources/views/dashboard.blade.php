<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>
			Dashboard - Transaksi Harian
		</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
		{{-- <link href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css" rel="stylesheet"> --}}
		{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"> --}}
	</head>
	<body>
		<div id="app" data-get-data-url="{{ url('/getData') }}"></div>
		<!-- Loading Spinner -->
		<div id="overlay" style="display:none;">
			<div class="spinner">
			</div>
			<br />
			Loading...
		</div>
		<!-- /Loading Spinner -->
		<div id="wrapper">
			<div class="content-area">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-8">
							<div class="main">
								<div class="row mt-4">
									<div class="col-md-4">
										<div class="row header">
											<div class="col-md-12" style="padding: 0">
												<div class="box box1">
													<div class="details">
														<h4>
															P2APST
														</h4>
														<h3 id="r_p2apst">
														</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="row body">
											<div class="col-md-6" style="padding-right: 0">
												<div class="box box11">
													<div class="details">
														<h5>
															TAGLIS
															<h6 id="tgls_p">
															</h6>
														</h5>
													</div>
												</div>
											</div>
											<div class="col-md-6" style="padding-left: 0">
												<div class="box box12">
													<div class="details">
														<h5>
															NONTAGLIS
															<h6 id="ntgls_p">
															</h6>
														</h5>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="row header">
											<div class="col-md-12" style="padding: 0">
												<div class="box box2">
													<div class="details">
														<h4>
															CARGO
														</h4>
														<h3 id="r_cargo">
														</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="row body">
											<div class="col-md-6" style="padding-right: 0">
												<div class="box box21">
													<div class="details">
														<h5>
															TAGLIS
															<h6 id="tgls_c">
															</h6>
														</h5>
													</div>
												</div>
											</div>
											<div class="col-md-6" style="padding-left: 0">
												<div class="box box22">
													<div class="details">
														<h5>
															NONTAGLIS
															<h6 id="ntgls_c">
															</h6>
														</h5>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="row header">
											<div class="col-md-12" style="padding: 0">
												<div class="box box3">
													<div class="details">
														<h4>
															AP2T
														</h4>
														<h3 id="r_ap2t">
														</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="row body">
											<div class="col-md-6" style="padding-right: 0">
												<div class="box box31">
													<div class="details">
														<h5>
															TAGLIS
															<h6 id="tgls_a">
															</h6>
														</h5>
													</div>
												</div>
											</div>
											<div class="col-md-6" style="padding-left: 0">
												<div class="box box32">
													<div class="details">
														<h5>
															NONTAGLIS
															<h6 id="ntgls_a">
															</h6>
														</h5>
													</div>
												</div>
											</div>
										</div>
									</div>		
								</div>			
							</div>
						</div>
						<div class="col-lg-4">
							<div class="main">
								<div class="row mt-4">
									<div class="col-md-4" style="padding: 0px 0px 0px 12px">
										<div class="box box4">
											<div class="details2">
												<h3>
													SELISIH
												</h3>
												<h5>
													P2APST vs CARGO
												</h5>
												<h6 id="sel1">
												</h6>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6" style="padding-right: 0">
												<div class="box box51">
													<div class="details">
														<h5>
															TAGLIS
															<h6 id="sel4">
															</h6>
														</h5>
													</div>
												</div>
											</div>
											<div class="col-md-6" style="padding-left: 0">
												<div class="box box52">
													<div class="details">
														<h5>
															NON
															<h6 id="sel5">
															</h6>
														</h5>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4" style="padding: 0">
										<div class="box box41">
											<div class="details2">
												<h3>
													SELISIH
												</h3>
												<h5>
													CARGO vs AP2T
												</h5>
												<h6 id="sel2">
												</h6>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6" style="padding-right: 0">
												<div class="box box53">
													<div class="details">
														<h5>
															TAGLIS
															<h6 id="sel6">
															</h6>
														</h5>
													</div>
												</div>
											</div>
											<div class="col-md-6" style="padding-left: 0">
												<div class="box box54">
													<div class="details">
														<h5>
															NON
															<h6 id="sel7">
															</h6>
														</h5>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4" style="padding: 0px 12px 0px 0px">
										<div class="box box42">
											<div class="details2">
												<h3>
													SELISIH
												</h3>
												<h5>
													P2APST vs AP2T
												</h5>
												<h6 id="sel3">
												</h6>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6" style="padding-right: 0">
												<div class="box box55">
													<div class="details">
														<h5>
															TAGLIS
															<h6 id="sel8">
															</h6>
														</h5>
													</div>
												</div>
											</div>
											<div class="col-md-6" style="padding-left: 0">
												<div class="box box56">
													<div class="details">
														<h5>
															NON
															<h6 id="sel9">
															</h6>
														</h5>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-8">
							<div class="main">
								<div class="row mt-4">
									<div class="col-md-12">
										<div class="box columnbox mt-4">
											<div id="lineDataChart">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="main">
								<div class="row mt-4">
									<div class="col-md-12">
										<div class="box columnbox mt-4">
											<div id="columnChart">
											</div>
										</div>
										<div class="box columnbox mt-4">
											<div id="columnChart2">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

								<div class="row">
									<div class="col-md-4">
										<div class="box tablebox mt-4">
											<legend class="with-border">
												P2APST
											</legend>
											<div class="data-tables">
												<table id="dataTableSatu" class="table table-striped table-bordered text-center nowrap"
												style="width: 100%">
													<thead class="bg-light text-capitalize">
														<tr>
															<th class="text-uppercase">
																jam
															</th>
															<th class="text-uppercase">
																lbr nontaglis
															</th>
															<th class="text-uppercase">
																lbr taglis
															</th>
														</tr>
													</thead>
													<tbody>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="box tablebox mt-4">
											<legend class="with-border">
												CARGO
											</legend>
											<div class="data-tables">
												<table id="dataTableDua" class="table table-striped table-bordered text-center nowrap"
												style="width: 100%">
													<thead class="bg-dark text-capitalize">
														<tr>
															<th class="text-uppercase">
																jam
															</th>
															<th class="text-uppercase">
																lbr nontaglis
															</th>
															<th class="text-uppercase">
																lbr taglis
															</th>
														</tr>
													</thead>
													<tbody>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="box tablebox mt-4">
											<legend class="with-border">
												AP2T
											</legend>
											<div class="data-tables">
												<table id="dataTableTiga" class="table table-striped table-bordered text-center nowrap"
												style="width: 100%">
													<thead class="bg-dark text-capitalize">
														<tr>
															<th class="text-uppercase">
																jam
															</th>
															<th class="text-uppercase">
																lbr nontaglis
															</th>
															<th class="text-uppercase">
																lbr taglis
															</th>
														</tr>
													</thead>
													<tbody>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js">
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
		</script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js">
		</script>
		<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js">
		</script>
		<script src="{{ asset('vendor/apexcharts/apexcharts.js') }}">
		</script>
		<script src="{{ asset('js/data.js') }}">
		</script>
	</body>

</html>