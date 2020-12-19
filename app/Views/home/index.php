<?php
if ($setting['section1'] == 'on') {
	?>
    <section class="main-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-body"><img src="/logo/bestselling-logo.png"><span>Best Selling</span></div>
            </div>
        </div>
        <div class="row bestsell-item animate__animated animate__fadeIn animate__slow">
            <div class="col-lg-6 col-12">
                <div class="row">
					<?php
					foreach ($besttshirt as $besttshirt1):
						?>
                        <div class="col-sm-6 col-12">
                            <div id="bestsell">
                                <div class="thumb-bestsell">
                                    <img src="/logo/bestsell1.jpg" class="img-fluid w-100">
                                    <div id="back-hover">
                                        <div class="centerContent">
                                            <button class="btn-quickview"><span>quick view</span>
                                            </button>
                                            <button class="btn-addcart"><span>add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="favourite" data-id="<?= $besttshirt1['id'] ?>">
										<?php
										if (in_array($besttshirt1['id'], $arrFavourite)) {
											?>
                                            <i class="fas fa-heart" style="color: red"
                                               id="iconfavourite<?= $besttshirt1['id'] ?>"></i>
											<?php
										} else {
											?>
                                            <i class="fal fa-heart" id="iconfavourite<?= $besttshirt1['id'] ?>"></i>
											<?php
										}
										?>
                                    </div>
                                    <div id="shareproduct"><i class="far fa-share-alt"></i></div>
                                </div>
                                <div id="name-item"><a
                                            href="/product/<?= $besttshirt1['slug'] ?>"><?= $besttshirt1['name'] ?></a>
                                </div>
                                <div id="classify-item">Personalized Shirt</div>
                                <div id="price-item-mini-right">
									<?php
									if ($besttshirt1['sale'] == 'yes'){
										?>
                                        <span class="pricesale" style="text-decoration-line: line-through;margin-right: 15px;color: rgba(102, 101, 101, 0.78);
">$<?= $besttshirt1['price'] ?> USD</span> <span class="price">$<?= $besttshirt1['price_sale'] ?> USD</span>
										<?php
									}else{
									?>
                                    <span class="pricesale">$<?= $besttshirt1['price'] ?> USD
                        <?php
                        }
                        ?>
                                </div>
								<?php
								if ($besttshirt1['status'] == 'new') {
									?>
                                    <div id="ellipse-new-item"><span>NEW</span></div>

									<?php
								} elseif ($besttshirt1['status'] == 'sale') {
									?>
                                    <div id="ellipse-sale-item">
                                        <span>-<?= 100 - ($besttshirt1['price_sale'] / $besttshirt1['price'] * 100) ?>%</span>
                                    </div>
									<?php
								}
								?>
                            </div>
                        </div>
					<?php
					endforeach;
					?>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="row">
					<?php
					foreach ($bestmug as $bestmug1):
						?>
                        <div class="col-md-4 col-6">
                            <div id="bestsell">
                                <div class="thumb-bestsell-right">
                                    <img src="/logo/mug1.jpg" class="img-fluid w-100">
                                    <div id="back-hover">
                                        <div class="centerContent">
                                            <button class="btn-quickview"><span>quick view</span>
                                            </button>
                                            <button class="btn-addcart"><span>add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="favourite" data-id="<?= $bestmug1['id'] ?>">
										<?php
										if (in_array($bestmug1['id'], $arrFavourite)) {
											?>
                                            <i class="fas fa-heart" style="color: red"
                                               id="iconfavourite<?= $bestmug1['id'] ?>"></i>
											<?php
										} else {
											?>
                                            <i class="fal fa-heart" id="iconfavourite<?= $bestmug1['id'] ?>"></i>
											<?php
										}
										?>
                                    </div>
                                    <div id="shareproduct"><i class="far fa-share-alt"></i></div>
                                </div>
                                <div id="name-item-mini-right"><a
                                            href="/product/<?= $besttshirt1['slug'] ?>"><?= $besttshirt1['name'] ?></a>
                                </div>
                                <div id="classify-item-mini-right">Personalized Shirt</div>
                                <div id="price-item-mini-right">
									<?php
									if ($bestmug1['sale'] == 'yes'){
										?>
                                        <span class="pricesale" style="text-decoration-line: line-through;margin-right: 15px;color: rgba(102, 101, 101, 0.78);
">$<?= $bestmug1['price'] ?> USD</span> <span class="price">$<?= $bestmug1['price_sale'] ?> USD</span>
										<?php
									}else{
									?>
                                    <span class="pricesale">$<?= $bestmug1['price'] ?> USD
                        <?php
                        }
                        ?>
                                </div>
								<?php
								if ($bestmug1['status'] == 'new') {
									?>
                                    <div id="ellipse-new-item"><span>NEW</span></div>

									<?php
								} elseif ($bestmug1['status'] == 'sale') {
									?>
                                    <div id="ellipse-sale-item">
                                        <span>-<?= 100 - ($bestmug1['price_sale'] / $bestmug1['price'] * 100) ?>%</span>
                                    </div>
									<?php
								}
								?>

                            </div>
                        </div>
					<?php
					endforeach;
					?>
                    <div class="col-md-12 col-12" id="banner-bestsell">
                        <a href="<?= $banner['image1_link'] ?>">
                            <div id="bestsell-mini-right" class="animate__animated animate__tada"><img
                                        src="/download/image?name=<?= $banner['image1'] ?>" class="img-fluid w-100">
                            </div>
                        </a>
                    </div>

                </div>
            </div>

            <div class="col-lg-6 col-12" id="banner-bestsell2">
                <a href="<?= $banner['image2_link'] ?>">
                    <div id="bestsell-mini-right"><img src="/download/image?name=<?= $banner['image2'] ?>"
                                                       class="img-fluid w-100"></div>
                </a>

                <div id="text-bottom-banner"><?= $banner['textsell'] ?></div>
            </div>


            <div class="col-lg-6 col-12" id="banner-bestsell2">
                <div class="row">
					<?php
					foreach ($bestcase as $bestcase1):
						?>
                        <div class="col-md-4 col-6">
                            <div id="bestsell">
                                <div class="thumb-bestsell-right">
                                    <img src="/logo/mug1.jpg" class="img-fluid w-100">
                                    <div id="back-hover">
                                        <div class="centerContent">
                                            <button class="btn-quickview"><span>quick view</span>
                                            </button>
                                            <button class="btn-addcart"><span>add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="favourite" data-id="<?= $bestcase1['id'] ?>">
										<?php
										if (in_array($bestcase1['id'], $arrFavourite)) {
											?>
                                            <i class="fas fa-heart" style="color: red"
                                               id="iconfavourite<?= $bestcase1['id'] ?>"></i>
											<?php
										} else {
											?>
                                            <i class="fal fa-heart" id="iconfavourite<?= $bestcase1['id'] ?>"></i>
											<?php
										}
										?>
                                    </div>
                                    <div id="shareproduct"><i class="far fa-share-alt"></i></div>
                                </div>
                                <div id="name-item-mini-right"><a
                                            href="/product/<?= $bestcase1['slug'] ?>"><?= $bestcase1['name'] ?></a>
                                </div>
                                <div id="classify-item-mini-right">Personalized Shirt</div>
                                <div id="price-item-mini-right">
									<?php
									if ($bestcase1['sale'] == 'yes'){
										?>
                                        <span class="pricesale" style="text-decoration-line: line-through;margin-right: 15px;color: rgba(102, 101, 101, 0.78);
">$<?= $bestcase1['price'] ?> USD</span> <span class="price">$<?= $bestcase1['price_sale'] ?> USD</span>
										<?php
									}else{
									?>
                                    <span class="pricesale">$<?= $bestcase1['price'] ?> USD
                        <?php
                        }
                        ?>
                                </div>
								<?php
								if ($bestcase1['status'] == 'new') {
									?>
                                    <div id="ellipse-new-item"><span>NEW</span></div>

									<?php
								} elseif ($bestcase1['status'] == 'sale') {
									?>
                                    <div id="ellipse-sale-item">
                                        <span>-<?= 100 - ($bestcase1['price_sale'] / $bestcase1['price'] * 100) ?>%</span>
                                    </div>
									<?php
								}
								?>

                            </div>
                        </div>
					<?php
					endforeach;
					?>

                </div>

    </section>
	<?php
}
?>


