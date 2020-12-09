<script>

    var updateId = null;
    const catTable = $('#Table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/cpanel/color/loaddata",
            "data": function (d) {
                d.page = 1;
                console.log(d);
            }
        },
        "columns": [
            {"data": "id"},
            {"data": "value"},
            {"data": "code", render: function (data, type, row) {
                    return '<div style="background-color:'+row.code+';border-radius: 500px;width:40px;height:40px">&nbsp;</div>';
                }
                
                },
            {
                "data": "", render: function (data, type, row) {
                    return '<button type="button" class="btn btn-icon btn-primary mr-1 waves-effect waves-light updateCat" data-code="' + row.code + '"  data-name="' + row.value + '" data-id="' + row.id + '"><i class="feather icon-edit"></i></button><button type="button" class="btn btn-icon btn-danger mr-1 waves-effect waves-light delCat" data-id="' + row.id + '"><i class="feather icon-trash"></i></button>';
                }
            },
        ],
        "order": [[0, "desc"]],
        "drawCallback": function () {
            $('.updateCat').on('click', function () {
                let dataId = $(this).data("id");
                let dataName = $(this).data("name");
                let dataCode = $(this).data("code");

                $('#edittype #id').val(dataId);
                $('#edittype #value').val(dataName);
                $('#edittype #code').val(dataCode);
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
                            url: "/cpanel/color/delete",
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
            url: '/cpanel/color/insert',
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
            url: '/cpanel/color/edit',
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