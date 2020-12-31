<div class="row">

    <div class="col-12">
        <div class="card card-custom">
            <div class="card-header">
                <h3>Update Product</h3>
            </div>
            <!--begin::Body-->
            <div class="card-body card-dashboard">
                <form id="fr_createpro">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                       value="<?= $info['name'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Type</label>
                                <select class="form-control" id="type" name="type">
									<?php
									foreach ($listcategory as $category1):
										?>
                                        <option value="<?= $category1['id'] ?>"
											<?= $info['type'] == $category1['id'] ? "selected" : "" ?>>
											<?= $category1['value'] ?></option>
									<?php
									endforeach;
									?>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <div class="form-group">
                                <label>Size</label>
                                <select class="select2 form-control select2-hidden-accessible" multiple="" id="size"
                                        name="size[]" data-select2-id="default-select-multi" tabindex="-1"
                                        aria-hidden="true">
									<?php
									foreach ($listsize as $size1):
										?>
                                        <option value="<?= $size1['id'] ?>" <?php foreach ($sizes as $sizes1):
											if ($size1['id'] == $sizes1['size_id']) {
												echo 'selected';
											}

										endforeach;
										?>><?= $size1['value'] ?> </option>

									<?php
									endforeach;
									?>

                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Price $</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="..."
                                       value="<?= $info['price'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Price sale $</label>
                                <input type="text" class="form-control" id="price_sale" name="price_sale"
                                       placeholder="..." value="<?= $info['price_sale'] ?>">
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                <p class="mb-0">Sale</p>
                                <input type="checkbox" class="custom-control-input" id="salestatus" name="salestatus">
                                <label class="custom-control-label" for="salestatus">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-x"></i></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Manufactur</label>
                                <input type="text" class="form-control" id="manufactur" name="manufactur"
                                       placeholder="Ex: United States" value="<?= $info['manufactur'] ?>">
                            </fieldset>
                        </div>


                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Delivery</label>
                                <input type="text" class="form-control" id="delivery" name="delivery"
                                       placeholder="delivery" value="<?= $info['delivery'] ?>">
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Tag</label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="#Tag"
                                       value="<?= $info['tag'] ?>">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                       placeholder="We design products for fan" value="<?= $info['description'] ?>">
                            </fieldset>
                        </div>

                        <div class="col-xl-8 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="label-textarea">Detail description</label>
                                <textarea class="form-control" id="description_detail" name="description_detail"
                                          rows="3"
                                          placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Dolor sit amet consectetur adipiscing elit ut aliquam purus."><?= $info['description_detail'] ?></textarea>
                            </fieldset>
                        </div>

                    </div>


                </form>
            </div>
        </div>

        <!--end::Body-->
    </div>
</div>

</div>


<div class="row">
    <div class="col-3">
        <div class="card card-custom">
            <div class="card-header">
                <h4 class="card-title">Thumbnail</h4>
            </div>
            <!--begin::Body-->
            <div class="card-body card-dashboard" style="padding: 37px;">

                <div id="thumbnail">
                    <div id="previews">
                        <div class="dz-message-thumb" data-dz-message>Drop image Here To Upload (240x270)
                        </div>
                    </div>
                </div>


                <div id="tpl" style="display:none">
                    <div class="dz-preview dz-file-preview">
                        <div class="dz-thumb">

                            <img class="img-fluid w-100" data-dz-thumbnail/>
                        </div>
                        <div class="dz-trash"><span data-dz-remove></span></div>
                    </div>

                </div>

            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-9">
        <div class="card card-custom">
            <div class="card-header">
                <h4 class="card-title">Product image</h4>
            </div>
            <!--begin::Body-->
            <div class="card-body card-dashboard" id="product-img">
                <div class="dropzone dropzone-area" id="mydropzone">
                    <div class="dz-message">Drop Files Here To Upload
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>

</div>

<div class="row">
    <div class="col-12">
        <div class="card card-custom">
            <div class="card-header">
                <h4 class="card-title">Layout color</h4>
            </div>
            <!--begin::Body-->
            <div class="card-body card-dashboard">
                <div class="row">

                    <div class="col-4">
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label>Layout color</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputlayoutcolor"
                                           name="inputlayoutcolor">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label>Layout back</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputlayoutcolorback"
                                        name="inputlayoutcolorback">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label>Color</label>
                                <select class="form-control" id="color" name="color">
									<?php
									foreach ($listcolor as $color1):
										?>
                                        <option value="<?= $color1['id'] ?>" data-name="<?= $color1['value'] ?>">
											<?= $color1['value'] ?></option>
									<?php
									endforeach;
									?>
                                </select>
                            </fieldset>

                        </div>

                        <div class="col-12">
                            <fieldset class="form-group">
                                <button type="button" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"
                                        style="margin-top: 19px" id="btn-add-color">+ Color
                                </button>

                            </fieldset>

                        </div>

                    </div>

                    <div class="col-8">
                        <div id="drawtable" class="perfect"></div>
                        <table class="table dataTable">
                            <thead></thead>
                            <thead>
                            <tr>
                                <th style="width:100px" class="text-center">Front</th>
                                <th style="width:100px" class="text-center">Back</th>
                                <th class="text-center">Color</th>
                                <th style="width: 50px;">Xóa</th>
                            </tr>
                            </thead>


							<?php

							foreach ($layout as $layout1):
								?>

                                <tr>
                                    <td class="text-center"><img style="height:100px;width:100px"
                                                                 src="/download/image?name=<?= $layout1['layout'] ?>"/>
                                    </td>
                                    <td class="text-center"><img style="height:100px;width:100px"
                                                                 src="/download/image?name=<?= $layout1['back'] ?>"/>
                                    </td>
                                    <td class="text-center"><?= $layout1['value'] ?></td>
                                    <td class="text-center">X</td>
                                </tr>
							<?php
							endforeach;
							?>


                        </table>

                    </div>
                </div>
            </div>
            <!--end::Body-->

            <div class="card-footer">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"
                            id="btn-submit">Submit
                    </button>
                </div>
            </div>
        </div>
    </div>


</div>

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