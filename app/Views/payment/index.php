
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

                <form id="form_contact">
                    <div class="row">
                        <div class="col-3">
                            <div class="div-gender active-gender  centerContent">
                                <img src="/download/image?name=category/5/girl-logo.png"> Mrs
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="div-gender centerContent">
                                <img src="/download/image?name=category/4/man-logo.png"> Mr
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-3">
                            <fieldset class="form-group">
                                <label for="roundText">Fullname</label>
                                <input type="text" id="fullname" name="fullname" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['fullname'] : '' ?>" <?= isset($user) ? 'readonly' : '' ?>
                                       placeholder="Alax sanderia">
                            </fieldset>
                        </div>
                        <div class="col-3">
                            <fieldset class="form-group">
                                <label for="roundText">Phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['phone'] : '' ?>" <?= isset($user) ? 'readonly' : '' ?>
                                       placeholder="+1.6868.99.999">
                            </fieldset>
                        </div>
                        <div class="col-4">
                            <fieldset class="form-group">
                                <label for="roundText">Email</label>
                                <input type="text" id="email" name="email" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['email'] : '' ?>" <?= isset($user) ? 'readonly' : '' ?>
                                       placeholder="example@gmail.com">
                            </fieldset>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-3">
                            <fieldset class="form-group">
                                <label for="roundText">Country</label>
                                <input type="text" id="country" name="country" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['country'] : '' ?>" <?= isset($user) ? 'readonly' : '' ?>
                                       placeholder="United States">
                            </fieldset>
                        </div>
                        <div class="col-3">
                            <fieldset class="form-group">
                                <label for="roundText">City</label>
                                <input type="text" id="city" name="city" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['city'] : '' ?>" <?= isset($user) ? 'readonly' : '' ?>
                                       placeholder="New York">
                            </fieldset>
                        </div>
                        <div class="col-2">
                            <fieldset class="form-group">
                                <label for="roundText">Postal Code</label>
                                <input type="text" id="postalcode" name="postalcode"
                                       value="<?= isset($user) ? $user['postalcode'] : '' ?>" <?= isset($user) ? 'readonly' : '' ?>
                                       class="form-control round input-yellow"
                                       placeholder="999999">
                            </fieldset>
                        </div>
                        <div class="col-4">
                            <fieldset class="form-group">
                                <label for="roundText">Address</label>
                                <input type="text" id="address" name="address" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['address'] : '' ?>" <?= isset($user) ? 'readonly' : '' ?>
                                       placeholder="2707 Avenues Road">
                            </fieldset>
                        </div>

                    </div>
                </form>
                <div class="row">
                    <div class="col-12 title">
                        Payment Info
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="payment-card">
                            <div class="col-12 " style="border-bottom: 0.6px solid rgba(241, 196, 15, 0.7)">
                                <div class="row p-1">
                                    <div class="col-6 "><input type="radio" name="radio" checked=""> Card</div>
                                    <div class="col-6 text-right"><img src="/logo/card-logo.png"></div>
                                </div>
                            </div>
                            <div class="col-12 p-1 ">
                                <div class="row p-1">
                                    <div class="divcard col-12 d-flex">
                                        <img src="/logo/card-logo-1.png" class="mr-1">
                                        <input type="tel" name="cardnumber" class="cardnumber border-0 outline-none"
                                               placeholder="Card Number">
                                        <input type="tel" name="cardmmyy" class="cardmmyy border-0 outline-none"
                                               placeholder="MM / YY" maxlength="4">
                                        <input type="tel" name="cardcvv" class="cardcvv border-0 outline-none"
                                               placeholder="CVV" maxlength="3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 " style="border-top: 0.6px solid rgba(241, 196, 15, 0.7)">
                                <div class="row p-1">
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
						<?php
						if (isset($user)) {
							if (isset($shipping_add)) {
								$i = 0;
								foreach ($shipping_add as $shipping_add1):
									$i++;
									?>
                                    <div class="div_address <?= $i == 1 ? 'active-address' : '' ?>"
                                         style="margin-right: 60px" data-type="old"
                                         data-id="<?= $shipping_add1['id'] ?>">
                                        <div style="padding: 20px;text-align: center">
                                            <span>Same as Billing Address</span><br><span><?= $shipping_add1['city'] ?>, <?= $shipping_add1['country'] ?><br>
<?= $shipping_add1['address'] ?>, <?= $shipping_add1['postalcode'] ?></span>
                                        </div>
                                    </div>
								<?php
								endforeach;
							}
						}
						?>
                        <div class="div_address" style="background-color: #F8F4F4" data-type="new">
                            <div style="padding: 20px;text-align: center">
                                <span style="font-weight: 600">Register New</span><br><span>Change your Address</span>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="row mt-1" id="div_addressnew">
                    <div class="col-3">
                        <fieldset class="form-group">
                            <label for="roundText">Country</label>
                            <input type="text" id="country_new" name="country_new"
                                   class="form-control round input-yellow"
                                   value=""
                                   placeholder="United States">
                        </fieldset>
                    </div>
                    <div class="col-3">
                        <fieldset class="form-group">
                            <label for="roundText">City</label>
                            <input type="text" id="city_new" name="city_new" class="form-control round input-yellow"
                                   value=""
                                   placeholder="New York">
                        </fieldset>
                    </div>
                    <div class="col-2">
                        <fieldset class="form-group">
                            <label for="roundText">Postal Code</label>
                            <input type="text" id="postalcode_new" name="postalcode_new"
                                   value=""
                                   class="form-control round input-yellow"
                                   placeholder="999999">
                        </fieldset>
                    </div>
                    <div class="col-4">
                        <fieldset class="form-group">
                            <label for="roundText">Address</label>
                            <input type="text" id="address_new" name="address_new"
                                   class="form-control round input-yellow"
                                   value=""
                                   placeholder="2707 Avenues Road">
                        </fieldset>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 title">
                        Shipping Method
                    </div>

					<?php
					if (isset($listShippingMethod)) {
						$i = 0;
						foreach ($listShippingMethod as $val):
							$i++;
							?>
                            <div class="col-1 mt-2">
                                <div class="centerContent">
                                    <input type="radio" name="radiomethod" id="radiomethod"
                                           class="radio_shipping " <?= $i == 1 ? 'checked' : '' ?>
                                           style="width: 20px;height: 20px" data-id="<?= $val['id'] ?>">
                                </div>
                            </div>
                            <div class="col-5 mt-2">
                                <div class="method_ship <?= $i == 1 ? 'checked_method' : '' ?>" name="method"
                                     id="method<?= $val['id'] ?>">
                                    <div class="row">
                                        <div class="col-3 ">
                                            <div class="image centerContent">
                                                <img src="/download/image?name=<?= $val['logo'] ?>" class="w-100"></div>
                                        </div>
                                        <div class="col-6" style="white-space: nowrap"><span
                                                    class="name"><?= $val['name'] ?></span><br><span
                                                    class="expected_delivery">Expected delivery:<br>Jan 13</span></div>
                                        <div class="col-3">
                                            <div class="price centerContent"><?= $val['price'] ?>$</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						<?php
						endforeach;
					}
					?>
                    <div class="col-6">

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
					if (isset($listOrder)) {
						foreach ($listOrder as $val):
							?>
                            <div class="payment-item">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="/download/image?name=<?= $val['thumbnail'] ?>" class="w-100">
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
					}
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
                        <button type="button" class="btn_secure_checkout w-100" id="btn_place_order">PLACE YOUR ORDER
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>