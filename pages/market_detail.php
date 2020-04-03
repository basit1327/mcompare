
<?php require_once ('header.php') ?>


<!-- section start -->
<section ng-init="getMarketDetail()">
	<div class="mt-4 collection-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="product-slick">
						<div><img style="height: 250px; width: 100%" src="{{marketDetail.image}}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- Section ends -->


<!-- product-tab starts -->
<section class="tab-product m-0">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-12">
				<ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
					<li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">Description</a>
						<div class="material-border"></div>
					</li>
				</ul>

				<div class="tab-content nav-material" id="top-tabContent">
					<div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
						<p style="margin-top: 60px">{{marketDetail.description}}</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- product-tab ends -->



<?php require_once ('footer.php') ?>
