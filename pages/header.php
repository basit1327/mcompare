<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="multikart">
	<meta name="keywords" content="multikart">
	<meta name="author" content="multikart">
	<link rel="icon" href="../assets/images/favicon/2.png" type="image/x-icon">
	<link rel="shortcut icon" href="../assets/images/favicon/2.png" type="image/x-icon">
	<title>M-Compare - Compare market prices at single stop</title>

	<!--Google font-->
	<!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">-->

	<!-- Icons -->
	<link rel="stylesheet" type="text/css" href="../assets/css/fontawesome.css">

	<!--Slick slider css-->
	<link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/slick-theme.css">

	<!-- Animate icon -->
	<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">

	<!-- Themify icon -->
	<link rel="stylesheet" type="text/css" href="../assets/css/themify-icons.css">

	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

	<!-- Theme css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/color2.css" media="screen" id="color">

	<!-- Custom css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">

</head>

<body ng-app="mcompare_app" ng-controller="mainCTRL">

<!-- header start -->
<header class="header-2">
	<div class="mobile-fix-option"></div>
	<div class="top-header top-header-dark">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-right">
					<ul class="header-dropdown">
						<li class="mobile-wishlist"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i> wishlist</a></li>
						<li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i> My Account
							<ul ng-if="userName" class="onhover-show-div">
								<li><a href="#" data-lng="es">{{userName}}</a></li>
								<li><a href="login.php" data-lng="es">Logout</a></li>
							</ul>
							<ul ng-if="!userName" class="onhover-show-div">
								<li><a href="login.php" data-lng="es">Login</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="main-menu border-section border-top-0">
					<div class="brand-logo layout2-logo mt-4">
						<a href="index.php"><img src="../assets/images/logo.png" class="img-fluid blur-up lazyload" alt="" style="height: auto;"></a>
					</div>
					<div class="menu-right pull-right">
						<div class="icon-nav">
							<ul>
								<li class="onhover-div mobile-search">
									<div><img src="../assets/images/icon/search.png" onclick="openSearch()" class="img-fluid blur-up lazyload" alt=""> <i class="ti-search" onclick="openSearch()"></i></div>
									<div id="search-overlay" class="search-overlay">
										<div><span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
											<div class="overlay-content">
												<div class="container">
													<div class="row">
														<div class="col-xl-12">
															<form>
																<div class="form-group">
																	<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Search a Product">
																</div>
																<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="onhover-div mobile-setting">
									<div><img src="../assets/images/icon/setting.png" class="img-fluid blur-up lazyload" alt=""> <i class="ti-settings"></i></div>
									<div class="show-div setting">
										<h6>language</h6>
										<ul>
											<li><a href="#">english</a></li>
											<li><a href="#">العربية</a></li>
										</ul>
									</div>
								</li>
								<li class="onhover-div mobile-cart">
									<div  href="javascript:void(0)" ng-click="initSideCart()" onclick="openCart()" ><img src="../assets/images/icon/cart.png" class="img-fluid blur-up lazyload" alt=""> <i class="ti-shopping-cart"></i></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</header>
<!-- header end -->




<!-- Add to cart bar -->
<div id="cart_side" class=" add_to_cart bottom">
	<a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
	<div class="cart-inner" style="overflow-x: hidden">
		<div class="cart_top">
			<h3>my cart</h3>
			<div class="close-cart">
				<a href="javascript:void(0)" onclick="closeCart()">
					<i class="fa fa-times" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<div class="cart_media">
			<img src="../assets/images/not_found.png" ng-if="sideCartItems.length==0">
			<ul class="cart_product">
				<li ng-repeat="x in sideCartItems track by $index">
					<div class="media">
						<a href="#">
							<img alt="" class="mr-3" src="{{x.image}}">
						</a>
						<div class="media-body">
							<a href="#">
								<h4>{{x.name}}</h4>
							</a>
							<h4>
								<span>1 x SAR {{x.price}}</span>
							</h4>
						</div>
					</div>
					<div class="close-circle">
						<a href="#">
<!--							<i class="ti-trash" aria-hidden="true"></i>-->
						</a>
					</div>
				</li>
			</ul>
			<ul class="cart_total">
				<li>
					<div class="buttons">
						<a ng-if="sideCartItems.length>0" href="cart.php" class="btn btn-solid btn-xs checkout">view cart</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- Add to cart bar end-->
