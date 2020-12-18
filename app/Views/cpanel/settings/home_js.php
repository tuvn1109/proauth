<script>

    $('#btnUpdateHome').on('click', function () {
        var formData = new FormData($('#form_update_home')[0]);
        $.ajax({
            type: 'post',
            url: '/cpanel/settings/updatehome',
            dataType: "json",
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