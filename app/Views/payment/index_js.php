<script>
    //$("#radiomethod").is(":checked")
    var shipping_method, gender = null;
    $(function () {

        $("input[name='radiomethod']").click(function () {
            let dataId = $(this).data("id");
            shipping_method = dataId;
            $('.method_ship').removeClass("checked_method");
            $('#method' + dataId).addClass('checked_method');

        });
    });


    $("#btn_place_order").click(function () {
        var formData = new FormData($('#form_contact')[0]);
        formData.append('gender', gender);
        formData.append('shipping_method', shipping_method);
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