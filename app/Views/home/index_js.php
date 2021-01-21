<script>

    $(function () {
        $(document).on('click', '.favourite', function () {
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: "/home/favourite",
                dataType: "html",
                data: {id: id},
                type: "POST",
                success: function (data) {
                    $('#iconfavourite' + id).toggleClass('fal fas');
                    $('#iconfavourite' + id).css("color", "red");
                    $('.favourite-num span').html(data);
                },
                error: function () {
                }
            });

        });

        $('.favourite2222').click(function () {
            var id = $(this).data('id');
            var type = $(this).data('type');
            console.log(id);

            if (type == '0') {
                $(this).data('type', 1);
                console.log(0);
            }
            if (type == '1') {
                $(this).data('type', 0);
                console.log(1);
            }
            $.ajax({
                url: "/home/favourite",
                dataType: "html",
                data: {id: id},
                type: "POST",
                success: function (data) {
                    $('#iconfavourite' + id).toggleClass('fal fas');
                    $('#iconfavourite' + id).css("color", "red");
                },
                error: function () {
                }
            });

        });


        $('.btn-addcart').click(function () {
            var id = $(this).data('id');
            $.ajax({
                url: "/home/addcart",
                dataType: "html",
                data: {id: id},
                type: "POST",
                success: function (data) {
                },
                error: function () {
                }
            });

        });
    });

    $('.element-c').click(function () {
        var idtype = $(this).data('id');
        var draw = $(this).data('draw');
        if (draw == 'sectioncategory1') {
            $('#sectioncategory1 .element-c').removeClass("active-type");
        }
        if (draw == 'sectioncategory2') {
            $('#sectioncategory2 .element-c').removeClass("active-type");
        }
        $(this).addClass('active-type');
        $.ajax({
            url: "/home/loaddata",
            dataType: "json",
            data: {type: idtype},
            type: "POST",
            success: function (data) {
                if (draw == 'sectioncategory1') {
                    $('#drawsectioncategory1').empty();
                    var i = 0;
                    $.each(data, function (keys, values) {
                        i += 1;
                        var path = values.thumbnail.split(".");
                        var $col = $('<div class="col-cate-2"></div>');
                        var $product = $('<div class="product-home-category"></div>');
                        var $line = $('<div class="thumb-product-home"><img src="/download/image?name=' + path[0] + '375480.' + path[1] + '" class="img-fluid w-100"><div id="back-hover"><div class="centerContent"><button class="btn-quickview"><span>quick view</span></button><button class="btn-addcart"><span>add to cart</span></button></div></div><div id="favourite" class="favourite" data-id="' + values.id + '"><i class="fal fa-heart" id="iconfavourite' + values.id + '"></i></div><div id="shareproduct"><i class="far fa-share-alt"></i></div></div><div id="name-item-mini-right"><a href="/product/' + values.slug + '">' + values.name + '</a></div><div id="classify-item-mini-right">Personalized Shirt</div>');
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
                if (draw == 'sectioncategory2') {
                    $('#drawsectioncategory2').empty();
                    var i = 0;
                    $.each(data, function (keys, values) {
                        i += 1;
                        var path = values.thumbnail.split(".");
                        var $col = $('<div class="col-cate-2"></div>');
                        var $product = $('<div class="product-home-category"></div>');
                        var $line = $('<div class="thumb-product-home"><img src="/download/image?name=' + path[0] + '375480.' + path[1] + '" class="img-fluid w-100"><div id="back-hover"><div class="centerContent"><button class="btn-quickview"><span>quick view</span></button><button class="btn-addcart"><span>add to cart</span></button></div></div><div id="favourite" class="favourite" data-id="' + values.id + '"><i class="fal fa-heart" id="iconfavourite' + values.id + '"></i></div><div id="shareproduct"><i class="far fa-share-alt"></i></div></div><div id="name-item-mini-right"><a href="/product/' + values.slug + '">' + values.name + '</a></div><div id="classify-item-mini-right">Personalized Shirt</div>');
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