<?php require_once ('header.php') ?>


<section class="mt-4 section-b-space light-layout" ng-init="initCartPage()">
    <img src="../assets/images/not_found.png" ng-if="mainCartItems.length==0" style="width: 100%; margin-top: 30%">
	<div class="container" ng-if="mainCartItems.length>0">
		<p style="margin: 5px">Products has been added to cart
		   from different markets so you can find a better deal
		   compare the prices of markets
		</p>
        <div class="row footer-theme partition-f mt-3">
            <div class="col-lg-4 col-md-6" ng-repeat="x in mainCartItems">
                <div class="footer-title footer-mobile-title">
                    <h4 ng-if="x.isLeast" style="padding: 5px; background-color: green;color: white;">{{x.market_name}} <span class="mr-4 pull-right"> Total: SAR{{x.total}}</span></h4>
                    <h4 ng-if="!x.isLeast" style="padding: 5px;">{{x.market_name}} <span class="mr-4 pull-right"> Total: SAR{{x.total}}</span></h4>
                </div>
                <div class="footer-contant">
                    <!-- Start -->
                    <section class="cart-section section-b-space">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table cart-table table-responsive-xs">
                                    <thead>
                                        <tr class="table-head">
                                            <th scope="col">image</th>
                                            <th scope="col">product name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="y in x.product">
                                            <td>
                                                <a href="#"><img src="{{y.image}}" alt=""></a>
                                            </td>
                                            <td>
												<a href="#">{{y.name}}</a>
                                                <div class="mobile-cart-content row">
                                                    <div class="col-xs-3">
                                                        <div class="qty-box">
                                                            <div class="input-group">
                                                                <input disabled type="text" name="quantity" class="form-control input-number" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <h2 class="td-color">SAR {{y.price}}</h2>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <h2 class="td-color"><a href="#" class="icon">
																<i class="ti-close"></i>
															</a>
														</h2>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </section>
                    <!-- ENds here -->
                </div>
            </div>
        </div>
    </div>
</section>



<section ng-if="mainCartItems.length>0" class="cart-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row cart-buttons">
                    <div class="col-12"><button ng-click="clearCart()" class="btn btn-danger">Clear Cart</button></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once ('footer.php') ?>
