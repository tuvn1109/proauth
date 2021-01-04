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
            return;
            $.each(data.image, function (keys, values) {
                var mockFile = {
                    name: values,
                    size: 12345
                };
                var urll = origin + '/download/image?name=product/' + id + '/image/' + values;
                myDropzone2.options.addedfile.call(myDropzone2, mockFile);
                myDropzone2.options.thumbnail.call(myDropzone2, mockFile, urll);
            });

        }
    });
    $('#div-btn-add-color').on('click', '#btn-edit-color', function () {
        $('#div-btn-add-color').html('<fieldset class="form-group"><button type="button" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light" style="margin-top: 19px" id="btn-edit-color">+ Color</button></fieldset>');
        myDropzone2.removeAllFiles(true);
        console.log('tess');
        toastr.success('', 'Success');

    });
    $('.btn-edit-color').on('click', function () {
        myDropzone2.removeAllFiles(true);
        let id = $(this).data("id");
        let idcolor = $(this).data("color");
        let idpro = $(this).data("idpro");
        $.ajax({
            url: "/cpanel/product/loadimagecolor",
            data: {
                id: id
            },
            dataType: "json",
            type: "POST",
            success: function (data) {
                $.each(data.image, function (keys, values) {
                    var mockFile = {
                        name: values,
                        size: 12345
                    };
                    var urll = origin + '/download/image?name=product/' + idpro + '/image/' + idcolor + '/' + values;
                    console.log(urll);
                    myDropzone2.emit('addedfile', mockFile);
                    myDropzone2.emit('thumbnail', mockFile, urll);
                    myDropzone2.files.push(mockFile);
                });

                $('#color').val(idcolor).trigger("chosen:updated")
                $('#div-btn-add-color').html('<fieldset class="form-group"><button type="button" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light" style="margin-top: 19px" id="btn-edit-color">+ Edit</button></fieldset>');
            }
        });
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
    drawTableColorJSON()

    async function drawTableColorJSON() {
        var arrJson = $('#jsoncolor').val();
        console.log(arrJson)
        $("#drawtable").empty();
        var $table = $('<table class="table dataTable"><thead></thead></table>');
        var $linethed = $("<thead></thead>");
        var $line = $("<tr></tr>");
        $line.append($('<th  class="text-center">Image</th>'));
        $line.append($('<th  class="text-center">Front</th>'));
        $line.append($('<th class="text-center">Back</th>'));
        $line.append($('<th class="text-center">Color</th>'));
        $line.append($('<th style="width: 50px;">Xóa</th>'));
        $linethed.append($line);
        $table.append($linethed);
        for (var i = arrJson.length - 1; i >= 0; i--) {
            var val = arrJson[i];
            var front = await getBase64('/download/image?name=' + val['layout']);
            var back = await getBase64('/download/image?name=' + val['back']);
            var test = '';
            var $imagear = $('<div></div>');

            $.each(val['images'], async function (key, value) {
                var image = await getBase64('/download/image?name=product/' + val['product_id'] + '/image/' + val['color_id'] + '/' + value);
                var a = $('<img style="height:100px;width:100px;margin-left: 10px" src="' + image + '">');
                $imagear.append(a);

            });
            var $line = $("<tr></tr>");
            $line.append($("<td class='text-center'></td>").html($imagear));
            $line.append($("<td class='text-center'></td>").html('<img style="height:100px;width:100px" src="' + front +
                '">'));
            $line.append($("<td class='text-center'></td>").html('<img style="height:100px;width:100px" src="' + back +
                '">'));

            $line.append($("<td class='text-center'></td>").html(val['colortext']));
            $line.append($("<td></td>").html('<i class="feather icon-x" onclick="deletelayout(' + i + ')"></i>'));
            $table.append($line);

        }
        $table.appendTo($("#drawtable"));

    }

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