<?php require_once ('header.php') ?>

<!--section start-->
<section class="login-page section-b-space mt-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="theme-card">
					<form class="theme-form">
						<div class="form-group">
							<label for="email">Email</label>
							<input ng-model="loginEmail" type="text" class="form-control" id="email" placeholder="Email" required="">
						</div>
						<div class="form-group">
							<label for="review">Password</label>
							<input ng-model="loginPassword" type="password" class="form-control" id="review" placeholder="Enter your password" required="">
						</div><button ng-click="login()" class="btn btn-solid">Login</button></form>
				</div>
			</div>
			<div class="col-lg-6 right-login">
				<h3>New User</h3>
				<div class="theme-card authentication-right">
					<h6 class="title-font">Create A Account</h6>
					<p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be able to order from our shop. To start shopping click register.</p><a href="register.php" class="btn btn-solid">Create an Account</a></div>
			</div>
		</div>
	</div>
</section>
<!--Section ends-->


<!-- Waiting Div -->
<div id="waiting" class="loading-container text-center" >
	<i class="fa fa-spinner fa-spin"></i>
</div>
<!-- Waiting Div end -->


<?php require_once ('footer.php') ?>

<script>
	$('.top-header').hide();
	$('.menu-right').hide();
	$('.mobile-fix-option').hide();

	localStorage.setItem("username","");
	localStorage.setItem("ip","");
</script>
