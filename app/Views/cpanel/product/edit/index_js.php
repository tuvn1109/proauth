<script>
    var fileUpload = null;
    var arrFiles = [];
    var arrImgpro = [];
    var arrImgproEdit = [];

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
        //  myDropzone2.removeAllFiles(true);
        //  console.log('tess');
        //  toastr.success('', 'Success');

    });
    $('.btn-edit-color').on('click', function () {

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
        var front = $("#inputlayoutcolor")[0].files[0];
        var back = $("#inputlayoutcolorback")[0].files[0];
        var type = $("#typelayout").val();
        var images = [...arrImgpro];
        var oj = {
            'images': images,
            'front': front,
            'back': back,
            'color': color,
            'colortext': name,
            'type': type,
        }
        arrDataF.push(oj);
        drawTableColor();
        // console.log(arrDataF)
        myDropzone2.removeAllFiles(true);
    });

    drawTableColorJSON()

    function drawTableColorJSON() {
        var arrJson = JSON.parse($('#jsoncolor').val());
        $("#drawtable").empty();
        var $table = $('<table class="table dataTable"><thead></thead></table>');
        var $linethed = $("<thead></thead>");
        var $line = $("<tr></tr>");
        $line.append($('<th  class="text-center">Image</th>'));
        $line.append($('<th  class="text-center">Front</th>'));
        $line.append($('<th class="text-center">Back</th>'));
        $line.append($('<th class="text-center">Color</th>'));
        $line.append($('<th style="width: 50px;">Sửa</th>'));
        $line.append($('<th style="width: 50px;">Xóa</th>'));
        $linethed.append($line);
        $table.append($linethed);
        for (var i = arrJson.length - 1; i >= 0; i--) {
            var val = arrJson[i];
            var front = '/download/image?name=' + val['layout'];
            var back = '/download/image?name=' + val['back'];
            var test = '';
            var $imagear = $('<div></div>');

            $.each(val['images'], function (key, value) {
                var image = '/download/image?name=product/' + val['product_id'] + '/image/' + val['color_id'] + '/' + value;
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
            $line.append($("<td></td>").html('<i class="far fa-edit btn-edit-color" onclick="clickEdit(this)" data-loca="' + i + '" data-id="' + val['id'] + '" data-idpro="' + val['product_id'] + '" data-color="' + val['color_id'] + '" ></i>'));
            $line.append($("<td></td>").html('<i class="far fa-ban btn-delete-color" data-id="' + val['id'] + '" data-idpro="' + val['product_id'] + '" data-color="' + val['color_id'] + '" ></i>'));
            $table.append($line);

        }
        $table.appendTo($("#drawtable"));

    }

    var infoEdit = [];

    function clickEdit(data) {
        myDropzone2.removeAllFiles(true);
        let loca = $(data).data("loca");
        let id = $(data).data("id");
        let idcolor = $(data).data("color");
        let idpro = $(data).data("idpro");
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

                    myDropzone2.emit('addedfile', mockFile);
                    myDropzone2.emit('thumbnail', mockFile, urll);
                    myDropzone2.files.push(mockFile);
                });
                var ojinfo = {
                    'front': data.info['layout'],
                    'back': data.info['back'],
                }
                infoEdit.push(ojinfo)

                $('#color').val(idcolor).trigger("chosen:updated")
                $('#div-btn-add-color').html('<fieldset class="form-group"><button type="button" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light" onclick="ssEdit(this)" data-idpro="' + idpro + '" data-loca="' + loca + '" data-id="' + id + '" style="margin-top: 19px" id="btn-edit-color">+ Edit</button></fieldset>');

            }
        });
    }

    function ssEdit(data) {
        console.log(infoEdit);
        var front = $("#inputlayoutcolor")[0].files[0];

        if (!front) {
            var front = infoEdit[0]['front'];
        }

        var back = $("#inputlayoutcolorback")[0].files[0];
        if (!back) {
            var back = infoEdit[0]['back'];
        }
        var arrJson = JSON.parse($('#jsoncolor').val());
        let loca = $(data).data("loca");
        let id = $(data).data("id");
        let idpro = $(data).data("idpro");
        var color = $('#color').val();
        let name = $('select#color').find(':selected').data('name');
        var images = [...arrImgpro];
        var imagesedit = [...arrImgproEdit];
        arrJson.splice(loca, 1);
        $('#jsoncolor').val(JSON.stringify(arrJson));
        var oj = {
            'id': id,
            'images': images,
            'imagesedit': imagesedit,
            'front': front,
            'back': back,
            'color': color,
            'product': idpro,
            'colortext': name,
        }
        arrDataF.push(oj);
        // arrImgproEdit.push(oj);
        myDropzone2.removeAllFiles(true);
        $('#div-btn-add-color').html('<fieldset class="form-group"><button type="button" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light" style="margin-top: 19px" id="btn-edit-color">+ Color</button></fieldset>');
        console.log(arrDataF);
        drawTableColor()
    }

    async function drawTableColor() {
        var arrJson = JSON.parse($('#jsoncolor').val());
        $("#drawtable").empty();
        var $table = $('<table class="table dataTable"><thead></thead></table>');
        var $linethed = $("<thead></thead>");
        var $line = $("<tr></tr>");
        $line.append($('<th  class="text-center">Image</th>'));
        $line.append($('<th  class="text-center">Front</th>'));
        $line.append($('<th class="text-center">Back</th>'));
        $line.append($('<th class="text-center">Color</th>'));
        $line.append($('<th style="width: 50px;">Sửa</th>'));
        $line.append($('<th style="width: 50px;">Xóa</th>'));
        $linethed.append($line);
        $table.append($linethed);

        for (var i = arrJson.length - 1; i >= 0; i--) {
            var val = arrJson[i];
            var front = '/download/image?name=' + val['layout'];
            var back = '/download/image?name=' + val['back'];
            var test = '';
            var $imagear = $('<div></div>');

            $.each(val['images'], function (key, value) {
                var image = '/download/image?name=product/' + val['product_id'] + '/image/' + val['color_id'] + '/' + value;
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
            $line.append($("<td></td>").html('<i class="far fa-edit btn-edit-color" onclick="clickEdit(this)" data-id="' + val['id'] + '" data-idpro="' + val['product_id'] + '" data-color="' + val['color_id'] + '" ></i>'));
            $line.append($("<td></td>").html('<i class="far fa-ban btn-delete-color" data-id="' + val['id'] + '" data-idpro="' + val['product_id'] + '" data-color="' + val['color_id'] + '" ></i>'));
            $table.append($line);

        }


        for (var i2 = arrDataF.length - 1; i2 >= 0; i2--) {
            var val = arrDataF[i2];
            //var front = await getBase64(val['front']);
            // var back = await getBase64(val['back']);
            var $imagear = $('<div></div>');

            $.each(val['images'], async function (key, value) {
                console.log(value);
                if (value['status']) {
                    var image = await getBase64(value);
                } else {
                    var image = '/download/image?name=product/' + val['product'] + '/image/' + val['color'] + '/' + value['name'];

                }
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
            $line.append($("<td></td>").html('<i class="far fa-edit btn-edit-color" onclick="clickEdit(this)" data-id="' + val['id'] + '" data-idpro="' + val['product_id'] + '" data-color="' + val['color_id'] + '" ></i>'));
            $line.append($("<td></td>").html('<i class="far fa-ban btn-delete-color" onclick="deletelayout(' + i2 + ')"></i>'));
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