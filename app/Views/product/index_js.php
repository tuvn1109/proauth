<script>

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

    $('.item-color').click(function () {
        var id = $(this).data('id');
        $.ajax({
            url: "/category/colorlayout",
            dataType: "json",
            data: {id: id},
            type: "POST",
            success: function (data) {
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
                var parame = '{"left": 400, "top": 300, "width":300,"height":400, "colors": "#d59211", "price": 20, "colorLinkGroup": "Base"}';
                //   data-parameters=' + "'" + parame + "'" + '


                $clothing = $('<div id="clothing-designer" class="fpd-container fpd-shadow-2 fpd-topbar fpd-tabs fpd-tabs-side fpd-top-actions-centered fpd-bottom-actions-centered fpd-views-inside-left"></div>');
                $clothing.append('<div class="fpd-product" title="Shirt Front" id="data-thumb-front" data-thumbnail="' + front + '" > <img src="' + front + '" id="front-de" title="Base" /><div class="fpd-product" title="Shirt Back" id="data-thumb-back" data-thumbnail="' + back + '"> <img src="' + back + '" id="back-de" title="Base"/></div></div>');
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
                console.log(yourDesigner)

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
        $('#image-button').click(function () {
            var image = yourDesigner.createImage();
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
</script>
