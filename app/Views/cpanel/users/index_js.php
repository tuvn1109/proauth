<script>

    var updateId = null;
    const catTable = $('#usersTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/cpanel/users/loaddata",
            "data": function (d) {
                var info = $('#usersTable').DataTable().page.info().page + 1;
                d.page = info;
            }
        },
        "columns": [
            {"data": "id"},
            {"data": "fullname"},
            {"data": "phone"},
            {"data": "email"},
            {"data": "username"},
            {"data": "phone"},
            {"data": "status"},
            {"data": "role"},
            {
                "data": "", render: function (data, type, row) {
                    return '<button type="button" class="btn btn-icon btn-primary mr-1 waves-effect waves-light updateCat" data-name="' + row.fullname + '" data-id="' + row.Id + '"><i class="feather icon-edit"></i></button><button type="button" class="btn btn-icon btn-danger mr-1 waves-effect waves-light delCat" data-id="' + row.Id + '"><i class="feather icon-trash"></i></button>';
                }
            },
        ],
        "order": [[0, "desc"]],
        "drawCallback": function () {
            var page = this.api().page.info().page + 1;
            console.log(page);
            $('.updateCat').on('click', function () {
                let dataId = $(this).data("id");
                window.location.href = 'users/edit/' + dataId;
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
                            url: "/cpanel/users/deleteuser",
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