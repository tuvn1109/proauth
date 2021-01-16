<script>

    var updateId = null;
    const catTable = $('#ordersTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/cpanel/page/loaddata",
            "data": function (d) {
                var info = $('#ordersTable').DataTable().page.info().page + 1;
                d.page = info;
            }
        },
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "layout"},
            {
                "data": "", render: function (data, type, row) {
                    return '<button type="button" class="btn btn-icon btn-primary mr-1 waves-effect waves-light edit" data-id="' + row.id + '"><i class="feather icon-edit"></i></button><button type="button" class="btn btn-icon btn-danger mr-1 waves-effect waves-light delCat" data-id="' + row.id + '"><i class="feather icon-trash"></i></button>';
                }
            },
        ],
        "order": [[0, "desc"]],
        "drawCallback": function () {
            $('.edit').on('click', function () {
                let dataId = $(this).data("id");
                window.location.href = 'page/edit/' + dataId;
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
                            url: "/cpanel/page/delete",
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