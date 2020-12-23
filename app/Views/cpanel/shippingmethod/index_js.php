<script>

    var updateId = null;
    const catTable = $('#Table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/cpanel/shippingmethod/loaddata",
            "data": function (d) {
                var info = $('#Table').DataTable().page.info().page + 1;
                d.page = info;
            }
        },
        "columns": [
            {"data": "id"},
            {
                "data": "", render: function (data, type, row) {
                    return '<img src="/download/image?name=' + row.logo + '" style="width:55px;height:70px">';
                }

            },
            {"data": "name"},
            {"data": "price"},
            {
                "data": "", render: function (data, type, row) {
                    return '<button type="button" class="btn btn-icon btn-primary mr-1 waves-effect waves-light updateCat" data-price="' + row.price + '"  data-name="' + row.name + '" data-id="' + row.id + '"><i class="feather icon-edit"></i></button><button type="button" class="btn btn-icon btn-danger mr-1 waves-effect waves-light delCat" data-id="' + row.id + '"><i class="feather icon-trash"></i></button>';
                }
            },
        ],
        "order": [[0, "desc"]],
        "drawCallback": function () {
            $('.updateCat').on('click', function () {
                let dataId = $(this).data("id");
                let dataName = $(this).data("name");
                let dataPrice = $(this).data("price");

                $('#editmodal #id').val(dataId);
                $('#editmodal #name').val(dataName);
                $('#editmodal #price').val(dataPrice);
                $('#editmodal').modal('show');
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
                            url: "/cpanel/shippingmethod/delete",
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

    $('#add').on("click", function () {
        var formData = new FormData($('#all')[0]);
        $.ajax({
            type: 'post',
            url: '/cpanel/shippingmethod/insert',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#default #name').val('');
                $('#default #price').val('');
                $('#default #inputfile').val('');
                $('#default .custom-file-label').html('Choose file');
                catTable.ajax.reload(null, false);
            }
        })
    });
    $('#btn-edit').on("click", function () {
        var formData = new FormData($('#alledit')[0]);
        $.ajax({
            type: 'post',
            url: '/cpanel/shippingmethod/edit',
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