<section id="order">
    <div class="row">
        <div class="col-md-8 col-12">
			<?php
			$total = 0;
			if ($listCart) {
				foreach ($listCart as $val):
					if ($val['sale'] == 'yes') {
						$total += $val['price_sale'];
					} else {
						$total += $val['price'];
					}
					?>
                    <div class="col-md-12 order-list">
                        <div class="order-div">
                            <div class="order-img d-flex">
                                <div class="order-img-front">
                                    <img src="<?= $val['front'] ?>" class="w-100">
                                    <div class="icon-front centerContent">Front</div>
                                </div>
                                <div class="order-img-back ">
                                    <img src="<?= $val['back'] ?>" class="w-100">
                                    <div class="icon-back centerContent">Back</div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 25px">
                                <div class="col-8">
                                    <div class="order-item-name">
                                        <span><?= $val['name'] ?></span><br>
                                        <div class="order-item-type">Product type: <span>Two Tone Mug Blue 11 oz</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="quantity d-flex"><span>Quantity:</span> <input type="number"
                                                                                               class="inputQuantity"
                                                                                               value="1">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="order-item-price">

										<?php
										if ($val['sale'] == 'yes'){
											?>
                                            <span class="pricesale" style="text-decoration-line: line-through;margin-right: 15px;color: rgba(102, 101, 101, 0.78);
">$<?= $val['price'] ?> USD</span> <span class="price">$<?= $val['price_sale'] ?> USD</span>
											<?php
										}else{
										?>
                                        <span class="pricesale">$<?= $val['price'] ?> USD
                                    <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="delivery"><img src="/logo/truck-logo.png"
                                                               style="height: 30px;width: 30px">
                                        <span>Delivery</span><br><span class="text-expree">Express
                                by 29 Jan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

				<?php
				endforeach;
			}
			?>
        </div>

        <div class="col-md-4 col-12">
            <div class="secure_checkout ">
                <div class="row">
                    <div class="col-12 ">
                        <div class="account_order centerContent">UNREGISTERED ACCOUNT</div>
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
                    <div class="col-12 mt-2">
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
                    <div class="col-12 mt-2">
                        <div class="note_order">*Shipping and tax will be calculated on checkout</div>
                    </div>
                    <div class="col-12 mt-1">
                        <button type="button" class="btn_secure_checkout w-100">SECURE CHECKOUT</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>