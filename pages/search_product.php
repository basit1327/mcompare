<?php require_once ('header.php') ?>

<!--section start-->
<section class="mt-4 authentication-page">
    <div class="container">
        <section class="search-block">
            <div class="container p-0 mb-2">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <form class="form-header">
                            <div class="input-group">
                                <input ng-model="searchText" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Search Products......">
                                <div class="input-group-append">
                                    <button ng-click="searchProduct()" class="btn btn-solid"><i class="fa fa-search"></i>Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<!-- main section start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="section-t-space portfolio-section portfolio-padding metro-section port-col">
                <div class="isotopeContainer row">
                    <div id="loading" class="text-center" style="width: 100%;display: none;">
						<i class="fa fa-spinner fa-spin" style="font-size: 5em;"></i>
					</div>
					<img id="not-found" src="../assets/images/not_found2.png" style="width: 100%; margin: 10px;display: none;">
					<div style="margin-bottom: 40px" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 isotopeSelector">
                        <div class="product-box" ng-repeat="x in searchItems">
                            <div class="img-wrapper text-center">
                                <div class="front">
                                    <a href="#"><img style="transform: none;height: 300px; width: auto" src="{{x.image}}" class="img-fluid blur-up lazyload" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button ng-click="addItemToCart(x)" class="btn btn-lg" title="Add to cart"><i class="ti-shopping-cart" ></i></button>
                                   </div>
                            </div>
                            <div class="product-detail">
                                <a href="#" >
                                    <h6>{{x.name}}</h6>
                                </a>
                                <h4>SAR{{x.price}}</h4>
								<a href="market_detail.php?id={{x.market_id}}"><i class="fa fa-location-arrow"></i> {{x.market_name}}</a>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
<!-- main section end -->

<!-- Waiting Div -->
<div id="waiting" class="loading-container text-center" >
	<i class="fa fa-spinner fa-spin"></i>
</div>
<!-- Waiting Div end -->

<?php require_once ('footer.php') ?>
