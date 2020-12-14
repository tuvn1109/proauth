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
foreach($listcategory as $category1):
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
                               foreach($listsize as $size1):
                                   ?>
                                    <option value="<?=$size1['id']?>" <?php foreach($sizes as $sizes1):
if($size1['id'] == $sizes1['size_id']){ echo 'selected';}

                                    endforeach;
                                    ?>><?=$size1['value']?> </option>

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
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="#Tag" value="<?=$info['tag']?>">
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

                            <img class="img-fluid w-100" data-dz-thumbnail />
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
                                <label>Color</label>
                                <select class="form-control" id="color" name="color">
                                    <?php
                               foreach($listcolor as $color1):
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
                                <label>Type</label>
                                <select class="form-control" id="typelayout" name="typelayout">
                                   
                                    <option value="front">Front</option>
                                    <option value="back">Back</option>
                                   
                                </select>
                            </fieldset>

                        </div>
                        <div class="col-12">
                            <fieldset class="form-group">
                                <button type="button" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"
                                    style="margin-top: 19px" id="btn-add-color">+ Color</button>

                            </fieldset>

                        </div>

                    </div>

                    <div class="col-8">
                        <div id="drawtable" class="perfect"></div>
                        <table class="table dataTable">
                            <thead></thead>
                            <thead>
                                <tr>
                                    <th style="width:100px" class="text-center">Layout</th>
                                    <th class="text-center">Color</th>
                                    <th style="width: 50px;">Xóa</th>
                                </tr>
                            </thead>


                            <?php 
                        
foreach($layout as $layout1):
    ?>

                            <tr>
                                <td class="text-center"><img style="height:100px;width:100px"
                                        src="/download/image?name=<?=$layout1['layout']?>" /></td>
                                <td class="text-center"><?=$layout1['value']?></td>
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
                        id="btn-submit">Submit</button>
                </div>
            </div>
        </div>
    </div>


</div>