<script>

    var star = 0;
    $('#quantity-order').TouchSpin();
    $('.starrr').starrr({
        max: 5,
        change: function (e, value) {
            star = value;
        }
    });


    function pad(d) {
        return (d < 10) ? '0' + d.toString() : d.toString();
    }


    //
    $('.btn-review').click(function () {
        var content = $('#contentReview').val();
        if (star <= 0) {
            toastr.error('Please choose a star rating', 'Error');
            return;
        }
        if (content == '' || content == null) {
            toastr.error('Evaluation content cannot be empty', 'Error');
            return;
        }
        var id = $(this).data('id');
        $.ajax({
            url: "/category/addreview",
            dataType: "json",
            data: {id: id, content: content, star: star},
            type: "POST",
            success: function (data) {
                if (data.stt == true) {
                    $('#contentReview').val('');
                    toastr.success(data.msg, 'Success');
                    var starhtml = ('');
                    for (var i = 1; i <= star; i++) {
                        starhtml += '<i class="fas fa-star"></i>';
                    }
                    var $element = $('<div class="col-12 mb-1"><div class="div-review"><div class="review_name">' + data.data.name + '</div><div class="review_meta d-flex"><div class="review_star"><div class="star-feelback">' + starhtml + '</div></div><div class="review_date ml-1"></div></div><div class="review_content">' + content + '</div></div></div>');
                    $('#divreview').prepend($element);
                } else {
                    toastr.error(data.msg, 'Error');


                }
            },
            error: function () {
            }
        });


    });


    // Set the date we're counting down to
    var date_end_fl = $('#date_end_flash').val();
    if (date_end_fl) {
        var countDownDate = new Date(date_end_fl + " 00:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = pad(days) + " : " + pad(hours) + " : "
                + pad(minutes) + " : " + pad(seconds);

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    }
    var test = $('#front-de').data('parameters');

    $('.div-favourite-order').click(function () {
        // toastr.error('Please choose size', 'Error');
        $('#iconfavourite' + $(this).data('id')).toggleClass('fal fas');
        $('#iconfavourite' + $(this).data('id')).css("color", "red");
        $.ajax({
            url: "/home/favourite",
            dataType: "html",
            data: {id: $(this).data('id')},
            type: "POST",
            success: function (data) {
                $('#iconfavourite' + $(this).data('id')).toggleClass('fal fas');
                $('#iconfavourite' + $(this).data('id')).css("color", "red");
                $('.favourite-num span').html(data);
            },
            error: function () {
            }
        });
    });

    // OWL
    var $owl = $(".owl-carousel").owlCarousel({
        nav: true,
        loop: true,
        items: 1,
        margin: 0,
        stagePadding: 0,
        autoplay: false,
        navClass: ['btn-up', 'btn-down'],
        navContainerClass: ['owl-nav-pro'],
    });

    $(document).ready(function () {


        $owl.trigger('refresh.owl.carousel');
        dotcount = 1;
        $('.owl-dot').each(function () {
            $(this).addClass('dotnumber' + dotcount);
            $(this).attr('data-info', dotcount);
            dotcount = dotcount + 1;
        });

        slidecount = 1;

        $('.owl-item').not('.cloned').each(function () {
            $(this).addClass('slidenumber' + slidecount);
            slidecount = slidecount + 1;
        });

        $('.owl-dot').each(function () {
            grab = $(this).data('info');
            slidegrab = $('.slidenumber' + grab + ' img').attr('src');
            $(this).css("background-image", "url(" + slidegrab + ")");
        });

        amount = $('.owl-dot').length;
        gotowidth = 100 / 5;
        $('.owl-dot').css("height", gotowidth + "%");
        $('.owl-dot').css("outline", "none");

    });
    $(".btn-up").html("<img src='/logo/arrowup.png'>");
    $(".owl-nav .owl-next span").html("<img src='/logo/arrowup.png' >");


    $('.owl-item').on('click', function (event) {
        var $this = $(this);
        if ($this.hasClass('clicked')) {
            $this.removeClass('clicked');
        } else {
            $('#c1').find(".clicked").removeClass('clicked');
            $this.addClass('clicked');
        }
    });


    // END OWL
    let pluginOpts = {
        templatesDirectory: '/assets/plugins/fancy/html/',
        toolbarPlacement: 'inside-top',
        uiTheme: 'doyle',
        modalMode: '#modalButton',
        fonts: [
            {name: 'Helvetica'},
            {name: 'Times New Roman'},
            {name: 'Pacifico', url: 'Enter_URL_To_Pacifico'},
            {name: 'Arial'},
            {name: 'Lobster', url: 'google'}
        ],
        customTextParameters: {
            autoCenter: true,
            autoSelect: true,
        },
        elementParameters: {
            colors: false,
            removable: true,
            resizable: true,
            draggable: true,
            rotatable: true,
            autoCenter: true,
            boundingBox: "Base"
        },
        customImageParameters: {
            draggable: true,
            removable: true,
            resizable: true,
            rotatable: true,
            autoCenter: true,
            boundingBox: "Base"
        },
        imageParameters: {
            resizeToH: 70,
            resizeToW: 70,
        },
        actions: {
            'top': ['download'],
            'right': [],
            'bottom': ['undo', 'redo'],
            'left': []
        }
    };
    let arrPro = [];
    let size = $('input[name="size"]:checked').val();
    let color = $('input[name="color"]:checked').val();
    $('#add-to-card').click(function () {
        var id = $(this).data('id');
        var quantity = $('#quantity-order').val();
        if (quantity <= 0) {
            toastr.error('Quantity min 1', 'Error');
            return;
        }
        if (size == null) {
            toastr.error('Please choose size', 'Error');
            return;
        }
        if (color == null) {
            toastr.error('Please choose color', 'Error');
            return;
        }
        yourDesigner.getViewsDataURL(function (dataURL) {
            // $.post("php/save_image.php", {base64_image: dataURL});
            $.ajax({
                url: "/cart/addcart",
                dataType: "json",
                data: {front: dataURL[0], back: dataURL[1], id: id, size: size, color: color, quantity: quantity},
                type: "POST",
                success: function (data) {
                    $('.cart-text a').html('Cart: ' + data);
                    toastr.success('Add to cart successfully', 'Success');
                },
                error: function () {
                    toastr.error('Unspecified error, please try again', 'Error');
                }
            });

        });
    });
    $(document).on('click', '.fpd-done', function () {
        yourDesigner.getViewsDataURL(function (dataURL) {
            //  front: dataURL[0], back: dataURL[1]
            $('#div-preview').css("display", "block");
            $('#previewfront').attr("src", dataURL[0]);
            $('#previewback').attr("src", dataURL[1]);
        });
    });

    $('.size').click(function () {
        var id = $(this).data('id');
        $("#size" + id).prop("checked", true);
        size = id;
        $(".size").removeClass("active-size");
        $(this).addClass("active-size");
    });
    $('.item-color').click(function () {
        var id = $(this).data('id');
        var idcolor = $(this).data('idcolor');
        var idpro = $(this).data('idpro');
        $("#color" + idcolor).prop("checked", true);
        $(".checkcl").css("display", "none");
        $("#checkcl" + idcolor).css("display", "");
        $.ajax({
            url: "/category/colorlayout",
            dataType: "json",
            data: {id: id, idcolor: idcolor, idpro: idpro},
            type: "POST",
            success: function (data) {
                $('#div-preview').css("display", "none");

                $('#c1').html('');
                $owlhtml = $('<div class="owl-carousel"></div>');
                $.each(data.imageShow, function (key, value) {
                    $owlhtml.append('<div class="item"><img src="/download/image?name=product/' + idpro + '/image/' + idcolor + '/' + value + '" class="img-fluid"></div>');
                });
                $('#c1').html($owlhtml);
                $owl = $(".owl-carousel").owlCarousel({
                    nav: true,
                    loop: true,
                    items: 1,
                    margin: 0,
                    stagePadding: 0,
                    autoplay: false,
                    navClass: ['btn-up', 'btn-down'],
                    navContainerClass: ['owl-nav-pro'],
                });

                dotcount = 1;
                $('.owl-dot').each(function () {
                    $(this).addClass('dotnumber' + dotcount);
                    $(this).attr('data-info', dotcount);
                    dotcount = dotcount + 1;
                });

                slidecount = 1;

                $('.owl-item').not('.cloned').each(function () {
                    $(this).addClass('slidenumber' + slidecount);
                    slidecount = slidecount + 1;
                });

                $('.owl-dot').each(function () {
                    grab = $(this).data('info');
                    slidegrab = $('.slidenumber' + grab + ' img').attr('src');
                    $(this).css("background-image", "url(" + slidegrab + ")");
                });

                amount = $('.owl-dot').length;
                gotowidth = 100 / 5;
                $('.owl-dot').css("height", gotowidth + "%");
                $('.owl-dot').css("outline", "none");


                var front = '/download/' + data.layout;
                var back = '/download/' + data.back;
                $('#front-de').attr("src", '/download/' + data.layout);
                $('#data-thumb-front').data("thumbnail", '/download/' + data.layout);
                $('#back-de').attr("src", '/download/' + data.back);
                $('#data-thumb-back').data("thumbnail", '/download/' + data.back);
                //yourDesigner.addCustomImage('/download/' + data.layout, 'tt', []);
                //   yourDesigner.addProduct({title: 'TESST',thumbnail: front}, '');

                //  yourDesigner.addView([{title: 'TESST'}, {thumbnail: 'https://ejoy-english.com/blog/wp-content/uploads/2018/05/tie%CC%82%CC%81ng-anh-u%CC%81c-.jpg'}]);
                $('#divdesgin').html('');
                var parame = {
                    "left": 450,
                    "top": 300,
                    "width": 300,
                    "height": 400,
                    "colors": "#d59211",
                    "price": 20,
                    "colorLinkGroup": "Base",
                };

                var parString = JSON.stringify(parame);


                $clothing = $('<div id="clothing-designer" class="fpd-container fpd-shadow-2 fpd-topbar fpd-tabs fpd-tabs-side fpd-top-actions-centered fpd-bottom-actions-centered fpd-views-inside-left"></div>');
                $clothing.append('<div class="fpd-product" title="Shirt Front" id="data-thumb-front" data-thumbnail="' + front + '" > <img src="' + front + '" id="front-de" title="Base" data-parameters=' + parString + ' /><div class="fpd-product" title="Shirt Back" id="data-thumb-back" data-thumbnail="' + back + '"> <img src="' + back + '" id="back-de" title="Base" data-parameters=' + parString + '  /></div></div>');
                $fpddesign = $('<div class="fpd-design"></div>');


                $.each(data.cateImage, function (key, value) {
                    $dd = $('<div class="fpd-category" title="' + key + '"></div>');
                    $.each(value, function (keyc, valuec) {
                        $dd.append('<img src="/images-pro/' + key + '/' + valuec + '" title="' + valuec + '" />')
                    });
                    $fpddesign.append($dd);
                });

                $clothing.append($fpddesign);
                $('#divdesgin').html($clothing);


                yourDesigner = new FancyProductDesigner($('#clothing-designer'), pluginOpts);
                $('.fpd-modal-wrapper').append('<div class="btn-cancel" id="btn-canel-modal" data-defaulttext="Cancel">Cancel</div>');


            },
            error: function () {
            }
        });


    });

    $(".divlayout").click(function () {
        $('.divlayout').removeClass("active-lay");
        let img = $(this).data("img");
        $(this).addClass('active-lay');
        canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
            // Needed to position backgroundImage at 0/0
            originX: 'left',
            originY: 'top'
        });
    });


    var yourDesigner1 = null;
    jQuery(document).ready(function () {

        yourDesigner = new FancyProductDesigner($('#clothing-designer'), pluginOpts);

        console.log(yourDesigner)
        //print button
        $('#print-button').click(function () {
            yourDesigner.print();
            return false;
        });

        //create an image
        $('#btn-prevew').click(function () {
            var image = yourDesigner.createImage(1);
            return false;
        });

        //checkout button with getProduct()
        $('#checkout-button').click(function () {
            var product = yourDesigner.getProduct();
            console.log(product);
            return false;
        });

        //save image on webserver
        $('#save-image-php').click(function () {

            yourDesigner.getProductDataURL(function (dataURL) {
                $.post("php/save_image.php", {base64_image: dataURL});
            });

        });

        //send image via mail
        $('#send-image-mail-php').click(function () {

            yourDesigner.getProductDataURL(function (dataURL) {
                $.post("php/send_image_via_mail.php", {base64_image: dataURL});
            });

        });

    });


    $(function () {
        $('.fpd-modal-wrapper').append('<div class="btn-cancel" id="btn-canel-modal" data-defaulttext="Cancel">Cancel</div>');

    });
    $(document).on('click', '#btn-canel-modal', function () {
        $('.fpd-icon-close').click();
    });


</script>
