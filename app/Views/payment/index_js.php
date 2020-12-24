<script>
    //$("#radiomethod").is(":checked")
    $(function () {

        $("input[name='radiomethod']").click(function () {
            let dataId = $(this).data("id");
            console.log(dataId);
            $('.method_ship').removeClass("checked_method");
            $('#method' + dataId).addClass('checked_method');

        });
    });


    $("#btn_place_order").click(function () {
        var formData = new FormData($('#form_contact')[0]);
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


</script>