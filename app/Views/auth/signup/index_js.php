<script>
    $('#kt_login_signup_form').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        var password = $('#password').val();
        var Cpassword = $('#Cpassword').val();
        if (password != Cpassword) {
            alert(1);
            return;
        }
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
                    toastr.success(data.msg, 'Success');
                    window.setTimeout(function () {
                        window.location.assign('/');
                    }, 1500)
                } else {
                    toastr.error(data.msg, 'Error');
                }
                //makeSAlert(data,5000);
                //$("#catlist").load(location.href + " #catlist");
                //$("#noti").html(data);
                //window.setTimeout(function(){location.reload()},1000);
            }
        }); //End Ajax
    }); //End submit
</script>