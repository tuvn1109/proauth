<script>
    $(function () {
        $('#trackod').click(function () {
            $('#drawtrack').empty();
            var code = $('#input-trackod').val();
            var mail = $('#input-mail').val();
            if (code == '' || code == null) {
                toastr.error('Please enter your order code', 'Error');
                $('#input-trackod').focus();
                return;
            }
            if (mail == '' || mail == null) {
                toastr.error('Please enter your order email', 'Error');
                $('#input-mail').focus();
                return;
            }
            $.ajax({
                url: "trackorder/track",
                dataType: "json",
                data: {code: code},
                type: "POST",
                success: function (data) {
                    if (data.stt == true) {
                        $('#drawtrack').append('<div class="col-12"><hr></div><div class="col-12 d-flex justify-content-center"><h2>Packing list</h2></div><div class="col-12"><p>Order code: ' + data.info.order_code + '</p></div><div class="col-12"><p>Date: ' + data.info.order_date + '</p></div><div class="col-12"><p>Shipping address: ' + data.info.order_address + '</p></div>');
                        var alldetail = ('');
                        $.each(data.details, function (key, value) {
                            alldetail += '<tr><td style="text-align: center"><img src="/download/image?name=' + value.order_detail_image_front + '" class="w-100"></td><td style="text-align: center"><img src="/download/image?name=' + value.order_detail_image_back + '" class="w-100"></td><td style="text-align: center">' + value.size + '</td><td style="text-align: center">' + value.color + '</td><td style="text-align: center">' + value.order_detail_price + '</td></tr>';
                        });


                        $('#drawtrack').append('<div class="col-12"><table class="table table-bordered table-striped table-hover text-center"><thead><tr><th>Front</th><th>Back</th><th>Size</th><th>Color</th><th>Price</th></tr></thead><tbody>' + alldetail + '</tbody><tfoot></tfoot></table></div>')

                    } else {
                        toastr.error('Order code is incorrect or does not exist', 'Error');
                    }
                },
                error: function () {
                }
            });

        });
    });
</script>