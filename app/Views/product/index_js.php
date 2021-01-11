<script>

    var test = $('#front-de').data('parameters');
    console.log(test);

    $('#testdraw').click(function () {
        console.log('tbao');

        toastr.error('Please choose size', 'Error');
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
    let size = null;
    let color = null;
    $('#add-to-card').click(function () {
        var id = $(this).data('id');
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
                url: "/cart/index",
                dataType: "json",
                data: {front: dataURL[0], back: dataURL[1], id: id, size: size, color: color},
                type: "POST",
                success: function (data) {
                    if (data.stt == true) {
                        toastr.success('Add to cart successfully', 'Success');
                    } else {
                        toastr.error('Unspecified error, please try again', 'Error');
                    }
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
        size = $(this).data('id');
        $(".size").removeClass("active-size");
        $(this).addClass("active-size");
    });
    $('.item-color').click(function () {
        var id = $(this).data('id');
        var idcolor = $(this).data('idcolor');
        var idpro = $(this).data('idpro');
        $(".checkcl").css("display", "none");
        $("#checkcl" + idcolor).css("display", "");
        color = idcolor;
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
        $('.fpd-modal-overlay').css('display', 'none');
    });


</script>
