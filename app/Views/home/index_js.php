<script>
    $('.element-c').click(function () {
        var name = $(this).data('name');
        if (name == 'women') {
            $('#men').removeClass("active-type");
        } else if (name == 'men') {
            $('#women').removeClass("active-type");
        } else if (name == 'mug') {
            $('#case').removeClass("active-type");
        } else if (name == 'case') {
            $('#mug').removeClass("active-type");
        }
        $(this).addClass('active-type');
        var type = name;
        $.ajax({
            url: "/home/loaddata",
            dataType: "json",
            data: {type: type},
            type: "POST",
            success: function (data) {
                if (type == 'women' || type == 'men') {
                    $('#drawsectioncategory1').empty();
                    var i = 0;
                    $.each(data, function (keys, values) {
                        i += 1;
                        var $col = $('<div class="col"></div>');
                        var $product = $('<div class="product-home-category"></div>');
                        var $line = $('<div class="thumb-product-home"><img src="/download/image?name=' + values.thumbnail + ' " class="img-fluid w-100"><div id="back-hover"><div class="centerContent"><button class="btn-quickview"><span>quick view</span></button><button class="btn-addcart"><span>add to cart</span></button></div></div><div id="favourite"><i class="fal fa-heart"></i></div><div id="shareproduct"><i class="far fa-share-alt"></i></div></div><div id="name-item-mini-right"><a href="/product/' + values.slug + '">' + values.name + '</a></div><div id="classify-item-mini-right">Personalized Shirt</div>');
                        var $price = $('<div id="price-item-mini-right"></div>');
                        if (values.sale == 'yes') {
                            $price.append('<span class="price-old">$' + values.price + ' USD</span><span class="price">$' + values.price_sale + ' USD</span>');
                        } else {
                            $price.append('<span class="price">$' + values.price + ' USD</span></div></div>');
                            console.log('no')
                        }
                        $product.append($line);
                        $product.append($price);

                        if (values.status == 'new') {
                            $product.append('<div id="ellipse-new-item"><span>NEW</span>');
                        } else if (values.status == 'sale') {
                            $product.append('<div id="ellipse-sale-item"><span>-' + (100 - (values.price_sale / values.price * 100)) + '%</span>');
                        }
                        $col.append($product);
                        $('#drawsectioncategory1').append($col);
                        if (i == 5) {
                            $('#drawsectioncategory1').append('<div class="col-12" style="margin-top: 50px"></div>');
                        }
                    });
                }
                if (type == 'mug' || type == 'case') {
                    $('#drawsectioncategory2').empty();
                    var i = 0;
                    $.each(data, function (keys, values) {
                        i += 1;
                        var $col = $('<div class="col"></div>');
                        var $product = $('<div class="product-home-category"></div>');
                        var $line = $('<div class="thumb-product-home"><img src="/download/image?name=' + values.thumbnail + ' " class="img-fluid w-100"><div id="back-hover"><div class="centerContent"><button class="btn-quickview"><span>quick view</span></button><button class="btn-addcart"><span>add to cart</span></button></div></div><div id="favourite"><i class="fal fa-heart"></i></div><div id="shareproduct"><i class="far fa-share-alt"></i></div></div><div id="name-item-mini-right"><a href="/product/' + values.slug + '">' + values.name + '</a></div><div id="classify-item-mini-right">Personalized Shirt</div>');
                        var $price = $('<div id="price-item-mini-right"></div>');
                        if (values.sale == 'yes') {
                            $price.append('<span class="price-old">$' + values.price + ' USD</span><span class="price">$' + values.price_sale + ' USD</span>');
                        } else {
                            $price.append('<span class="price">$' + values.price + ' USD</span></div></div>');
                            console.log('no')
                        }
                        $product.append($line);
                        $product.append($price);

                        if (values.status == 'new') {
                            $product.append('<div id="ellipse-new-item"><span>NEW</span>');
                        } else if (values.status == 'sale') {
                            $product.append('<div id="ellipse-sale-item"><span>-' + (100 - (values.price_sale / values.price * 100)) + '%</span>');
                        }
                        $col.append($product);
                        $('#drawsectioncategory2').append($col);
                        if (i == 5) {
                            $('#drawsectioncategory2').append('<div class="col-12" style="margin-top: 50px"></div>');
                        }

                    });
                }

            },
            error: function () {
            }
        });
    });


</script>