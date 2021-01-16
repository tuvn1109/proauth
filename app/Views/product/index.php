<section id="incentives">
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="bg-blue" id="div-text">
                <span>FREE SHIPPING ALL ORDER OVER $100</span>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="bg-orange" id="div-text">
                <span>BLACK FRIDAY SALE OFF TO 50%</span>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="bg-yellow" id="div-text">
                <span>WE SUPPORT 24 HOURS A DAY</span>
            </div>
        </div>
    </div>
</section>

<section id="main-product">
    <div class="row ">
        <div class="col-md-6 col-12 d-flex  justify-content-center">
            <div class="content-carousel" id="c1">
                <div class="owl-carousel">
					<?php


					foreach ($image as $image1):
						?>
                        <div class="item"><img
                                    src="/download/image?name=product/<?= $info['id'] ?>/image/<?= $color[0]['idcolor'] ?>/<?= $image1 ?>"
                                    class="img-fluid"></div>
					<?php
					endforeach;
					?>
                </div>
            </div>

        </div>
        <div class="col-md-6 col-12 d-flex justify-content-center">
            <div class="row">
                <div class="col-12">
                    <div class="link-pro">Home&nbsp;&nbsp;>&nbsp;&nbsp;<?= $menuactive ?>
                        &nbsp;&nbsp;>&nbsp;&nbsp;<?= $info['slug_pro'] ?></div>
                </div>
                <div class="col-12">
                    <div class="title-pro"><span><?= $info['name'] ?></span></div>
                </div>
                <div class="col-12">
                    <div class="price-pro">
						<?php
						if ($info['sale'] == 'yes'){
							?>
                            <span class="pricesale" style="text-decoration-line: line-through;margin-right: 15px;color: rgba(102, 101, 101, 0.78);
">$<?= $info['price'] ?> USD</span> <span class="price">$<?= $info['price_sale'] ?> USD</span>
							<?php
						}else{
						?>
                        <span class="pricesale">$<?= $info['price'] ?> USD
                                    <?php
                                    }
                                    ?>
                    </div>

                </div>
                <div class="col-12">
                    <div class="sale-timeout-pro">
                    </div>
                </div>
                <div class="col-12">
                    <div class="express-pro">
                        <p>ORDER CUT OFF FOR CHRISTMAS: Nov 25</p>
                    </div>
                </div>
                <div class="col-6 d-flex">
                    <div class=""><img src="/logo/US-logo.png" style="height: 30px;width: 30px"></div>
                    <div class="info-pro">Products are manufactured in<br><span><?= $info['manufactur'] ?></span></div>

                </div>
                <div class="col-6 d-flex">
                    <div class=""><img src="/logo/truck-logo.png" style="height: 30px;width: 30px"></div>
                    <div class="info-pro">Products are manufactured in<br><span><?= $info['delivery'] ?></span></div>

                </div>
                <div class="col-12">
                    <div class="title-discription-pro">
                        <p><?= $info['description'] ?></p>
                    </div>
                    <div class="discription-pro">
                        <p><?= $info['description_detail'] ?></p>
                    </div>
                </div>


				<?php

				$t = explode(',', $info['tag']);

				?>
                <div class="col-12  d-flex">
                    <div><img src="/logo/tag-logo.png" style="height: 14.374929428100586px;width: 14.37868881225586px;">
                    </div>
                    <div class="tag d-flex">
						<?php
						foreach ($t as $t1):
							?>
                            <div class="tag-text">#<?= $t1 ?></div>
						<?php
						endforeach;
						?>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
        </div>
        <div class="col-md-6 col-12">
            <div class="row">
                <div class="col-3">Size Guide</div>
                <div class="col-3">Delivery & Return</div>
                <div class="col-3">Ask a Question</div>
            </div>


            <div class="row mt-1">
                <div class="col-12">
                    <div id="div-choose">
                        <div class="div-choose-type" style="display: none">
                            <div>
                                <div class="col-12 title-type-pro"><span>Choose a product type</span> <i
                                            class="fas fa-edit"></i></div>
                                <div class="col-12 list-type-pro">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="item">
                                                <div class="thumb"><img src="/logo/tshirt-type.jpg" class="img-fluid">
                                                </div>
                                                <div class="title d-flex justify-content-center">xxxx</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="item">
                                                <div class="thumb"><img src="/logo/tshirt-type.jpg" class="img-fluid">
                                                </div>
                                                <div class="title d-flex justify-content-center">xxxx</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="item ">
                                                <div class="thumb"><img src="/logo/tshirt-type.jpg" class="img-fluid">
                                                </div>
                                                <div class="title d-flex justify-content-center">xxxx</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="div-choose-color">
                            <div class="col-12 title-type-pro"><span>Color</span></div>
                            <div class="col-12 list-color-pro ">
                                <div class="row">

									<?php

									$i = 0;
									foreach ($color as $color1):
										$i++;

										?>
                                        <div class="col-1 ">
                                            <div class="item-color" data-id="<?= $color1['id'] ?>"
                                                 data-idpro="<?= $color1['product_id'] ?>"
                                                 data-idcolor="<?= $color1['idcolor'] ?>"
                                                 style="background-color: <?= $color1['code'] ?>">
                                                <i class="far fa-check centerContent checkcl"
                                                   style="color: #FFFFFF;font-weight: bold;display: none"
                                                   id="checkcl<?= $color1['idcolor'] ?>"></i>
                                            </div>
                                        </div>
									<?php
									endforeach;
									?>
                                </div>
                            </div>
                        </div>

                        <div id="div-choose-size">
                            <div class="col-12 title-type-pro"><span>Size</span></div>
                            <div class="col-12 list-size-pro">
                                <div class="row">
                                    <div class="col-12  d-flex">

										<?php
										foreach ($size as $size1):
											?>
                                            <div class="size" data-id="<?= $size1['id'] ?>">
                                                <span><?= $size1['value'] ?></span></div>
										<?php
										endforeach;
										?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div id="div-btn-custom" class="d-flex justify-content-center">

                            <div class="col-2"></div>
                            <div class="col-8">
                                <button id="modalButton" class="w-100"><i class="fad fa-pencil-paintbrush"></i> Custom
                                </button>
                            </div>
                            <div class="col-2"></div>

                        </div>

                        <div id="div-preview" class="mt-1 p-2" style="display: none">
                            <div class="row">
                                <div class="col-5" style="border-radius: 15px;background-color: #FFFF;">
                                    <img src="" id="previewfront" class="w-100">
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5" style="border-radius: 15px;background-color: #FFFF;">
                                    <img src="" id="previewback" class="w-100">
                                </div>
                            </div>
                        </div>

                        <div id="div-note">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12"><span style="color: red">*</span> Please make sure that all the
                                        options you have chosen are correct before clicking on the "Add To Cart" button.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div id="div-addcart">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" id="add-to-card" class="add-to-card w-100"
                                        data-id="<?= $info['id'] ?>">
                                    <span>ADD TO CART</span></button>
                            </div>
                            <div class="col-4"><input type="number" class="quantity-order" value="1" min="1"
                                                      id="quantity-order"></div>

                            <div class="col-2 text-right">
                                <div class="div-favourite-order centerContent" id="testdraw"><i class="fal fa-heart"
                                                                                                id="iconfavourite5"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="div-addcart">
                        <div class="row">
                            <div class="col-12">
                                <i class="fas fa-caret-right"></i> Shipping calculated at checkout<br>
                                <i class="fas fa-caret-right"></i> Import Duty and GST/VAT applicable in your country
                                not included<br>
                                <i class="fas fa-caret-right"></i> Need Help? support@lifecom.io

                            </div>


                            <div class="col-12 mt-2">
                                <img src="/logo/safe_checkout.png" class="w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="divdesgin">
    <div id="clothing-designer"
         class="fpd-container fpd-shadow-2 fpd-topbar fpd-tabs fpd-tabs-side fpd-top-actions-centered fpd-bottom-actions-centered fpd-views-inside-left">
        <div class="fpd-product" title="Shirt Front" id="data-thumb-front"
             data-thumbnail="/download/<?= $color[0]['layout'] ?>">
            <img src="/download/<?= $color[0]['layout'] ?>" id="front-de" title="Base"
                 data-parameters='{"left": 450, "top": 300, "width":300,"height":400, "colors": "#d59211", "price": 20, "colorLinkGroup": "Base","removable":"true"}'/>


            <div class="fpd-product" title="Shirt Back" id="data-thumb-back"
                 data-thumbnail="/download/<?= $color[0]['back'] ?>">
                <img src="/download/<?= $color[0]['back'] ?>" id="back-de" title="Base"
                     data-parameters='{"left": 450, "top": 300, "width":300,"height":400, "colors": "#d59211", "price": 20, "colorLinkGroup": "Base"}'/>
            </div>

        </div>


        <div class="fpd-design">
			<?php
			foreach ($cateImage as $key => $val):
				?>
                <div class="fpd-category" title="<?= $key ?>">
					<?php
					foreach ($val as $key2 => $value):

						?>
                        <img src="/images-pro/<?= $key ?>/<?= $value ?>" title="<?= $value ?>"
                             data-parameters='{"zChangeable": true, "left": 215, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "price": 10, "boundingBox": "Base", "autoCenter": true}'/>
					<?php
					endforeach;
					?>
                </div>
			<?php
			endforeach;
			?>

        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Custom</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="divlayout p-1 active-lay"
                                     data-img="/download/image?name=product/24/layout/font.png">
                                    <img src="/download/image?name=product/24/layout/font.png"
                                         class="w-100 img-fluid">
                                    <span class="label_layout">Front</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="divlayout p-1" data-img="/download/image?name=product/24/layout/back.png">
                                    <img src="/download/image?name=product/24/layout/back.png"
                                         class="w-100  img-fluid">
                                    <span class="label_layout">Back</span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="divcanvas">
                            <canvas width="600" height="600" id="c"></canvas>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-4">
                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> IMAGE
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-success btn-sm" id="btn-add-text"><i
                                            class="fas fa-plus"></i> TEXT
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">PreA</button>
            </div>
        </div>
    </div>
</div>

