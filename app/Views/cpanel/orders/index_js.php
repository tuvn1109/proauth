<script>

    var updateId = null;
    const catTable = $('#ordersTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/cpanel/orders/loaddata",
            "data": function (d) {
                var info = $('#ordersTable').DataTable().page.info().page + 1;
                d.page = info;
            }
        },
        "columns": [
            {"data": "order_id"},
            {"data": "order_code"},
            {"data": "fullname"},
            {"data": "order_date"},
            {"data": "order_price"},
            {"data": "order_payment"},
            {"data": "order_address"},
            {"data": "name"},
            //    {"data": "order_status"},
            {
                "data": "order_status", //
                render: function (data, type, row) {
                    if (row.order_status == null) row.order_status = '';
                    return '<a href="#" class="fastEdit" data-type="select" data-pk="' + row.order_id + '" data-url="/cpanel/orders/update/' + row.order_id + '" data-title="Select status">' + row.order_status + '</a>';
                }
            },
            {
                "data": "", render: function (data, type, row) {
                    return '<button type="button" class="btn btn-icon btn-primary mr-1 waves-effect waves-light updateOrder" data-id="' + row.order_id + '"><i class="fal fa-eye"></i></button><button type="button" class="btn btn-icon btn-danger mr-1 waves-effect waves-light delCat" data-id="' + row.order_id + '"><i class="feather icon-trash"></i></button>';
                }
            },
        ],
        "order": [[0, "desc"]],
        "drawCallback": function () {
            $('.fastEdit').editable({
                emptytext: 'empty',
                source: "/cpanel/orders/loadstatus"
            },countOd());
            $('.updateOrder').on('click', function () {
                let dataId = $(this).data("id");
                $.ajax({
                    url: "/cpanel/orders/view",
                    dataType: "json",
                    data: {id: dataId},
                    type: "POST",
                    success: function (data) {
                        console.log(data);
                        $("#drawdetail").html('');
                        var i = 0;
                        $.each(data, function (key, value) {
                            i++;
                            console.log(value.id);
                            $("#drawdetail").append('<tr><td style="text-align: center">' + i + '</td><td style="text-align: center"><img src="/download/image?name=' + value.order_detail_image_front + '" class="w-100"></td><td style="text-align: center"><img src="/download/image?name=' + value.order_detail_image_back + '" class="w-100"></td><td style="text-align: center">' + value.size + '</td><td style="text-align: center">' + value.color + '</td><td style="text-align: center">' + value.order_detail_price + '</td></tr>')
                        });

                    },
                    error: function () {
                    }
                });


                $('#modalUpdate').modal('show');
            });
            $('.delCat').on('click', function () {
                let dataId = $(this).data("id");
                Swal.fire({
                    title: 'Do you want to delete this data?',
                    showCancelButton: true,
                    confirmButtonText: `Delete`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.value) {
                        $.ajax({
                            url: "/cpanel/orders/delete",
                            dataType: "json",
                            data: {id: dataId},
                            type: "POST",
                            success: function (data) {
                                Swal.fire('Success!', '', 'success');
                                catTable.ajax.reload(null, false);
                            },
                            error: function () {
                            }
                        });
                    }
                })
            });
        }
    });
</script>