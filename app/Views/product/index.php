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
<?php

var_dump($image)

?>
<section id="main-product">
    <div class="row ">
        <div class="col-md-6 col-12 d-flex  justify-content-center">
            <div class="content-carousel" id="c1">
                <div class="owl-carousel">
                    <?php

foreach($image as $image1):
?>
                    <div class="item"><img src="/download/image?name=product/<?=$info['id']?>/image/<?=$image1?>" class="img-fluid"></div>
                    <?php
endforeach;
                    ?>
                </div>
            </div>

        </div>
        <div class="col-md-6 col-12 d-flex justify-content-center">
            <div class="row">
                <div class="col-12">
                    <div class="link-pro">Home > T-shirt</div>
                </div>
                <div class="col-12">
                    <div class="title-pro"><span><?= $info['name'] ?></span></div>
                </div>
                <div class="col-12">
                    <div class="price-pro">
                        <p>$<?= $info['price'] ?> USD</p>
                    </div>

                </div>
                <div class="col-12">
                    <div class="sale-timeout-pro"><img
                            src="https://s3-alpha-sig.figma.com/img/749b/abcf/e19afa554519859ce55ab2a65fd84809?Expires=1607299200&Signature=F39Ozy6bkYKW9NRk8BfbFd4CUf1Aa9AZz0zLamcQFSEBT8Z6JbqhMBxbM3iNwri86bRIJ1DKlxlEqQ91zsgoJLAw40gTGbf7KLWj~FZ8YjQ5GIO-vaunfaHec1z50b8944TXD9Uz2Xqb0Me9DqTqHrsTG1iPCuB1Df3FBPiciAcF8g2o~7oQGS~pgj2jWYXrZX1vEhykDtFsY6b7rJzwy05p5DvXQKAK26M067LICAnP9kq~b5Wlt-T3wy128FMLZ2kzEUfY0pMnMVp2gjskdfKV7CtZbaSHgQ-lCLdtqWNoJ0XF1pIZcQTjmpySd7pv6lg5oQL8~i2vP3j8UZlYBA__&Key-Pair-Id=APKAINTVSUGEWH5XD5UA">
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

                $t  = explode(',',$info['tag']);

                ?>
                <div class="col-12  d-flex">
                    <div><img src="/logo/tag-logo.png" style="height: 14.374929428100586px;width: 14.37868881225586px;">
                    </div>
                    <div class="tag d-flex">
                        <?php
                        foreach($t as $t1):
                    ?>
                        <div class="tag-text">#<?=$t1?></div>
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
                        <div class="div-choose-type">
                            <div class="col-12 title-type-pro"><span>Choose a product type</span></div>
                            <div class="col-12 list-type-pro">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="item">
                                            <div class="thumb"><img src="/logo/tshirt-type.jpg" class="img-fluid"></div>
                                            <div class="title d-flex justify-content-center">xxxx</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="item">
                                            <div class="thumb"><img src="/logo/tshirt-type.jpg" class="img-fluid"></div>
                                            <div class="title d-flex justify-content-center">xxxx</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="item ">
                                            <div class="thumb"><img src="/logo/tshirt-type.jpg" class="img-fluid"></div>
                                            <div class="title d-flex justify-content-center">xxxx</div>
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
                                foreach($color as $color1):
                                    ?>
                                    <div class="col-1 ">
                                        <div class="item-color cl-white" style="background-color: <?=$color1['code']?>">
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
                                        foreach($size as $size1):
                                    ?>
                                        <div class="size"><span><?=$size1['value']?></span></div>
                                        <?php
                                        endforeach;
                                    ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="div-preview">
                            <div class="col-12 d-flex justify-content-center">
                                <button type="button" id="btn-prevew"><span>PREVIEW</span></button>
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


                    <div id="div-addcart"></div>


                </div>
            </div>
        </div>
    </div>
</section>