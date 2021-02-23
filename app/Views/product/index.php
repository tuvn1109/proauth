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
        <div class="col-md-7 col-12 d-flex  justify-content-center">
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
        <div class="col-md-5 col-12">
            <div class="row">
                <div class="col-12">
                    <div class="link-pro"><a href="/">Home</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a
                                href="/search?texts=<?= $menuactive ?>"><?= $menuactive ?></a>
                        &nbsp;&nbsp;>&nbsp;&nbsp;<a
                                href="/search?texts=<?= $info['slug_pro'] ?>"><?= $info['slug_pro'] ?></a></div>
                </div>
                <div class="col-12">
                    <div class="title-pro"><span><?= $info['name'] ?></span></div>
                </div>
                <div class="col-12">
                    <div class="price-pro">
						<?php
						if ($info['sale'] == 'yes') {
							?>
                            <span class="pricesale">$<?= $info['price'] ?> USD</span> <span
                                    class="price">$<?= $info['price_sale'] ?> USD</span>
							<?php
						} else {
							?>
                            <span class="price">$<?= $info['price'] ?> USD</span>
							<?php
						}
						?>
                    </div>

                </div>
                <style>

                    .flash-sale {
                        font-weight: 800;
                    }

                    .flash-sale #text {
                        color: #e24b3d;
                    }

                    .flash-sale p {
                        padding: 5px 10px;
                    }

                    #demo {
                        color: white;
                        background: linear-gradient(118deg, #dc2f41, rgb(236 132 35)) !important;
                        border-radius: 30px;

                    }
                </style>
				<?php
				if ($info['sale'] == 'yes') {
					if ($info['date_end_flash'] != null && $info['date_end_flash'] != '' && $info['date_end_flash'] > date('Y-m-d')) {
						?>
                        <div class="col-12">
                            <input type="date" value="<?= $info['date_end_flash'] ?>" id="date_end_flash" hidden>
                            <div class="sale-timeout-pro">
                                <div class="flash-sale d-flex"><p id="text">F <i><i class="fal fa-bolt"></i></i> ASH
                                        SALE
                                    </p>
                                    <p id="demo"></p></div>
                            </div>
                        </div>
						<?php
					}
				}
				?>
                <div class="col-12">
                    <div class="express-pro">
                        <p><i class="fal fa-bell"></i> ORDER CUT OFF FOR CHRISTMAS: Nov 25</p>
                    </div>
                </div>
                <div class="col-7 d-flex">
                    <div class=""><img src="/logo/US-logo.png" style="height: 30px;width: 30px"></div>
                    <div class="info-pro">Products are manufactured in<br><span><?= $info['manufactur'] ?></span></div>

                </div>
                <div class="col-5 d-flex">
                    <div class=""><img src="/logo/truck-logo.png" style="height: 30px;width: 30px"></div>
                    <div class="info-pro">Delivery<br><span><?= $info['delivery'] ?></span></div>

                </div>
                <div class="col-12" id="description">
                    <div class="ql-editor">
                        <p><?= $info['description'] ?></p>
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
                            <a href="/search?texts=<?= $t1 ?>">
                                <div class="tag-text">#<?= $t1 ?></div>
                            </a>
						<?php
						endforeach;
						?>
                    </div>
                </div>
            </div>
            <div class="row  mt-1">
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
                                        <input type="radio" name="color" value="<?= $color1['idcolor'] ?>"
                                               id="color<?= $color1['idcolor'] ?>" <?= $i == 1 ? 'checked' : '' ?>
                                               hidden>
                                        <div class="col-md-1 ">
                                            <div class="item-color" data-id="<?= $color1['id'] ?>"
                                                 data-idpro="<?= $color1['product_id'] ?>"
                                                 data-idcolor="<?= $color1['idcolor'] ?>"
                                                 style="background-color: <?= $color1['code'] ?>">
                                                <i class="far fa-check centerContent checkcl"
                                                   style="color: #FFFFFF;font-weight: bold;<?= $i != 1 ? 'display: none' : '' ?>"
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
										$isize = 0;
										foreach ($size as $size1):
											$isize++;
											?>
                                            <input type="radio" name="size" value="<?= $size1['id'] ?>"
                                                   id="size<?= $size1['id'] ?>" hidden>

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

                    <style>
                        #div-addcart .bootstrap-touchspin.input-group {
                            width: 100% !important;
                        }

                        #div-addcart .bootstrap-touchspin.input-group button {
                            background-color: #ffffff00 !important;
                            color: black !important;
                            font-size: 25px;
                        }

                        #div-addcart .bootstrap-touchspin {
                            border: 1px solid #2ECC71 !important;
                            font-size: 25px !important;
                            border-radius: 15px !important;
                            outline: none !important
                        }

                        #div-addcart .bootstrap-touchspin input {
                            font-size: 25px !important;
                        }

                        #div-addcart .bootstrap-touchspin .btn-primary:hover {
                            box-shadow: 0 1px 1px -1px #ffffff !important;
                        }

                    </style>
                    <div id="div-addcart">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" id="add-to-card" class="add-to-card w-100"
                                        data-id="<?= $info['id'] ?>">
                                    <span>ADD TO CART</span></button>
                            </div>
                            <div class="col-4"><input type="number" value="1" min="1" id="quantity-order">
                            </div>

                            <div class="col-2 text-right">
                                <div class="div-favourite-order centerContent" id="testdraw"
                                     data-id="<?= $info['id'] ?>">
									<?php
									if (in_array($info['id'], $arrFavourite)) {
										?>
                                        <i class="fas fa-heart" style="color: red"
                                           id="iconfavourite<?= $info['id'] ?>"></i>
										<?php
									} else {
										?>
                                        <i class="fal fa-heart" id="iconfavourite<?= $info['id'] ?>"></i>
										<?php
									}
									?>
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
    <style>
        #contentReview:focus {
            border-color: black !important;
        }

        .div-review {
            border-radius: 8px;
            padding: 15px 30px;
            border: 1px solid #DDD;
            background-color: #FFFFFF;
        }

        .review_name {
            font-size: 18px;
            font-weight: 800;
        }

        .review_star {
            color: #E67E22;
        }

        .review_content {
            font-size: 15px;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .upload-btn-wrapper .btn {
            border: 1px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
        }

        #preview img {
            margin-right: 15px;
        }

    </style>
    <div class="row mt-2">
        <div class="col-12"><span style="font-weight: bold; font-size: 25px">Review</span></div>
		<?php
		if (isset($user) and $user) {
			?>
            <div class="col-12 mb-1">
                <div class="div-review">


                    <form id="frrw" action="">
                        <div class='starrr'></div>
                        <textarea class="form-control mt-1" id="contentReview" rows="3"
                                  placeholder="Your comments about the product" name="content"></textarea>
                        <div class="upload-btn-wrapper mt-1">
                            <button type="button" class="btn" id="addphoto"><i class="far fa-plus"
                                                                               style="font-size: 14px"></i> <i
                                        class="fal fa-image"></i></button>
                            <button type="button" class="btn btn-review" data-id="<?= $info['id'] ?>">Review</button>
                        </div>
                        <input type="file" name="photoreview" id="photoreview" multiple hidden/>

                        <div id="preview">
                        </div>
                        <div>
                        </div>
                    </form>


                </div>
            </div>
			<?php
		}
		?>
    </div>
    <div class="row mt-2" id="divreview">
		<?php

		if (isset($feelback)) {
			foreach ($feelback as $val):
				$Y = date("Y", strtotime($val['created_at']));
				$M = date("m", strtotime($val['created_at']));
				$D = date("d", strtotime($val['created_at']));
				$H = date("H", strtotime($val['created_at']));
				$I = date("i", strtotime($val['created_at']));
				$date = $Y . $M . $D . $H . $I;
				?>
                <div class="col-12 mb-1">
                    <div class="div-review">
                        <div class="review_name"><?= $val['fullname'] ?></div>
                        <div class="review_meta d-flex">
                            <div class="review_star">
                                <div class="star-feelback">
									<?php
									for ($i = 0; $i < $val['rate']; $i++) {
										?>
                                        <i class="fas fa-star"></i>
										<?php
									}
									?>
                                </div>
                            </div>
                            <div class="review_date ml-1"><?= date("Y-m-d H:i", strtotime($val['created_at'])); ?></div>
                        </div>
                        <div class="review_content"><?= $val['content'] ?></div>
                        <div id="preview">

							<?php
							if (isset($photoRV[$val['customer_id']][$date])) {
								$arr = $photoRV[$val['customer_id']][$date];
								foreach ($arr as $nameimg) {
									?>
                                    <img height="100"
                                         src="/download/image?name=product/<?= $val['product_id'] ?>/review/<?= $val['customer_id'] ?>/<?= $date ?>/<?= $nameimg ?>">
									<?php
								}
							}

							?>
                        </div>
                    </div>
                </div>
			<?php
			endforeach;
		}
		?>
    </div>


</section>
<div id="divdesgin">
    <div id="clothing-designer"
         class="fpd-container fpd-shadow-2 fpd-topbar fpd-tabs fpd-tabs-side fpd-top-actions-centered fpd-bottom-actions-centered fpd-views-inside-left">
        <div class="fpd-product" title="Shirt Front" id="data-thumb-front"
             data-thumbnail="/download/<?= $color[0]['layout'] ?>">
            <img src="/download/<?= $color[0]['layout'] ?>" id="front-de" title="Base"
                 data-parameters='{"left": 450, "top": 300, "width":300,"height":400,  "colorLinkGroup": "Base","resizable": true}'/>
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

