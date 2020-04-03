<?php require_once ('header.php') ?>

<!--section start-->
<section class="register-page section-b-space mt-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="theme-card">
					<form class="theme-form">
						<div class="form-row">
							<div class="col-md-6">
								<label for="email">First Name</label>
								<input ng-model="registerFirstName" type="text" class="form-control" id="fname" placeholder="First Name" required="">
							</div>
							<div class="col-md-6">
								<label for="review">Last Name</label>
								<input ng-model="registerLastName" type="text" class="form-control" id="lname" placeholder="Last Name" required="">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<label for="email">email</label>
								<input ng-model="registerEmail" type="text" class="form-control" id="email" placeholder="Email" required="">
							</div>
							<div class="col-md-6">
								<label for="review">Password</label>
								<input ng-model="registerPassword" type="password" class="form-control" id="review" placeholder="Enter your password" required="">
							</div><button ng-click="register()" class="btn btn-solid">create Account</button></div>
					</form>
				</div>
			</div>
		</div>
		<p style="margin: 5px">Already have an account <span><a href="login.php">login</a></span></p>
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
</script>
