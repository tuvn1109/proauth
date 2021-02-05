<script>
    //

    $('.nonloop').owlCarousel({
        center: true,
        rtl: false,
        items: 3,
        loop: true,
        margin: 10,
        nav: true,
    });
    $(function () {


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
    let section3 = $('input[name="section3"]:checked').val();
    let section5 = $('input[name="section5"]:checked').val();


    function getdataSection(draw, type) {
        var favourit = document.cookie;
        var numfav = favourit.search("favourite");
        var numfav2 = favourit.slice(numfav + 10);
        var arrFav = numfav2.split("%2C");
        console.log(arrFav);
        var draw = draw;
        var type = type;
        $.ajax({
            url: "/home/loaddata",
            dataType: "json",
            data: {type: type},
            type: "POST",
            success: function (data) {
                if (draw == 'sectioncategory1') {
                    $('#drawsectioncategory1').empty();
                    var i = 0;
                    $.each(data, function (keys, values) {
                        i += 1;
                        //     var $price = $('<div id="price-item-mini-right"></div>');
                        var checkfav = arrFav.includes(values.id);
                        console.log(checkfav);
                        if (checkfav) {
                            $favourite = ('<i class="fas fa-heart iconfavourite' + values.id + '" style="color: red" id="iconfavourite' + values.id + '"></i>');
                        } else {
                            $favourite = ('<i class="fal fa-heart iconfavourite' + values.id + '" id="iconfavourite' + values.id + '"></i>');
                        }

                        if (values.sale == 'yes') {
                            $price = ('<span class="price-old">$' + values.price + ' USD</span><span class="price">$' + values.price_sale + ' USD</span>');
                        } else {
                            $price = ('<span class="price">$' + values.price + ' USD</span>');
                        }
                        if (values.status == 'new') {
                            $ellipse = ('<div id="ellipse-new-item"><span>NEW</span></div>');
                        } else if (values.status == 'sale') {
                            $ellipse = ('<div id="ellipse-sale-item"><span>-' + (100 - (values.price_sale / values.price * 100)) + '%</span></div>');
                        }
                        var path = values.thumbnail.split(".");
                        var $line = $('<div class="col-cate-2"><div class="product-home-category"><div class="thumb-product-home"><img src="/download/image?name=' + path[0] + '375480.' + path[1] + '" class="img-fluid w-100"><div id="back-hover"><div class="centerContent"><button class="btn-quickview"><span>quick view</span></button><a href="/' + values.slug + '/' + values.slug_pro + '"><button class="btn-addcart"><span>add to cart</span></button></a></div></div><div id="favourite" class="favourite" data-id="' + values.id + '">'+$favourite+'</div><div id="shareproduct" class="dropdown btnShare" data-id="' + values.id + '" data-url="/' + values.slug + '/' + values.slug_pro + '"><i class="far fa-share-alt" id="dropdownMenuButton' + values.id + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i><div class="dropdown-menu shareBlock' + values.id + '" id="shareBlock' + values.id + '" aria-labelledby="dropdownMenuButton' + values.id + '"></div></div></div><div id="name-item-mini-right"><a href="/' + values.slug + '/' + values.slug_pro + '">' + values.name + '</a></div><div id="classify-item-mini-right">Personalized Shirt</div><div id="price-item-mini-right">' + $price + '</div>' + $ellipse + '</div></div>');

                        //$product.append($line);
                        //   $product.append($price);


                        //$col.append($product);
                        $('#drawsectioncategory1').append($line);
                        if (i == 5) {
                            //   $('#drawsectioncategory1').append('<div class="col-12" style="margin-top: 50px"></div>');
                        }
                    });
                }
                if (draw == 'sectioncategory2') {
                    $('#drawsectioncategory2').empty();
                    var i = 0;
                    $.each(data, function (keys, values) {
                        i += 1;
                        var checkfav = arrFav.includes(values.id);
                        if (checkfav) {
                            $favourite = ('<i class="fas fa-heart" style="color: red" id="iconfavourite' + values.id + '"></i>');
                        } else {
                            $favourite = ('<i class="fal fa-heart" id="iconfavourite' + values.id + '"></i>');
                        }

                        var path = values.thumbnail.split(".");
                        var $col = $('<div class="col-cate-2 col-xs-4"></div>');
                        var $product = $('<div class="product-home-category"></div>');
                        var $line = $('<div class="thumb-product-home"><img src="/download/image?name=' + path[0] + '375480.' + path[1] + '" class="img-fluid w-100"><div id="back-hover"><div class="centerContent"><button class="btn-quickview"><span>quick view</span></button><a href="/' + values.slug + '/' + values.slug_pro + '"><button class="btn-addcart"><span>add to cart</span></button></a></div></div><div id="favourite" class="favourite" data-id="' + values.id + '">' + $favourite + '</div><div id="shareproduct" class="dropdown btnShare" data-id="' + values.id + '" data-url="/' + values.slug + '/' + values.slug_pro + '"><i class="far fa-share-alt" id="dropdownMenuButton' + values.id + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i><div class="dropdown-menu shareBlock' + values.id + '" id="shareBlock' + values.id + '" aria-labelledby="dropdownMenuButton' + values.id + '"></div></div></div><div id="name-item-mini-right"><a href="/' + values.slug + '/' + values.slug_pro + '">' + values.name + '</a></div><div id="classify-item-mini-right">Personalized Shirt</div>');

                        var $price = $('<div id="price-item-mini-right"></div>');
                        if (values.sale == 'yes') {
                            $price.append('<span class="price-old">$' + values.price + ' USD</span><span class="price">$' + values.price_sale + ' USD</span>');
                        } else {
                            $price.append('<span class="price">$' + values.price + ' USD</span></div></div>');
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
                            //  $('#drawsectioncategory2').append('<div class="col-12" style="margin-top: 50px"></div>');
                        }

                    });
                }

            },
            error: function () {
            }
        });
    }

    getdataSection('sectioncategory1', section3);
    getdataSection('sectioncategory2', section5);
    $('.element-c').click(function () {
        var type = $(this).data('id');
        var draw = $(this).data('draw');
        if (draw == 'sectioncategory1') {
            $('#sectioncategory1 .element-c').removeClass("active-type");
        }
        if (draw == 'sectioncategory2') {
            $('#sectioncategory2 .element-c').removeClass("active-type");
        }
        $('#section' + type).prop("checked", true);
        $(this).addClass('active-type');
        getdataSection(draw, type);
    });


</script>