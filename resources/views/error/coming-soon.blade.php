<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="">
	<meta name="author" content="Electro">
	<!-- FONTS -->
	<link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

	<meta charset="UTF-8">
	<title>Electro Maintenance</title>
	<link rel="shortcut icon" href="/cropped-electro-fav-icon-2-32x32.png">
	<link rel="stylesheet" href="{{ asset('maintenance/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('maintenance/css/jquery.fullPage.css') }}">
	<link rel="stylesheet" href="{{ asset('maintenance/css/jquery.mCustomScrollbar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('maintenance/css/font-awesome.min.css') }}">

	<link rel="stylesheet" href="{{ asset('maintenance/css/owl.carousel.css') }}">

	<link rel="stylesheet" href="{{ asset('maintenance/css/glitch.css') }}">

	<link rel="stylesheet" href="{{ asset('maintenance/css/style.css') }}">
</head>
<body class="yellow-color image-bg" style="background-color: black">

	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- HEADER -->
		<header class="site-header">

			<div class="container-fluid">
				<div class="row">

					<div class="col-xs-4">
						<a href="index.html" class="no-line logotype">ELECTRO</a>
					</div>

				</div>
			</div>
			
		</header>
		<!-- /HEADER -->

		<!-- CONTENT -->
		<section class="site-content">

			<div id="fullpage" class="fullpage-wrapper">

				<div class="all-section">

					<div class="sections" data-title="Home">

						<div class="section-content">
							<div class="section-wrap">

								<div class="container">
									<div class="row">
										<div class="col-xs-12 text-center">

											<!-- TIMER -->
											<div class="glitch-wrap glitch" data-time="">

												<div class="fadein">
													<div class="glitch-clock is-off">
														<div class="glitch-time">
															<div class="glitch-before">
																<div class="first-numb"></div>
																<i class="i1"></i>
																<div class="time-dott">:</div>
																<div class="glitch-triangle">
																	<div class="clip-figure">
																		<div class="mask-first">
																			<div class="mask-second">
																				<div class="clip-numb">
																					<div class="second-numb"></div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<i class="i2"></i>
																<div class="time-dott-sec">:</div>
																<div class="third-numb"></div>
																<i class="i3"></i>
															</div>
															<div class="glitch-content">
																<div class="first-numb"></div>
																<i class="i1"></i>
																<div class="time-dott">:</div>
																<div class="glitch-triangle">
																	<div class="clip-figure">
																		<div class="mask-first">
																			<div class="mask-second">
																				<div class="clip-numb">
																					<div class="second-numb"></div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<i class="i2"></i>
																<div class="time-dott-sec">:</div>
																<div class="third-numb"></div>
																<i class="i3"></i>
															</div>
															<div class="glitch-after">
																<div class="first-numb"></div>
																<i class="i1"></i>
																<div class="time-dott">:</div>
																<div class="glitch-triangle">
																	<div class="clip-figure">
																		<div class="mask-first">
																			<div class="mask-second">
																				<div class="clip-numb">
																					<div class="second-numb"></div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<i class="i2"></i>
																<div class="time-dott-sec">:</div>
																<div class="third-numb"></div>
																<i class="i3"></i>
															</div>
														</div>
													</div>
													<div class="glitch-figure">
														<div class="glitch-triang">
														</div>
													</div>
												</div>

											</div>
											<!-- /TIMER -->

											<h2 class="et-description">Website is under maintenance</h2>
											<div class="et-description-small">Please come back later</div>

										</div><!-- col-xs-12 -->
									</div><!-- row -->
								</div><!-- container -->

							</div><!-- section-wrap -->
						</div><!-- section-content -->

					</div><!-- /sections -->


				</div>

			</div>
			
		</section>
		<!-- /CONTENT -->
		
		<!-- FOOTER -->
		<footer class="site-footer">

			<div class="container-fluid">
				<div class="row">

					<div class="col-xs-12 text-center-xs text-right">
						<div class="copyright">
							© Electro, 2023.
						</div>
					</div>

				</div>
			</div>

		</footer>
		<!-- /FOOTER -->

	</div>
	<!-- /WRAPPER -->

	<script src="{{ asset('maintenance/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/jquery.fullPage.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/jquery.touchSwipe.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/jquery.swiper.js') }}"></script>
	<script src="{{ asset('maintenance/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/jquery.inview.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/jquery.placeholder.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/jquery.countdown.js') }}"></script>

	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script src="{{ asset('maintenance/js/googlemap.js') }}"></script>
	<script src="{{ asset('maintenance/js/validator.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('maintenance/js/main.js') }}"></script>
	

</body>
</html>