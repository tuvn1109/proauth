<script>
    var fileUpload = null;
    var arrFiles = [];
    var arrImgpro = [];
    var arrDataF = [];
    var arrColor = [];
    var thumbnail = [];
    // /

    /// TAGS

    // The DOM element you wish to replace with Tagify
    var input = document.querySelector('input[name=tags]');

    // initialize Tagify on the above input node reference
    new Tagify(input)


    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument

    ///

    var minHeight = 500;
    var minWidth = 345;
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
            this.on("success", function (file, responseText) {
                console.log(file);
            });


            this.on("thumbnail", function (file) {
                if (file.height < minHeight || file.width < minWidth) {
                    this.files[0].previewElement.remove();
                    Swal.fire('Image size must be greater than or equal to 345x500', '', 'error');
                } else {
                    thumbnail.push(file);
                }
            });
            this.on("addedfile", function (file) {

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
                console.log(arrImgpro);
            });
            this.on("removedfile", function (file) {
                $.each(arrImgpro, function (keys, values) {
                    if (typeof values !== "undefined" && values.name == file.name) {
                        arrImgpro.splice(keys, 1);
                    }
                });
            });
        }
    });


    // EDITOR
    var fullEditor = new Quill('#full-container .editor', {
        bounds: '#full-container .editor',
        modules: {
            'formula': true,
            'syntax': true,
            'toolbar': [
                [{
                    'font': []
                }, {
                    'size': []
                }],
                ['bold', 'italic', 'underline', 'strike'],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'script': 'super'
                }, {
                    'script': 'sub'
                }],
                [{
                    'header': '1'
                }, {
                    'header': '2'
                }, 'blockquote', 'code-block'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }, {
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                ['direction', {
                    'align': []
                }],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ],
        },
        theme: 'snow'
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
                        '><img class="img-fluid w-100" src="/download/image?name=' + b.value + '"></div>');
                })
            },
            error: function () {
            }
        });

    });

    function test() {

    }


    $('#btn-submit').on('click', function () {

        var name = $('#name').val();
        var price = $('#price').val();

        if (name == '' || name == null) {
            $('#name').focus();
            toastr.error("Name can't empty", 'Error');
            return;
        }

        if (price == '' || price == null) {
            $('#price').focus();
            toastr.error("Price can't empty", 'Error');
            return;
        }
        if (!thumbnail[0]) {
            toastr.error("Thumbnail can't empty", 'Error');
            return;
        }
        if (arrDataF.length <= 0) {
            toastr.error("Please add color !!!", 'Error');
            return;
        }

        $(this).prop('disabled', true);
        var formData = new FormData($('#fr_createpro')[0]);
        var content = fullEditor.container.firstChild.innerHTML;
        formData.append('description', content);


        var jsoncolor = [];
        $.each(arrDataF, function (keys, values) {
            formData.append('fileUpload' + values['color'], values['front']);
            formData.append('fileUploadback' + values['color'], values['back']);
            $.each(values['images'], function (keyimg, valueimg) {
                formData.append('fileImgShow' + values['color'] + '[]', valueimg);
            });


            jsoncolor.push(values['color']);
        });

        $.each(arrImgpro, function (keys, values) {
            formData.append('fileImgPro[]', values);
        });


        formData.append('thumbnail', thumbnail[0]);
        formData.append('jsoncolor', JSON.stringify(jsoncolor));

        $.ajax({
            type: 'post',
            url: '/cpanel/product/insert',
            dataType: "json",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                if (data.stt == true) {
                    toastr.success(data.msg, 'Success');
                    window.setTimeout(function () {
                        window.location = '/cpanel/product/edit/' + data.id;
                    }, 1000);

                } else {
                    $(this).prop('disabled', false);

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
        console.log(images);
        if (images.length <= 0) {
            toastr.error('Please add photos !!!', 'Error');
            return
        }
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


    async function drawTableColor() {
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

        for (var i = arrDataF.length - 1; i >= 0; i--) {
            var val = arrDataF[i];
            // /logo/noimg.jpg
            if (val['front']) {
                var front = await getBase64(val['front']);
            } else {
                var front = '/logo/noimg.jpg';
            }
            if (val['back']) {
                var back = await getBase64(val['back']);
            } else {
                var back = '/logo/noimg.jpg';
            }
            var test = '';
            var $imagear = $('<div></div>');

            $.each(val['images'], async function (key, value) {
                var image = await getBase64(value);
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