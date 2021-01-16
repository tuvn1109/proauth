<script>

    var updateId = null;
    const catTable = $('#Table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/cpanel/coupon/loaddata",
            "data": function (d) {
                var info = $('#Table').DataTable().page.info().page + 1;
                d.page = info;
            }
        },
        "columns": [
            {"data": "id"},
            {"data": "code"},
            {"data": "discount"},
            {"data": "expiration_date"},
            {
                "data": "", render: function (data, type, row) {
                    return '<button type="button" class="btn btn-icon btn-primary mr-1 waves-effect waves-light updateCat" data-code="' + row.code + '" data-discount="' + row.discount + '"  data-date="' + row.expiration_date + '" data-id="' + row.id + '"><i class="feather icon-edit"></i></button><button type="button" class="btn btn-icon btn-danger mr-1 waves-effect waves-light delCat" data-id="' + row.id + '"><i class="feather icon-trash"></i></button>';
                }
            },
        ],
        "order": [[0, "desc"]],
        "drawCallback": function () {
            $('.updateCat').on('click', function () {
                let dataId = $(this).data("id");
                let dataDate = $(this).data("date");
                let dataCode = $(this).data("code");
                let dataDiscount = $(this).data("discount");

                $('#edittype #id').val(dataId);
                $('#edittype #date').val(dataDate);
                $('#edittype #code').val(dataCode);
                $('#edittype #discount').val(dataDiscount);
                $('#edittype').modal('show');
//                window.location.href = 'users/edit/' + dataId;
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
                            url: "/cpanel/coupon/delete",
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

    $('#addprotype').on("click", function () {
        var formData = new FormData($('#all')[0]);
        $.ajax({
            type: 'post',
            url: '/cpanel/coupon/insert',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#value').val('');
                catTable.ajax.reload(null, false);
            }
        })
    });

    $('#editrotype').on("click", function () {
        var formData = new FormData($('#alledit')[0]);
        $.ajax({
            type: 'post',
            url: '/cpanel/coupon/edit',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                catTable.ajax.reload(null, false);
            }
        })
    });


</script>