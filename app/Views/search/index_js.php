<script>

    $(function () {
        $('div #favourite').click(function () {
            var id = $(this).data('id');
            var type = $(this).data('type');
            if (type == '0') {
                $(this).data('type', 1);
                console.log(0);
            }
            if (type == '1') {
                $(this).data('type', 0);
                console.log(1);
            }
            $.ajax({
                url: "/home/favourite",
                dataType: "html",
                data: {id: id},
                type: "POST",
                success: function (data) {
                    $('#iconfavourite' + id).toggleClass('fal fas');
                    $('#iconfavourite' + id).css("color", "red");
                },
                error: function () {
                }
            });

        });

    });

</script>