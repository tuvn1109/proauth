<script>
    $('#kt_login_signin_submit').on('click', function (e) {
        e.preventDefault();
        var formData = new FormData($('#kt_login_signin_form')[0]);
        $.ajax({
            type: 'post',
            url: '/Auth/submitsignin',
            data: formData,
            dataType: "json",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.stt == true) {
                    toastr.error(data.msg, 'Error');
                    window.setTimeout(function () {
                        location.reload();
                    }, 1000)
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