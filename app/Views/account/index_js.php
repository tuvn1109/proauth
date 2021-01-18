<script>
    $('#form_contact').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: 'post',
            url: '/account/update',
            data: formData,
            dataType: 'JSON',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.stt == true) {
                    toastr.success(data.msg);
                } else {
                    toastr.error(data.msg, 'Error');
                }
            }
        }); //End Ajax
    }); //End submit


    $('#btn-change-pass').on('click', function (e) {
        e.preventDefault();
        var formData = new FormData($('#form_password')[0]);
        var id = $('#id').val();
        formData.append('id', id);
        $.ajax({
            type: 'post',
            url: '/account/changepass',
            data: formData,
            dataType: 'JSON',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.stt == true) {
                    toastr.success(data.msg);
                    $('#currentpassword').val('');
                    $('#newpassword').val('');
                    $('#confirm').val('');
                    $('.close').click();
                } else {
                    toastr.error(data.msg, 'Error');
                }
            }
        }); //End Ajax
    }); //End submit


    $(".div-gender").click(function () {
        $('.div-gender').removeClass("active-gender");
        var gender = $(this).data('gender');
        $('#gender').val(gender);
        $(this).addClass('active-gender');
    });
</script>