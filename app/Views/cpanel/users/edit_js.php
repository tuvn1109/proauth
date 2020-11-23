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
                toastr.options = {
                    "positionClass": "toast-top-right",
                }
                if (data.stt == true) {
                    toastr.success(data.msg, 'Success');
                } else {
                    toastr.error(data.msg, 'Error');
                }
                //makeSAlert(data,5000);
                //$("#catlist").load(location.href + " #catlist");
                //$("#noti").html(data);
                //window.setTimeout(function(){location.reload()},1000);
            }
        }); //End Ajax
    });

</script>