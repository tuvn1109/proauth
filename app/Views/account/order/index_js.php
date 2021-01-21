<script>
    $('.detail-order').on('click', function () {
        let dataId = $(this).data("id");
        $.ajax({
            url: "/cpanel/orders/update",
            dataType: "json",
            data: {id: dataId},
            type: "POST",
            success: function (data) {
                console.log(data);
                $("#drawdetail").html('');
                var i = 0;
                $.each(data.details, function (key, value) {
                    i++;
                    console.log(value.id);
                    $("#drawdetail").append('<tr><td style="text-align: center">' + i + '</td><td style="text-align: center"><img src="/download/image?name=' + value.order_detail_image_front + '" class="w-100"></td><td style="text-align: center"><img src="/download/image?name=' + value.order_detail_image_back + '" class="w-100"></td><td style="text-align: center">' + value.size + '</td><td style="text-align: center">' + value.color + '</td><td style="text-align: center">' + value.order_detail_price + '</td></tr>')
                });

            },
            error: function () {
            }
        });


      //  $('#ModalCenter').modal('show');
    });
</script>