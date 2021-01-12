<script>
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


    $("#btn_place_order").click(function () {
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

        formData.append('gender', gender);
        formData.append('shipping_method', shipping_method);
        formData.append('type_ship_address', type_ship_address);
        formData.append('idaddress', idaddress);
        console.log(formData);
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

    });
    $(".div-gender").click(function () {
        $('.div-gender').removeClass("active-gender");
        $(this).addClass('active-gender');
    });


</script>