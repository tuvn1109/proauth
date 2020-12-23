<script>
    //$("#radiomethod").is(":checked")
    $(function () {

        $("input[name='radiomethod']").click(function () {
            let dataId = $(this).data("id");
            console.log(dataId);
            $('.method').removeClass("checked_method");
            $('#method' + dataId).addClass('checked_method');
            return;
            if ($('input:radio[name=type]:checked').val() == "walk_in") {
                alert($('input:radio[name=type]:checked').val());
                //$('#select-table > .roomNumber').attr('enabled',false);
            }
        });
    });
</script>