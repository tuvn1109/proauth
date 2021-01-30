<script>

    $(function () {
     $('.inputQuantity').TouchSpin();

        $(document).on("click", ".uncart", function () {
            var id = $(this).data('id');
            uncart(id);
        });

        $(document).on("change", ".inputQuantity", function () {
            var loca = $(this).data('loca');
            var quantity = $(this).val();
            $.ajax({
                url: "/cart/listcart",
                dataType: "json",
                data: {loca: loca, quantity: quantity},
                type: "POST",
                success: function (data) {
                    var numbcart = 0;
                    var total = 0;
                    $element = $('#divlistcart').empty();
                    $result = '';
                    var i = 0;
                    $.each(data, function (key, val) {
                        numbcart++;
                        var price = 0;
                        if (val.sale == 'yes') {
                            price = val.price_sale * val.quantity;
                            $priceEL = ('<span class="pricesale" style="text-decoration-line: line-through;margin-right: 15px;color: rgba(102, 101, 101, 0.78);">$' + val.price + ' USD</span> <span class="price">$' + val.price_sale + ' USD</span>');
                        } else {
                            price = val.price * val.quantity;
                            $priceEL = ('<span class="price">$' + val.price + ' USD</span>');

                        }
                        total += price;
                        $element.append('<div class="col-md-12 order-list"><div class="order-div"><div class="row"><div class="col-12 text-right"><div class="div-un-cart"><i class="far fa-times uncart" data-id="' + i + '" ></i></div></div></div><div class="order-img d-flex"><div class="order-img-front"><img src="' + val.front + '" class="w-100"><div class="icon-front centerContent">Front</div></div><div class="order-img-back "><img src="' + val.back + '" class="w-100"><div class="icon-back centerContent">Back</div></div></div><div class="row" style="margin-top: 25px"><div class="col-8"><div class="order-item-name"><span>' + val.name + '</span><br><div class="order-item-type">Product type:<span>Two Tone Mug Blue 11 oz</span></div></div></div><div class="col-4"><div class="quantity d-flex"><span>Quantity:</span> <input type="number" class="inputQuantity" value="' + val.quantity + '" data-loca="' + i + '"></div></div><div class="col-8"><div class="order-item-price">' + $priceEL + '</div></div><div class="col-4"><div class="delivery"><img src="/logo/truck-logo.png" style="height: 30px;width: 30px"><span>Delivery</span><br><span class="text-expree">' + val.delivery + '</span></div></div></div></div></div>');

                        i++;
                    });
        $('.inputQuantity').TouchSpin();

                    $('.summary-money').html('$' + total);
                    $('.total-order').html('$' + total);
                    $('.cart-text a').html('Cart: ' + numbcart);
                },
                error: function () {
                }
            });

        });

        function uncart(id) {
            $.ajax({
                url: "/cart/uncart",
                dataType: "json",
                data: {id: id},
                type: "POST",
                success: function (data) {
                    checklistcart();
                },
                error: function () {
                }
            });

        }

        function checklistcart() {
            $.ajax({
                url: "/cart/listcart",
                dataType: "json",
                data: {},
                type: "POST",
                success: function (data) {
                    var numbcart = 0;
                    var total = 0;
                    $element = $('#divlistcart').empty();
                    $result = '';
                    var i = 0;
                    $.each(data, function (key, val) {
                        numbcart++;
                        var price = 0;
                        if (val.sale == 'yes') {
                            price = val.price_sale * val.quantity;
                            $priceEL = ('<span class="pricesale" style="text-decoration-line: line-through;margin-right: 15px;color: rgba(102, 101, 101, 0.78);">$' + val.price + ' USD</span> <span class="price">$' + val.price_sale + ' USD</span>');
                        } else {
                            price = val.price * val.quantity;
                            $priceEL = ('<span class="price">$' + val.price + ' USD</span>');

                        }
                        total += price;
                        $element.append('<div class="col-md-12 order-list"><div class="order-div"><div class="row"><div class="col-12 text-right"><div class="div-un-cart"><i class="far fa-times uncart" data-id="' + i + '" ></i></div></div></div><div class="order-img d-flex"><div class="order-img-front"><img src="' + val.front + '" class="w-100"><div class="icon-front centerContent">Front</div></div><div class="order-img-back "><img src="' + val.back + '" class="w-100"><div class="icon-back centerContent">Back</div></div></div><div class="row" style="margin-top: 25px"><div class="col-8"><div class="order-item-name"><span>' + val.name + '</span><br><div class="order-item-type">Product type:<span>Two Tone Mug Blue 11 oz</span></div></div></div><div class="col-4"><div class="quantity d-flex"><span>Quantity:</span> <input type="number" class="inputQuantity" value="' + val.quantity + '" data-loca="' + i + '"></div></div><div class="col-8"><div class="order-item-price">' + $priceEL + '</div></div><div class="col-4"><div class="delivery"><img src="/logo/truck-logo.png" style="height: 30px;width: 30px"><span>Delivery</span><br><span class="text-expree">' + val.delivery + '</span></div></div></div></div></div>');

                        i++;
                    });
        $('.inputQuantity').TouchSpin();

                    $('.summary-money').html('$' + total);
                    $('.total-order').html('$' + total);
                    $('.cart-text a').html('Cart: ' + numbcart);
                },
                error: function () {
                    toastr.error('Unspecified error, please try again', 'Error');
                }
            });
        }

    });

</script>