<script>

    var updateId = null;
    const catTable = $('#Table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/cpanel/feelback/loaddata",
            "data": function (d) {
                var info = $('#Table').DataTable().page.info().page + 1;
                d.page = info;
            }
        },
        "columns": [
            {"data": "id"},
            {"data": "product_name"},
            {"data": "fullname"},
            {"data": "content"},
            {"data": "rate"},
            {"data": "created_at"},
            {
                "data": "", render: function (data, type, row) {
                    if (row.onsite == 'yes') {
                        var checked = 'checked';
                    }
                    return '<div class="custom-control custom-switch custom-switch-success mr-2 mb-1"><input type="checkbox" class="custom-control-input" id="onsite' + row.id + '" name="onsite" onclick="test(' + row.id + ')"  ' + checked + '><label class="custom-control-label" for="onsite' + row.id + '"><span class="switch-icon-left"><i class="feather icon-check"></i></span><span class="switch-icon-right"><i class="feather icon-x"></i></span></label></div>';
                }

            },
            {
                "data": "", render: function (data, type, row) {
                    return '<button type="button" class="btn btn-icon btn-danger mr-1 waves-effect waves-light delCat" data-id="' + row.id + '"><i class="feather icon-trash"></i></button>';
                }
            },
        ],
        "order": [[0, "desc"]],
        "drawCallback": function () {

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
                            url: "/cpanel/feelback/delete",
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
        if ($('#onsite' + id).is(':checked')) {
            var onsite = 'yes';
        } else {
            var onsite = '';
        }
        $.ajax({
            url: "/cpanel/feelback/update",
            dataType: "json",
            data: {onsite: onsite, id: id},
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

</script>