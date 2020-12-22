<section id="order">
    <div class="row">
        <div class="col-12">
            <h3>Payment Information</h3>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-8 col-12">

            <div class="payment-info">
                <div class="row">
                    <div class="col-12 title">
                        Contact Info
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">Mrs</div>
                    <div class="col-3">Mr</div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <fieldset class="form-group">
                            <label for="roundText">Fullname</label>
                            <input type="text" id="roundText" class="form-control round" placeholder="Rounded Input">
                        </fieldset>
                    </div>
                    <div class="col-3">
                        <fieldset class="form-group">
                            <label for="roundText">Phone Number</label>
                            <input type="text" id="roundText" class="form-control round" placeholder="+1.6868.99.999">
                        </fieldset>
                    </div>
                    <div class="col-4">
                        <fieldset class="form-group">
                            <label for="roundText">Email</label>
                            <input type="text" id="roundText" class="form-control round"
                                   placeholder="example@gmail.com">
                        </fieldset>
                    </div>

                </div>
                <div class="row">
                    <div class="col-3">
                        <fieldset class="form-group">
                            <label for="roundText">Country</label>
                            <input type="text" id="roundText" class="form-control round" placeholder="United States">
                        </fieldset>
                    </div>
                    <div class="col-3">
                        <fieldset class="form-group">
                            <label for="roundText">City</label>
                            <input type="text" id="roundText" class="form-control round" placeholder="New York">
                        </fieldset>
                    </div>
                    <div class="col-2">
                        <fieldset class="form-group">
                            <label for="roundText">Postal Code</label>
                            <input type="text" id="roundText" class="form-control round" placeholder="999999">
                        </fieldset>
                    </div>
                    <div class="col-4">
                        <fieldset class="form-group">
                            <label for="roundText">Address</label>
                            <input type="text" id="roundText" class="form-control round"
                                   placeholder="2707 Avenues Road">
                        </fieldset>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12 title">
                        Payment Info
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="payment-card">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-6 "><input type="radio" name="radio" checked=""> Card</div>
                                    <div class="col-6 text-right"><img src="/logo/card-logo.png"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="col-12"><i class="fas fa-credit-card"></i>
                                    <input type="text" id="roundText" class="form-control round"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-6 "><input type="radio" name="radio" checked=""> Paypal</div>
                                    <div class="col-6 text-right"><img src="/logo/paypal-logo.png"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <h3 class="mt-2">Delivery</h3>
            <div class="payment-info mt-1">
                <div class="row">
                    <div class="col-12 title">
                        Shipping Address
                    </div>

                    <div class="col-12 d-flex">
                        <div class="div_address active-address" style="margin-right: 60px">
                            <div style="padding: 20px;text-align: center">
                                <span>Same as Billing Address</span><br><span>New York, United States<br>
2707 Avenues Road, 999999</span>
                            </div>
                        </div>
                        <div class="div_address" style="background-color: #F8F4F4">
                            <div style="padding: 20px;text-align: center">
                                <span style="font-weight: 600">Register New</span><br><span>Change your Address</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 title">
                        Shipping Method
                    </div>
                </div>

            </div>

        </div>

        <div class="col-md-4 col-12">
            <div class="payment-info">
                <div class="row">
                    <div class="col-12 title">
                        Order Summary
                    </div>
                </div>
                <div class="row">
					<?php
					$total = 0;
					foreach ($listOrder as $val):
						?>
                        <div class="payment-item">
                            <div class="row">
                                <div class="col-3">
                                    <img src="/logo/mug1.jpg" class="w-100">
                                </div>
                                <div class="col-6">
                                    <div class="payment-item-name"><?= $val['name'] ?></div>
                                    <div class="payment-item-price">
										<?php
										if ($val['sale'] == 'yes') {
											$price = $val['price_sale'];
										} else {
											$price = $val['price'];
										}
										$total += $price;
										?>
                                        $<?= $price ?> USD
                                    </div>
                                    <div class="payment-item-quantity">Quantity : 1</div>
                                </div>
                                <div class="col-3 ">
                                    <div class="payment-icon centerContent">
                                        <i class="far fa-edit"></i>&nbsp;&nbsp;
                                        <i class="far fa-trash-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php
					endforeach;
					?>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="row ">
                            <div class="col-8 text-left summary-text">Oder Summary</div>
                            <div class="col-4 text-right summary-money">$<?= $total ?></div>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="row">
                            <div class="col-8 text-left service-text">Additional Service</div>
                            <div class="col-4 text-right service-money">$0</div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <div class="row total">
                            <div class="col-8 text-left">Total:</div>
                            <div class="col-4 text-right">$<?= $total ?></div>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="coupon_order">
                            <div class="row">
                                <div class="col-8"><input type="text" placeholder="COUPON CODE">
                                </div>
                                <div class="col-4 text-right">
                                    <button type="button" class="w-100">APPLY</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <button type="button" class="btn_secure_checkout w-100">PLACE YOUR ORDER</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>