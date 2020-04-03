<?php require_once ('header.php') ?>


<!-- product-box 1 -->
<section ng-init="getHomePageItems()" class="section-b-space p-t-0 ratio_asos" style="margin-top: 80px !important;">
    <div class="container">
        <div class="title3">
            <h2 class="title-inner3">special products</h2>
            <div class="line"></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-4 product-m no-arrow">
                    <div class="product-box" ng-repeat="x in homepageProducts.special" >
                        <div class="img-block">
                            <div class="front">
                                <a href="#"><img src="{{x.image}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
<!--                            <div class="cart-info" style="background-color: #333333;width: 30%; border-radius: 11px;padding: 10px;">-->
<!--								<a ng-if="x.image" href="#" ng-click="addItemToCart(x.id)" class="target" title="Add to Cart"><i class="ti-shopping-cart" style="color: white;"> </i></a>-->
<!--								<button  title="Add to Wishlist"><i class="ti-heart" aria-hidden="true" style="color: white;"></i></button>-->
<!--                            </div>-->
                        </div>
                        <div class="product-detail">
							<!-- Rating Section -->
							<div ng-if="x.rating==5" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
							<div ng-if="x.rating==4" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
							<div ng-if="x.rating==3" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
							<div ng-if="x.rating==2" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
							<div ng-if="x.rating==1" class="rating_star"><i class="fa fa-star"></i></div>
							<div ng-if="x.rating==0" class="rating_star"></div>
							<!-- Rating Section -->
							<a href="#">
                                <h6>{{x.name}}</h6>
                            </a>
                            <h4>SAR{{x.price}}</h4>
						</div>
                    </div>
          		</div>
            </div>
        </div>
    </div>
</section>
<!-- product-box 1 end -->

<!-- product slider -->
<section class="section-b-space">
    <div class="container">
        <div class="row multiple-slider">
            <div class="col-lg-3 col-sm-6">
                <div class="theme-card">
                    <h5 class="title-border">new products</h5>
                    <div class="offer-slider slide-1">
                        <div>
                            <div class="media" ng-repeat="x in homepageProducts.new">
								<a ng-if="$index<3" href="#"><img style="height: 150px;width: 130px;" class="img-fluid blur-up lazyload" src="{{x.image}}" alt=""></a>
                                <div ng-if="$index<3" class="media-body align-self-center">
									<!-- Rating Section -->
									<div ng-if="x.rating==5" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==4" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==3" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==2" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==1" class="rating_star"><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==0" class="rating_star"></div>
									<!-- Rating Section -->
									<a href="#">
                                        <h6>{{x.name}}</h6>
                                    </a>
                                    <h4>SAR{{x.price}}</h4>
                                </div>
								<button ng-click="addItemToCart(x)" ng-if="$index<3" tabindex="0" title="Add to cart">
									<i class="ti-shopping-cart"></i>
								</button>
                            </div>
						</div>
                        <div>
							<div class="media" ng-repeat="x in homepageProducts.new">
								<a ng-if="$index>=3" href="#"><img style="height: 150px;width: 130px;" class="img-fluid blur-up lazyload" src="{{x.image}}" alt=""></a>
								<div ng-if="$index>=3" class="media-body align-self-center">
									<!-- Rating Section -->
									<div ng-if="x.rating==5" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==4" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==3" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==2" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==1" class="rating_star"><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==0" class="rating_star"></div>
									<!-- Rating Section -->
									<a href="#">
										<h6>{{x.name}}</h6>
									</a>
									<h4>SAR{{x.price}}</h4>
								</div>
								<button ng-click="addItemToCart(x)" ng-if="$index>=3" tabindex="0" title="Add to cart">
									<i class="ti-shopping-cart"></i>
								</button>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="theme-card">
                    <h5 class="title-border">feature product</h5>
                    <div class="offer-slider slide-1">
						<div>
							<div class="media" ng-repeat="x in homepageProducts.featured">
								<a ng-if="$index<3" href="#"><img style="height: 150px;width: 130px;" class="img-fluid blur-up lazyload" src="{{x.image}}" alt=""></a>
								<div ng-if="$index<3" class="media-body align-self-center">
									<!-- Rating Section -->
									<div ng-if="x.rating==5" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==4" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==3" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==2" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==1" class="rating_star"><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==0" class="rating_star"></div>
									<!-- Rating Section -->
									<a href="#">
										<h6>{{x.name}}</h6>
									</a>
									<h4>SAR{{x.price}}</h4>
								</div>
								<button ng-click="addItemToCart(x)" ng-if="$index<3" tabindex="0" title="Add to cart">
									<i class="ti-shopping-cart"></i>
								</button>
							</div>
						</div>
						<div>
							<div class="media" ng-repeat="x in homepageProducts.featured">
								<a ng-if="$index>=3" href="#"><img style="height: 150px;width: 130px;" class="img-fluid blur-up lazyload" src="{{x.image}}" alt=""></a>
								<div ng-if="$index>=3" class="media-body align-self-center">
									<!-- Rating Section -->
									<div ng-if="x.rating==5" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==4" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==3" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==2" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==1" class="rating_star"><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==0" class="rating_star"></div>
									<!-- Rating Section -->
									<a href="#">
										<h6>{{x.name}}</h6>
									</a>
									<h4>SAR{{x.price}}</h4>
								</div>
								<button ng-click="addItemToCart(x)" ng-if="$index>=3" tabindex="0" title="Add to cart">
									<i class="ti-shopping-cart"></i>
								</button>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="theme-card">
                    <h5 class="title-border">best seller</h5>
                    <div class="offer-slider slide-1">
						<div>
							<div class="media" ng-repeat="x in homepageProducts.best">
								<a ng-if="$index<3" href="#"><img style="height: 150px;width: 130px;" class="img-fluid blur-up lazyload" src="{{x.image}}" alt=""></a>
								<div ng-if="$index<3" class="media-body align-self-center">
									<!-- Rating Section -->
									<div ng-if="x.rating==5" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==4" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==3" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==2" class="rating_star"><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==1" class="rating_star"><i class="fa fa-star"></i></div>
									<div ng-if="x.rating==0" class="rating_star"></div>
									<!-- Rating Section -->
									<a href="#">
										<h6>{{x.name}}</h6>
									</a>
									<h4>SAR{{x.price}}</h4>
								</div>
								<button ng-click="addItemToCart(x)" ng-if="$index<3" tabindex="0" title="Add to cart">
									<i class="ti-shopping-cart"></i>
								</button>
							</div>
						</div>
						<div>
							<div class="media" ng-repeat="x in homepageProducts.best">
								<a ng-if="$index>=3" href="#"><img style="height: 150px;width: 130px;" class="img-fluid blur-up lazyload" src="{{x.image}}" alt=""></a>
								<div ng-if="$index>=3" class="media-body align-self-center">
									<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
									<a href="#">
										<h6>{{x.name}}</h6>
									</a>
									<h4>SAR{{x.price}}</h4>
								</div>
								<button ng-click="addItemToCart(x)" ng-if="$index>=3" tabindex="0" title="Add to cart">
									<i class="ti-shopping-cart"></i>
								</button>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product slider end -->

<!-- Waiting Div -->
<div id="waiting" class="loading-container text-center" >
	<i class="fa fa-spinner fa-spin"></i>
</div>
<!-- Waiting Div end -->


<?php require_once ('footer.php') ?>
