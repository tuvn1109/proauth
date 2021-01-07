<script>


    var updateId = null;
    const catTable = $('#Table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/cpanel/product/loaddata",
            "data": function (d) {
                var info = $('#Table').DataTable().page.info().page + 1;
                d.page = info;
            }
        },
        "columns": [
            {"data": "id"},
            {
                "data": "", render: function (data, type, row) {
                    return '<img src="/download/image?name=' + row.thumbnail + '" style="width:55px;height:70px">';
                }

            },
            {"data": "name"},
            {"data": "price"},
            {"data": "price_sale"},
            {
                "data": "", render: function (data, type, row) {
                    if (row.sale == 'yes') {
                        var checked = 'checked';
                    }
                    return '<div class="custom-control custom-switch custom-switch-success mr-2 mb-1"><input type="checkbox" class="custom-control-input" id="salestatus' + row.id + '" name="salestatus" onclick="test(' + row.id + ')"  ' + checked + '><label class="custom-control-label" for="salestatus' + row.id + '"><span class="switch-icon-left"><i class="feather icon-check"></i></span><span class="switch-icon-right"><i class="feather icon-x"></i></span></label></div>';
                }

            },
            {"data": "type"},
            {"data": "description"},
            {"data": "created_at"},
            {
                "data": "", render: function (data, type, row) {
                    return '<button type="button" class="btn btn-icon btn-primary mr-1 waves-effect waves-light updateCat" data-name="' + row.value + '" data-id="' + row.id + '"><i class="feather icon-edit"></i></button><button type="button" class="btn btn-icon btn-danger mr-1 waves-effect waves-light delCat" data-id="' + row.id + '"><i class="feather icon-trash"></i></button>';
                }
            },
        ],
        "order": [[0, "desc"]],
        "drawCallback": function () {
            $('.updateCat').on('click', function () {
                let dataId = $(this).data("id");
                let dataName = $(this).data("name");

                $('#edittype #id').val(dataId);
                $('#edittype #value').val(dataName);
                $('#edittype').modal('show');
                window.location.href = 'product/edit/' + dataId;
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
                            url: "/cpanel/product/delete",
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

    function test(id) {
        if ($('#salestatus' + id).is(':checked')) {
            var salestatus = 'on';
        } else {
            var salestatus = 'off';
        }
        $.ajax({
            url: "/cpanel/product/updatesale",
            dataType: "json",
            data: {salestatus: salestatus, id: id},
            type: "POST",
            success: function (data) {
                if (data.stt == true) {
                    toastr.success(data.msg, 'Success');
                } else {
                    toastr.error('Error , try agian', 'Error');
                    // toastr.success(data.msg, 'Error');
                }
            },
            error: function () {
            }
        });

    }

    $('.salestatus').change(function () {
        let dataId = $(this).data("id");

        console.log('222');
    });


    $('.salestatus').click(function () {
        let dataId = $(this).data("id");
        console.log('3333');

    });

    $('.salestatus').on('click', function () {
        let dataId = $(this).data("id");
        console.log('3333');

    });
</script>