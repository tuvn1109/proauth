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