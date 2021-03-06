<style>

</style>

<section class="main-body">
    <div class="row">
        <div class="col-12 d-flex justify-content-start">
            <div class="title-body"><span><?= $infoCate['value'] ?></span></div>
        </div>

        <div class="col-6 " style="display: none">
			<?php

			if (isset($sort) and count($sort) > 0) {
				?>
                <div class="choice-of-type" style="width: 240px">

					<?php
					$i = 0;
					foreach ($sort as $sort1):
						$i++;
						?>
                        <div class="element-c <?= $i == 1 ? 'active-type' : '' ?>" data-id=" <?= $sort1['id'] ?>"><span><img
                                        src="/download/image?name=<?= $sort1['icon'] ?>"> <?= $sort1['value'] ?></span>
                        </div>
					<?php
					endforeach;
					?>
                </div>
				<?php
			}
			?>
            <!--  <div class="choice-of-type" style="margin-left: 30px">
				  <div class="element-c"><span><img src="/logo/sort-logo.png"> Sort</span></div>
			  </div>-->
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
			$getSize = explode('.', $val['thumbnail']);
			$path = $getSize[0] . '375480.' . $getSize[1];
			?>
            <div class="col-cate-2 col-xs-6 col-md-4">
                <div class="item-category">
                    <div class="item-category-thumb">
                        <img src="/download/image?name=<?= $path ?>" class="img-fluid w-100">
                        <div id="back-hover">
                            <div class="centerContent">
                                <button class="btn-quickview"><span>quick view</span>
                                </button>
                                <a href="/<?= $val['slug'] ?>/<?= $val['slug_pro'] ?>">
                                <button class="btn-addcart"><span>add to cart</span>
                                </button></a>
                            </div>

                        </div>
                        <div id="favourite" class="favourite" data-id="<?= $val['id'] ?>">
							<?php
							if (in_array($val['id'], $arrFavourite)) {
								?>
                                <i class="fas fa-heart iconfavourite<?= $val['id'] ?>" style="color: red"
                                   id="iconfavourite<?= $val['id'] ?>"></i>
								<?php
							} else {
								?>
                                <i class="fal fa-heart iconfavourite<?= $val['id'] ?>" id="iconfavourite<?= $val['id'] ?>"></i>
								<?php
							}
							?>
                        </div>
                        <div id="shareproduct" class="dropdown btnShare"
                             data-id="<?= $val['id'] ?>"
                             data-url="/<?= $val['slug'] ?>/<?= $val['slug_pro'] ?>"><i
                                    class="far fa-share-alt"
                                    id="dropdownMenuButton<?= $val['id'] ?>"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"></i>
                            <div class="dropdown-menu" id="shareBlock<?= $val['id'] ?>"
                                 aria-labelledby="dropdownMenuButton<?= $val['id'] ?>">
                            </div>
                        </div>
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
            <div id="page" class="page-cate"
                 data-id="<?= $i ?>" <?= $i == $pagenow ? 'style="cursor:no-drop" disabled' : '' ?>><a
                        href="?page=<?= $i ?>"><?= $i ?></a></div>
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