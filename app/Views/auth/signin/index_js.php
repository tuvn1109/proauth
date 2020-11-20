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
                    window.setTimeout(function () {
                        location.reload();
                    }, 1000)
                } else {

                }
                //makeSAlert(data,5000);
                //$("#catlist").load(location.href + " #catlist");
                //$("#noti").html(data);
                //window.setTimeout(function(){location.reload()},1000);
            }
        }); //End Ajax
    });


    $('#kt_login_signup_submit').on('click', function (e) {
        e.preventDefault();
        validation.validate().then(function (status) {
            if (status == 'Valid') {
                var formData = new FormData($('#kt_login_signup_form')[0]);
                $.ajax({
                    type: 'post',
                    url: '/Auth/submitsignup',
                    data: formData,
                    dataType: "json",
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.stt == true) {
                            window.location.assign('/');
                        }
                        //makeSAlert(data,5000);
                        //$("#catlist").load(location.href + " #catlist");
                        //$("#noti").html(data);
                        //window.setTimeout(function(){location.reload()},1000);
                    }
                }); //End Ajax
            } else {

            }
        });
    });
</script>