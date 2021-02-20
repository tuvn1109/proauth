<script src="https://www.paypal.com/sdk/js?client-id=AayJ0xVtrGwKtTpoWzUpY0BqdOfjHJ7kYAY1wAgMkC88P5ctuqbMOOFcHSpee4TqZbTmkCklavuc3oLa"></script>
<script>

    let amount = $('#amount').val();


    //$("#radiomethod").is(":checked")
    var gender = $('input[name="radiogender"]:checked').val();
    var shipping_method = $('input[name="radiomethod"]:checked').val();
    var type_ship_address = 'old';
    var idaddress = $('input[name="radioaddress"]:checked').val();
    $(function () {

        $("input[name='radiomethod']").click(function () {
            let dataId = $(this).data("id");
            $('.method_ship').removeClass("checked_method");
            $('#method' + dataId).addClass('checked_method');

        });
        $(".payment-card").click(function () {
            let dataId = $(this).data("id");
            $("#radiopaymethod" + dataId).prop("checked", true);


        });
        $(".method_ship ").click(function () {
            let dataId = $(this).data("id");
            $('.method_ship').removeClass("checked_method");
            $('#method' + dataId).addClass('checked_method');
            $("#radiomethod" + dataId).prop("checked", true);
        });
        $(".div_address").click(function () {
            let dataId = $(this).data("id");
            $("#radioaddress" + dataId).prop("checked", true);
            let value = $('input[name="radioaddress"]:checked').val();
            idaddress = value;
            if (value == 'new') {
                $('#div_addressnew').css('display', 'flex');
                type_ship_address = 'new';
            } else {
                $('#div_addressnew').css('display', 'none');
                type_ship_address = 'old';
            }
            $('.div_address').removeClass("active-address");
            $(this).addClass('active-address');

        });


    });

    function checknull() {
        var fullname = $('#fullname').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var country = $('#country').val();
        var city = $('#city').val();
        var postalcode = $('#postalcode').val();
        var address = $('#address').val();
        if (fullname == '' || phone == '' || email == '' || country == '' || city == '' || postalcode == '' || address == '') {
            $('#divpaypal').html('');
        } else {
            $("#btn_place_order").click();
        }
    }

    $("#btn-add-coupon").click(function () {
        var coupon = $('#coupon').val();

        $.ajax({
            url: "/cart/usecoupon",
            dataType: "json",
            data: {coupon: coupon},
            type: "POST",
            success: function (data) {
                if (data.stt == true) {
                    toastr.success(data.msg);
                    $('#amount').val(data.data.afterDiscount);
                    $('#discount_code #discount').html('$' + data.data.discount);
                    $('#totalamount').html('$' + data.data.afterDiscount);

                    amount = data.data.afterDiscount;
                    $('#coupon').prop('disabled', true);
                    $('#btn-cancel-coupon').show();

                    // $("#btn_place_order").click();

                } else {
                    toastr.error(data.msg, 'Error');

                }
            },
            error: function () {
            }
        });
    });


    $('#btn-cancel-coupon').click(function () {
        $('#coupon').val('');
        $('#coupon').prop('disabled', false);
        $.ajax({
            url: "/cart/usecoupon",
            dataType: "json",
            data: {coupon: 'cancel'},
            type: "POST",
            success: function (data) {
                $('#amount').val(data.data.afterDiscount);
                $('#discount_code #discount').html('$' + data.data.discount);
                $('#totalamount').html('$' + data.data.afterDiscount);
                $('#btn-cancel-coupon').hide();


            },
            error: function () {
            }
        });
    });


    $("#btn_place_order").click(function () {
        $('#divpaypal').html('');

        var formData = new FormData($('#form_contact')[0]);
        if (shipping_method == null || shipping_method == '') {
            shipping_method = 1
        }
        var fullname = $('#fullname').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var country = $('#country').val();
        var city = $('#city').val();
        var postalcode = $('#postalcode').val();
        var address = $('#address').val();
        if (fullname == '') {
            $('#fullname').focus();
            toastr.error('Enter Fullname', 'Error');
            return;
        }
        if (phone == '') {
            $('#phone').focus();
            toastr.error('Enter Phone Number', 'Error');
            return;

        }
        if (email == '') {
            $('#email').focus();
            toastr.error('Enter Email', 'Error');
            return;
        }
        if (country == '') {
            $('#country').focus();
            toastr.error('Enter Country', 'Error');
            return;
        }
        if (city == '') {
            $('#city').focus();
            toastr.error('Enter City', 'Error');
            return;
        }
        if (postalcode == '') {
            $('#postalcode').focus();
            toastr.error('Enter Postalcode', 'Error');
            return;
        }
        if (address == '') {
            $('#address').focus();
            toastr.error('Enter Address', 'Error');
            return;
        }
        if (idaddress == 'new') {
            console.log('idaddress:', idaddress)

            var countrynew = $('#country_new').val();
            var citynew = $('#city_new').val();
            var postalcodenew = $('#postalcode_new').val();
            var addressnew = $('#address_new').val();

            if (countrynew == '') {
                $('#country_new').focus();
                toastr.error('Enter Country', 'Error');
                return;
            }
            if (citynew == '') {
                $('#city_new').focus();
                toastr.error('Enter City', 'Error');
                return;
            }
            if (postalcodenew == '') {
                $('#postalcode_new').focus();
                toastr.error('Enter Postalcode', 'Error');
                return;
            }
            if (addressnew == '') {
                $('#address_new').focus();
                toastr.error('Enter Address', 'Error');
                return;
            }
        }
        if (idaddress == '') {
            idaddress = 1;
        }
        var radiopaymethod = $('input[name="radiopaymethod"]:checked').val()

        formData.append('gender', gender);
        formData.append('shipping_method', $('input[name="radiomethod"]:checked').val());
        formData.append('type_ship_address', type_ship_address);
        formData.append('idaddress', $('input[name="radioaddress"]:checked').val());
        formData.append('country_new', countrynew);
        formData.append('city_new', citynew);
        formData.append('postalcode_new', postalcodenew);
        formData.append('address_new', addressnew);
        formData.append('radiopaymethod', radiopaymethod);


        if (radiopaymethod == 1) {
            paypal.Buttons({
                createOrder: function (data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {value: amount}
                        }],
                    });
                },
                onApprove: function (data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function (details) {
                        // This function shows a transaction success message to your buyer.
                        //  alert('Transaction completed by ' + details.payer.name.given_name);
                        console.log(details);
                        if (details.status == "COMPLETED") {
                            $.ajax({
                                type: 'post',
                                url: '/cart/insert',
                                data: formData,
                                async: false,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function (data) {
                                    $('#order').html('');
                                    $('#order').html('<div class="row"><div class="col-12"><div class="jumbotron"><h1 class="text-center display-3">Thank You!</h1><h2 class="text-center">YOUR ORDER HAS BEEN RECEIVED</h2><p class="text-center">Your order # is: ' + data + '</p><p class="text-center">You will receive an order confirmation email with details of your order and a link to track your process.</p><center><div class="btn-group" style="margin-top:50px;"><a href="/" class="btn btn-lg btn-warning"  style="color: #FFFFFF">CONTINUE</a></div></center></div></div></div>');
                                    //makeSAlert(data,5000);
                                    //$("#catlist").load(location.href + " #catlist");
                                    //$("#noti").html(data);
                                    //window.setTimeout(function(){location.reload()},1000);
                                }
                            }); //End Ajax
                        }
                    });
                }
            }).render('#divpaypal');
        } else {
            $.ajax({
                type: 'post',
                url: '/cart/insert',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#order').html('');
                    $('#order').html('<div class="row"><div class="col-12"><div class="jumbotron"><h1 class="text-center display-3">Thank You!</h1><h2 class="text-center">YOUR ORDER HAS BEEN RECEIVED</h2><p class="text-center">Your order # is: ' + data + '</p><p class="text-center">You will receive an order confirmation email with details of your order and a link to track your process.</p><center><div class="btn-group" style="margin-top:50px;"><a href="/" class="btn btn-lg btn-warning"  style="color: #FFFFFF">CONTINUE</a></div></center></div></div></div>');
                    //makeSAlert(data,5000);
                    //$("#catlist").load(location.href + " #catlist");
                    //$("#noti").html(data);
                    //window.setTimeout(function(){location.reload()},1000);
                }
            }); //End Ajax

        }

    });
    $(".div-gender").click(function () {
        $('.div-gender').removeClass("active-gender");
        $(this).addClass('active-gender');
    });


</script>