<script>
function sayHello(name, callback) {
	var myName = name.toUpperCase() + ", Hello";
    return callback(myName);
}

var result = sayHello("Khoa", function (arg) {
    return arg;
});
    var updateId = null;
    const catTable = $('#catTbl').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/cpanel/users/loaddata",
            "data": function (d) {
                d.page = 1;
                console.log(d);
            }
        },
        "columns": [
            {"data": "Id"},
            {"data": "fullname"},
            {"data": "phone"},
            {"data": "email"},
            {"data": "username"},
            {"data": "phone"},
            {"data": "status"},
            {"data": "role"},
            {
                "data": "", render: function (data, type, row) {
                    return '<button type="button" class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light updateCat" data-name="' + row.fullname + '" data-id="' + row.Id + '"><i class="feather icon-edit"></i></button><button type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light delCat" data-id="' + row.Id + '"><i class="feather icon-trash"></i></button>';
                }
            },
        ],
        "order": [[0, "desc"]],
        "drawCallback": function () {
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
                            url: "/cpanel/category/delete/" + dataId,
                            dataType: "json",
                            type: "GET",
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