<section class="main-body">
    <div class="row">
        <div class="col-12 d-flex justify-content-start">
            <div class="title-body"><span>Favourite</span></div>
        </div>
    </div>
    <div class="row mt-3">
		<?php
		$i = 0;
		$i2 = 0;
		foreach ($list as $val) {
			$i++;
			$i2++;
			?>
            <div class="col-cate-2">
                <div class="item-category">
                    <div class="item-category-thumb">
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
                                href="/<?= $val['slug'] ?>/<?= $val['slug_pro'] ?>"><?= $val['name'] ?></a></div>
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
				$i = 0;
			} ?>


			<?php

		}
		?>

    </div>

</section>