<?php
if ($setting['section2'] == 'on') {
	?>
    <section id="incentives">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="bg-blue" id="div-text">
                    <span><?= $banner['text1'] ?></span>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="bg-orange" id="div-text">
                    <span><?= $banner['text2'] ?></span>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="bg-yellow" id="div-text">
                    <span><?= $banner['text3'] ?></span>
                </div>
            </div>
        </div>
    </section>
	<?php
}
?>



<?php

if ($setting['section3'] == 'on') {
	?>
    <section class="category">
        <div class="row">
            <div class="col-12 center">
                <div class="title-category"><span><?= $setting['section_category1_title'] ?></span></div>
            </div>
            <div class="col-12 d-flex justify-content-center" style="margin-top: 30px">
                <div class="choice-of-type" style="width: 240px">
					<?php
					$i = 0;
					foreach ($sectionCateType1 as $val):
						$i++;
						?>
                        <div class="element-c <?= $i == 1 ? 'active-type' : '' ?>" id="<?= $val['value'] ?>"
                             data-id="<?= $val['id'] ?>"><span><img
                                        src="/download/image?name=<?= $val['icon'] ?>"> <?= $val['value'] ?></span>
                        </div>
					<?php
					endforeach;
					?>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 50px" id="drawsectioncategory1">
			<?php
			$i = 0;
			foreach ($sectionCate1 as $val) {
				$i++;
				?>

                <div class="col">
                    <div class="product-home-category">
                        <div class="thumb-product-home">
                            <img src="/download/image?name=<?= $val['thumbnail'] ?>" class="img-fluid w-100">
                            <div id="back-hover">
                                <div class="centerContent">
                                    <button class="btn-quickview"><span>quick view</span>
                                    </button>
                                    <button class="btn-addcart"><span>add to cart</span>
                                    </button>
                                </div>

                            </div>
                            <div id="favourite" data-id="<?= $val['id'] ?>">
								<?php
								if (in_array($val['id'], $arrFavourite)) {
									?>
                                    <i class="fas fa-heart" style="color: red"
                                       id="iconfavourite<?= $val['id'] ?>"></i>
									<?php
								} else {
									?>
                                    <i class="fal fa-heart" id="iconfavourite<?= $val['id'] ?>"></i>
									<?php
								}
								?>
                            </div>
                            <div id="shareproduct"><i class="far fa-share-alt"></i></div>

                        </div>
                        <div id="name-item-mini-right"><a
                                    href="/product/<?= $val['slug'] ?>"><?= $val['name'] ?></a>
                        </div>
                        <div id="classify-item-mini-right">Personalized Shirt</div>
                        <div id="price-item-mini-right">
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
						<?php
						if ($val['status'] == 'new') {
							?>
                            <div id="ellipse-new-item"><span>NEW</span></div>

							<?php
						} elseif ($val['status'] == 'sale') {
							?>
                            <div id="ellipse-sale-item">
                                <span>-<?= 100 - ($val['price_sale'] / $val['price'] * 100) ?>%</span></div>
							<?php
						}
						?>
                    </div>
                </div>
				<?php
				if ($i == 5) {
					?>
                    <div class="col-12" style="margin-top: 50px"></div>
					<?php
				}
				?>

				<?php
			}
			?>

        </div>
        <div class="row">
            <div class="col-12 text-right" style="margin-top: 20px;">
                <a href="<?= $setting['section_category1_view'] ?>" style="color: rgba(241, 196, 15, 1);">view more <i
                            class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
	<?php
}
?>



