<script>
    var fileUpload = null;
    var arrFiles = [];

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#mydropzone", {
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 100,
        url: '#',
        uploadMultiple: false,
        acceptedFiles: 'image/*',
        autoProcessQueue: false,
        addRemoveLinks: true,
        dictRemoveFile: " Trash",
        init: function () {
            this.on("addedfile", function (file) {
                arrFiles.push(file);

            });
            this.on("removedfile", function (file) {
                $.each(arrFiles, function (keys, values) {
                    if (typeof values !== "undefined" && values.name == file.name) {
                        arrFiles.splice(keys, 1);
                    }
                });
            });
        }
    });

    var updateId = null;
    const catTable = $('#Table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/cpanel/properties/loaddata",
            "data": function (d) {
                d.page = 1;
            }
        },
        "columns": [
            {"data": "id"},
            {"data": "name"},
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
                            url: "/cpanel/properties/delete",
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


    $('#btn-addnew').on("click", function () {
        $('#divaddnew').toggle('slow');
    });
    $('#addproperties').on("click", function () {
        var formData = new FormData($('#all')[0]);
        var namepro = $('#value').val();
        if (namepro == '' || namepro == null) {
            toastr.error('Name properties null', 'Error');
            return;
        }
        $.each(arrFiles, function (keys, values) {
            formData.append('fileUpload[]', values);
        });
        $.ajax({
            type: 'post',
            url: '/cpanel/properties/insert',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#divaddnew').toggle('slow');
                $('#value').val('');
                myDropzone.removeAllFiles();
                catTable.ajax.reload(null, false);
            }
        })
    });
</script>