<script>
    var fileUpload = null;
    var arrFiles = [];
    var arrImgpro = [];
    var arrDataF = [];
    var arrColor = [];
    var thumbnail = [];
    var arrImgproDelete = [];
    // /

    /// TAGS

    // The DOM element you wish to replace with Tagify
    var input = document.querySelector('input[name=tags]');

    // initialize Tagify on the above input node reference
    new Tagify(input)


    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument

    ///
    var origin = window.location.origin;
    var url = window.location.href;
    var segments = url.split('/');
    var id = segments[6];


    console.log(id);
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#previews", {
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 1,
        url: '#',
        uploadMultiple: false,
        acceptedFiles: 'image/*',
        autoProcessQueue: false,
        addRemoveLinks: true,
        dictRemoveFile: " Trash",
        thumbnailWidth: null,
        thumbnailHeight: null,
        previewTemplate: document.querySelector('#tpl').innerHTML,
        previewsContainer: "#previews", // Define the container to display the previews
        init: function () {

            this.on("addedfile", function (file) {
                thumbnail.push(file);

            });
            this.on("removedfile", function (file) {
                $.each(arrFiles, function (keys, values) {
                    if (typeof values !== "undefined" && values.name == file.name) {
                        thumbnail.splice(keys, 1);
                    }
                });
            });
        }
    });


    var myDropzone2 = new Dropzone("div#mydropzone", {
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 3,
        url: '#',
        uploadMultiple: false,
        acceptedFiles: 'image/*',
        autoProcessQueue: false,
        addRemoveLinks: true,
        dictRemoveFile: " Trash",
        thumbnailWidth: null,
        thumbnailHeight: null,
        init: function () {
            this.on("addedfile", function (file) {
                arrImgpro.push(file);

            });
            this.on("removedfile", function (file) {
                console.log(file);
                arrImgproDelete.push(file.name);

                $.each(arrImgpro, function (keys, values) {
                    if (typeof values !== "undefined" && values.name == file.name) {
                        arrImgpro.splice(keys, 1);
                    }
                });

                console.log(arrImgproDelete);

            });
        }
    });


    $.ajax({
        url: "/cpanel/product/loadimage",
        data: {
            id: id
        },
        dataType: "json",
        type: "POST",
        success: function (data) {
            var mockFile = {
                name: data['thumb'][0],
                size: 12345
            };
            var urll = origin + '/download/image?name=product/' + id + '/thumb/' + data['thumb'][0];
            myDropzone.options.addedfile.call(myDropzone, mockFile);
            myDropzone.options.thumbnail.call(myDropzone, mockFile, urll);

            $.each(data.image, function (keys, values) {
                var mockFile = {
                    name: values,
                    size: 12345
                };
                var urll = origin + '/download/image?name=product/' + id + '/image/' + values;
                console.log(keys + '--' + values);

                myDropzone2.options.addedfile.call(myDropzone2, mockFile);
                myDropzone2.options.thumbnail.call(myDropzone2, mockFile, urll);
            });

        }
    });


    $('.list-group-item').on('click', function () {
        let dataId = $(this).data("id");
        let dataName = $(this).data("name");
        var json = $.parseJSON($('#json').val());
        var oj = {
            name: dataName,
            id: dataId
        };
        json.push(oj);
        console.log(json);


        $('#json').val(JSON.stringify(json));
        $.ajax({
            url: "/cpanel/createproduct/loaddetail",
            data: {
                id: dataId
            },
            dataType: "json",
            type: "POST",
            success: function (data) {
                $("#divve").empty();
                $.each(data, function (a, b) {
                    $("#divve").append('<div class="properties-img" data-id=' + b.id +
                        '><img class="img-fluid w-100" src="/download/image?name=' + b
                            .value + '"></div/>');
                })
            },
            error: function () {
            }
        });

    });

    function test() {

    }


    $('#btn-submit').on('click', function () {
        var formData = new FormData($('#fr_createpro')[0]);
        $.each(arrDataF, function (keys, values) {
            formData.append('fileUpload' + values['color'], values['file']);

        });
        console.log(arrImgpro);
        formData.append('fileImgPro[]', '');
        $.each(arrImgpro, function (keys, values) {
            formData.append('fileImgPro[]', values);
        });

        formData.append('thumbnail', thumbnail[0]);
        formData.append('test', JSON.stringify(arrDataF));
        formData.append('id', id);
        formData.append('arrDelete', JSON.stringify(arrImgproDelete));

        $.ajax({
            type: 'post',
            url: '/cpanel/product/update',
            dataType: "json",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                if (data.stt == true) {
                    toastr.success(data.msg, 'Success');
                } else {
                    toastr.error('Error , try agian', 'Error');
                    // toastr.success(data.msg, 'Error');
                }
            }
        });
    });

    $('#btn-add-color').on('click', function () {
        var reader = new FileReader();
        var color = $('#color').val();
        let name = $('select#color').find(':selected').data('name');
        var f = $("#inputlayoutcolor")[0].files[0];
        var type = $("#typelayout").val();
        var oj = {
            'file': f,
            'color': color,
            'colortext': name,
            'type': type,
        }
        arrDataF.push(oj);
        drawTableColor();
    });

    async function drawTableColor() {
        $("#drawtable").empty();
        var $table = $('<table class="table dataTable"><thead></thead></table>');
        var $linethed = $("<thead></thead>");
        var $line = $("<tr></tr>");
        $line.append($('<th style="width:100px" class="text-center">Layout</th>'));
        $line.append($('<th class="text-center">Type</th>'));
        $line.append($('<th class="text-center">Color</th>'));
        $line.append($('<th style="width: 50px;">Xóa</th>'));
        $linethed.append($line);
        $table.append($linethed);

        for (var i = arrDataF.length - 1; i >= 0; i--) {
            var val = arrDataF[i];
            var lin = await getBase64(val['file']);
            var $line = $("<tr></tr>");
            $line.append($("<td class='text-center'></td>").html('<img style="height:100px;width:100px" src="' + lin +
                '">'));
            $line.append($("<td class='text-center'></td>").html(val['type']));
            $line.append($("<td class='text-center'></td>").html(val['colortext']));
            $line.append($("<td></td>").html('<i class="feather icon-x" onclick="deletelayout(' + i + ')"></i>'));
            $table.append($line);

        }
        $table.appendTo($("#drawtable"));

    }


    function getBase64(file) {

        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });

    }

    function deletelayout(i) {
        arrDataF.splice(i, 1);
        drawTableColor();
        console.log(arrDataF);
    }
</script>