<?php
if ($setting['section4'] == 'on') {
	?>
    <section class="cover-img">
        <div class="row">
            <div class="col-12 ">
                <a href="<?= $banner['image3_link'] ?>">
                    <img src="/download/image?name=<?= $banner['image3'] ?>" class="img-fluid">
                </a>
            </div>
        </div>
    </section>
	<?php
}
?>

<?php
if ($setting['section5'] == 'on') {
	?>
    <section class="category">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="title-category"><span><?= $setting['section_category2_title'] ?></span></div>
            </div>

            <div class="col-12 d-flex justify-content-center" style="margin-top: 30px">
                <div class="choice-of-type" style="width: 240px">
					<?php
					$i = 0;
					foreach ($sectionCateType2 as $val):
						$i++;
						?>
                        <div class="element-c <?= $i == 1 ? 'active-type' : '' ?>" id="<?= $val['value'] ?>"
                             data-name="<?= $val['value'] ?>"><span><img
                                        src="/download/image?name=<?= $val['icon'] ?>"> <?= $val['value'] ?></span>
                        </div>
					<?php
					endforeach;
					?>
                </div>
            </div>
        </div>


        <div class="row" style="margin-top: 50px" id="drawsectioncategory2">
			<?php
			$i = 0;
			foreach ($sectionCate2 as $val) {
				$i++;
				?>
                <div class="col">
                    <div class="product-home-category">
                        <div class="thumb-product-home">
                            <img src="/download/image?name=<?= $val['thumbnail'] ?>" class="img-fluid w-100">
                            <div id="back-hover">
                                <div class="centerContent">
                                    <button class="btn-quickview"><span>quick view</span>
                                    </button>
                                    <button class="btn-addcart"><span>add to cart</span>
                                    </button>
                                </div>
                            </div>
                             <div id="favourite" data-id="<?= $val['id'] ?>">
								<?php
								if (in_array($val['id'], $arrFavourite)) {
									?>
                                    <i class="fas fa-heart" style="color: red"
                                       id="iconfavourite<?= $val['id'] ?>"></i>
									<?php
								} else {
									?>
                                    <i class="fal fa-heart" id="iconfavourite<?= $val['id'] ?>"></i>
									<?php
								}
								?>
                            </div>
                            <div id="shareproduct"><i class="far fa-share-alt"></i></div>
                        </div>
                        <div id="name-item-mini-right"><a
                                    href="/product/<?= $val['slug'] ?>"><?= $val['name'] ?></a></div>
                        <div id="classify-item-mini-right">Personalized Shirt</div>
                        <div id="price-item-mini-right">
							<?php
							if ($val['sale'] == 'yes'){
								?>
                                <span class="price-old">$<?= $val['price'] ?> USD</span> <span
                                        class="price">$<?= $val['price_sale'] ?> USD</span>
								<?php
							}else{
							?>
                            <span class="price">$<?= $val['price'] ?> USD
                        <?php
                        }
                        ?>
                        </div>
						<?php
						if ($val['status'] == 'new') {
							?>
                            <div id="ellipse-new-item"><span>NEW</span></div>

							<?php
						} elseif ($val['status'] == 'sale') {
							?>
                            <div id="ellipse-sale-item">
                                <span>-<?= 100 - ($val['price_sale'] / $val['price'] * 100) ?>%</span>
                            </div>
							<?php
						}
						?>
                    </div>
                </div>
				<?php
				if ($i == 5) {
					?>
                    <div class="col-12" style="margin-top: 50px"></div>
					<?php
				}
				?>
				<?php
			}
			?>

        </div>

        <div class="row">
            <div class="col-12 text-right" style="margin-top: 20px;">
                <a href="<?= $setting['section_category2_view'] ?>" style="color: rgba(241, 196, 15, 1);">view more <i
                            class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
	<?php
}
?>


<?php
if ($setting['section6'] == 'on') {
	?>
    <section class="cover-img">
        <div class="row">
            <div class="col-6">
                <div class="div-cover-img">
                    <a href="<?= $banner['image4_link'] ?>">
                        <img src="/download/image?name=<?= $banner['image4'] ?>" class="img-fluid w-100">
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="div-cover-img">
                    <a href="<?= $banner['image5_link'] ?>">
                        <img src="/download/image?name=<?= $banner['image5'] ?>" class="img-fluid w-100">
                    </a>
                </div>
            </div>
        </div>
    </section>
	<?php
}
?>


<?php
if ($setting['section7'] == 'on') {
	?>
    <section class="custom-talk">
        <div class="row">
            <div class="col-12 center">
                <div class="title-category"><span>Don't take our word for it</span></div>
            </div>
        </div>

    </section>
	<?php
}
?>
