<script src="https://www.paypal.com/sdk/js?client-id=AayJ0xVtrGwKtTpoWzUpY0BqdOfjHJ7kYAY1wAgMkC88P5ctuqbMOOFcHSpee4TqZbTmkCklavuc3oLa"></script>
<script>

    let amount = $('#amount').val();


    //$("#radiomethod").is(":checked")
    var shipping_method, gender = null;
    var type_ship_address = 'old';
    var idaddress = '';
    $(function () {

        $("input[name='radiomethod']").click(function () {
            let dataId = $(this).data("id");
            shipping_method = dataId;
            $('.method_ship').removeClass("checked_method");
            $('#method' + dataId).addClass('checked_method');

        });
        $(".div_address").click(function () {
            let type = $(this).data("type");
            let id = $(this).data("id");
            idaddress = id;
            console.log(idaddress);
            if (type == 'new') {
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
            url: "/cpanel/coupon/usecoupon",
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
                    $("#btn_place_order").click();

                } else {
                    toastr.error(data.msg, 'Error');

                }
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

        if (type_ship_address == 'new') {
            var country = $('#country_new').val();
            var city = $('#city_new').val();
            var postalcode = $('#postalcode_new').val();
            var address = $('#address_new').val();

            if (country == '') {
                $('#country_new').focus();
                toastr.error('Enter Country', 'Error');
                return;
            }
            if (city == '') {
                $('#city_new').focus();
                toastr.error('Enter City', 'Error');
                return;
            }
            if (postalcode == '') {
                $('#postalcode_new').focus();
                toastr.error('Enter Postalcode', 'Error');
                return;
            }
            if (address == '') {
                $('#address_new').focus();
                toastr.error('Enter Address', 'Error');
                return;
            }
        }
        if (idaddress == '') {
            idaddress = 1;
        }
        formData.append('gender', gender);
        formData.append('shipping_method', shipping_method);
        formData.append('type_ship_address', type_ship_address);
        formData.append('idaddress', idaddress);

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
                    alert('Transaction completed by ' + details.payer.name.given_name);
                    console.log(details);
                    if (details.status == "COMPLETED") {
                        $.ajax({
                            type: 'post',
                            url: '/cpanel/orders/insert',
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


    });
    $(".div-gender").click(function () {
        $('.div-gender').removeClass("active-gender");
        $(this).addClass('active-gender');
    });


</script>