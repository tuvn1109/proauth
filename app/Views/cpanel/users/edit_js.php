<script>
    $('#btnUpdateUser').on('click', function (e) {
        e.preventDefault();
        var formData = new FormData($('#form_update_user')[0]);
        $.ajax({
            type: 'post',
            url: '/cpanel/Users/submitedit',
            data: formData,
            dataType: "json",
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