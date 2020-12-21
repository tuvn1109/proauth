<section class="main-body">
    <div class="row">
        <div class="col-6 d-flex justify-content-start">
            <div class="title-body"><span><?= $infoCate['value'] ?></span></div>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <div class="choice-of-type" style="width: 240px">
                <div class="element-c  active-type"><span><img src="/logo/girl-logo.png"> Women</span></div>
                <div class="element-c"><span><img src="/logo/man-logo.png"> Men</span></div>
            </div>
            <div class="choice-of-type" style="margin-left: 30px">
                <div class="element-c"><span><img src="/logo/sort-logo.png"> Sort</span></div>
            </div>

        </div>
    </div>
</section>


<section class="cover-img">
    <div class="row">
        <div class="col-6">
            <div class="div-cover-img">
                <img src="/logo/cover-image3.GIF" class="img-fluid w-100">
            </div>
        </div>
        <div class="col-6">
            <div class="div-cover-img">
                <img src="/logo/cover-image3.GIF" class="img-fluid w-100">
            </div>
        </div>
    </div>
</section>

<section class="category">

    <div class="row" style="margin-top: 50px">
		<?php
		$i = 0;
		$i2 = 0;
		foreach ($listCate as $val) {
			$i++;
			$i2++;

			?>
            <div class="col">
                <div class="item-category">
                    <div class="item-category-thumb">
                        <img src="/logo/tshirt1.png" class="img-fluid w-100">
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
                    <div id="name-item-mini-right"><a href="/<?= $val['slug'] ?>"><?= $val['name'] ?></a></div>
                    <div id="classify-item-mini-right">Personalized Shirt</div>
                    <div id="price-item-mini-right">    <?php
						if ($val['sale'] == 'yes') {
							?>
                            <span class="pricesale" style="text-decoration-line: line-through;margin-right: 15px;color: rgba(102, 101, 101, 0.78);
">$<?= $val['price'] ?> USD</span> <span class="price">$<?= $val['price_sale'] ?> USD</span>
							<?php
						} else {
							?>
                            <span class="pricesale">$<?= $val['price'] ?> USD
							<?php
						}
						?></div>
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
                <div class="col-12" style="margin-bottom: 50px"></div>
				<?php
			} ?>
			<?php
			if ($i2 == 10) {
				?>
                <div class="col-12" style="margin-bottom: 50px">
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
                </div>
				<?php
			} ?>

			<?php

		}
		?>

    </div>

</section>

<section class="pagintion">
    <div class="row">
        <div class="col"></div>
        <div class="col-10">
            <hr>
        </div>
        <div class="col"></div>
    </div>

    <div class="number_pagin d-flex justify-content-center">
		<?php
		for ($i = 1; $i <= ceil($countListCate / 20); $i++) {
			?>
            <div id="page" data-id="<?= $i ?>"><?= $i ?></div>
			<?php
		}
		?>
		<?php
		if ($i > 1) {
			?>
            <div id="number">next</div>
			<?php
		}
		?>
    </div>
</section>