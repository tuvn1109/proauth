<?php
echo "<pre>";
print_r($setting);
echo "</pre>";

?>

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
                            </div>
                            <div id="name-item">Fancy - From Crazy World</div>
                            <div id="classify-item">Personalized Shirt</div>
                            <div id="price-item">$34.99 USD</div>
                            <div id="ellipse-item"><span>NEW</span></div>
                        </div>
                    </div>
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
                            </div>
                            <div id="name-item">Fancy - From Crazy World</div>
                            <div id="classify-item">Personalized Shirt</div>
                            <div id="price-item">$34.99 USD</div>
                            <div id="ellipse-item"><span>NEW</span></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="row">
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
                            </div>
                            <div id="name-item-mini-right">Fancy - From Crazy World</div>
                            <div id="classify-item-mini-right">Personalized Shirt</div>
                            <div id="price-item-mini-right">$34.99 USD</div>
                            <div id="ellipse-item"><span>NEW</span></div>

                        </div>
                    </div>
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
                            </div>
                            <div id="name-item-mini-right">Fancy - From Crazy World</div>
                            <div id="classify-item-mini-right">Personalized Shirt</div>
                            <div id="price-item-mini-right">$34.99 USD</div>
                            <div id="ellipse-item"><span>NEW</span></div>

                        </div>
                    </div>
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
                            </div>
                            <div id="name-item-mini-right">Fancy - From Crazy World</div>
                            <div id="classify-item-mini-right">Personalized Shirt</div>
                            <div id="price-item-mini-right">$34.99 USD</div>
                            <div id="ellipse-item"><span>NEW</span></div>

                        </div>
                    </div>


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
                            </div>
                            <div id="name-item-mini-right">Fancy - From Crazy World</div>
                            <div id="classify-item-mini-right">Personalized Shirt</div>
                            <div id="price-item-mini-right">$34.99 USD</div>
                            <div id="ellipse-item"><span>NEW</span></div>

                        </div>
                    </div>
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
                            </div>
                            <div id="name-item-mini-right">Fancy - From Crazy World</div>
                            <div id="classify-item-mini-right">Personalized Shirt</div>
                            <div id="price-item-mini-right">$34.99 USD</div>
                            <div id="ellipse-item"><span>NEW</span></div>

                        </div>
                    </div>
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
                            </div>
                            <div id="name-item-mini-right">Fancy - From Crazy World</div>
                            <div id="classify-item-mini-right">Personalized Shirt</div>
                            <div id="price-item-mini-right">$34.99 USD</div>
                            <div id="ellipse-item"><span>NEW</span></div>

                        </div>
                    </div>


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
echo "<pre>";
print_r($setting);
echo "</pre>";

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
					//	foreach (json_decode($setting['section_category1_type'],true) as $val):
					?>
                    <div class="element-c " id="women" data-name="women"><span><img
                                    src="/logo/girl-logo.png"> Women</span>
                    </div>
                    <div class="element-c active-type" id="men" data-name="men"><span><img
                                    src="/logo/man-logo.png"> Men</span></div>
					<?php
					//	endforeach;
					?>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 50px" id="drawsectioncategory1">
			<?php
			$i = 0;
			foreach ($tshirt as $tshirt1) {
				$i++;
				?>

                <div class="col">
                    <div class="product-home-category">
                        <div class="thumb-product-home">
                            <img src="/download/image?name=<?= $tshirt1['thumbnail'] ?>" class="img-fluid w-100">
                            <div id="back-hover">
                                <div class="centerContent">
                                    <button class="btn-quickview"><span>quick view</span>
                                    </button>
                                    <button class="btn-addcart"><span>add to cart</span>
                                    </button>
                                </div>

                            </div>
                            <div id="favourite"><i class="fal fa-heart"></i></div>
                            <div id="shareproduct"><i class="far fa-share-alt"></i></div>

                        </div>
                        <div id="name-item-mini-right"><a
                                    href="/product/<?= $tshirt1['slug'] ?>"><?= $tshirt1['name'] ?></a>
                        </div>
                        <div id="classify-item-mini-right">Personalized Shirt</div>
                        <div id="price-item-mini-right">
							<?php
							if ($tshirt1['sale'] == 'yes'){
								?>
                                <span class="pricesale" style="text-decoration-line: line-through;margin-right: 15px;color: rgba(102, 101, 101, 0.78);
">$<?= $tshirt1['price'] ?> USD</span> <span class="price">$<?= $tshirt1['price_sale'] ?> USD</span>
								<?php
							}else{
							?>
                            <span class="pricesale">$<?= $tshirt1['price'] ?> USD
                        <?php
                             }
                        ?>
                        </div>
                        	<?php
						if ($tshirt1['status'] == 'new') {
							?>
                            <div id="ellipse-new-item"><span>NEW</span></div>

							<?php
						} elseif ($tshirt1['status'] == 'sale') {
							?>
                            <div id="ellipse-sale-item"><span>-<?= 100-($tshirt1['price_sale']/$tshirt1['price']*100) ?>%</span></div>
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
                    <div class="element-c  active-type" id="mug" data-name="mug"><span><img
                                    src="/logo/mug-logo.png"> Mug</span></div>
                    <div class="element-c" id="case" data-name="case"><span><img src="/logo/phone-logo.png"> Case</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row" style="margin-top: 50px" id="drawsectioncategory2">
			<?php
			$i = 0;
			foreach ($accessories as $accessories1) {
				$i++;
				?>
                <div class="col">
                    <div class="product-home-category">
                        <div class="thumb-product-home">
                            <img src="/download/image?name=<?= $accessories1['thumbnail'] ?>" class="img-fluid w-100">
                            <div id="back-hover">
                                <div class="centerContent">
                                    <button class="btn-quickview"><span>quick view</span>
                                    </button>
                                    <button class="btn-addcart"><span>add to cart</span>
                                    </button>
                                </div>
                            </div>
                            <div id="favourite"><i class="fal fa-heart"></i></div>
                            <div id="shareproduct"><i class="far fa-share-alt"></i></div>
                        </div>
                        <div id="name-item-mini-right"><a
                                    href="/product/<?= $tshirt1['slug'] ?>"><?= $accessories1['name'] ?></a></div>
                        <div id="classify-item-mini-right">Personalized Shirt</div>
                        <div id="price-item-mini-right">
							<?php
							if ($accessories1['sale'] == 'yes'){
								?>
                                <span class="price-old">$<?= $accessories1['price'] ?> USD</span> <span
                                        class="price">$<?= $accessories1['price_sale'] ?> USD</span>
								<?php
							}else{
							?>
                            <span class="price">$<?= $accessories1['price'] ?> USD
                        <?php
                        }
                        ?>
                        </div>
						<?php
						if ($accessories1['status'] == 'new') {
							?>
                            <div id="ellipse-new-item"><span>NEW</span></div>

							<?php
						} elseif ($accessories1['status'] == 'sale') {
							?>
                            <div id="ellipse-sale-item"><span>-<?= 100-($accessories1['price_sale']/$accessories1['price']*100) ?>%</span></div>
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
