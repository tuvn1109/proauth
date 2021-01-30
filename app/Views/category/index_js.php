<script>

    $(function () {

        $('#page').click(function () {
            var id = $(this).data('id');
            $.ajax({
                url: "/home/index",
                dataType: "html",
                data: {page: id},
                type: "POST",
                success: function (data) {

                },
                error: function () {
                }
            });

        });
    });

</script>