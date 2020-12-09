<div class="row">

    <div class="col-12">
        <div class="card card-custom">
            <div class="card-header">
                <h3>Create Product</h3>
            </div>
            <!--begin::Body-->
            <div class="card-body card-dashboard">
                <form id="fr_createpro">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Type</label>
                                <select class="form-control" id="type" name="type">
                                    <?php
foreach($category as $category1):
                            ?>
                                    <option value="<?= $category1['id'] ?>"><?= $category1['value'] ?></option>
                                    <?php
endforeach;
                                ?>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Thumbnail</label>
                                <input type="text" class="form-control" id="thumbnail" name="thumbnail" placeholder="/">
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Price $</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="...">
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Price sale $</label>
                                <input type="text" class="form-control" id="price_sale" name="price_sale"
                                    placeholder="...">
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
                                    placeholder="Ex: United States">
                            </fieldset>
                        </div>


                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Delivery</label>
                                <input type="text" class="form-control" id="delivery" name="delivery"
                                    placeholder="delivery">
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Tag</label>
                                <input type="text" class="form-control" id="tag" name="tag" placeholder="#Tag">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="We design products for fan">
                            </fieldset>
                        </div>

                        <div class="col-xl-8 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="label-textarea">Detail description</label>
                                <textarea class="form-control" id="description_detail" name="description_detail"
                                    rows="3"
                                    placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Dolor sit amet consectetur adipiscing elit ut aliquam purus."></textarea>
                            </fieldset>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Size</label>
                                <select class="select2 form-control select2-hidden-accessible" multiple=""
                                    id="default-select-multi" data-select2-id="default-select-multi" tabindex="-1"
                                    aria-hidden="true">
                                    <?php
                                foreach($size as $size1):
                                    ?>
                                    <option value="<?=$size1['id']?>"><?=$size1['value']?>
                                    </option>

                                    <?php
                                endforeach;
                                ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <fieldset class="form-group">
                                <label>Layout color</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputlayoutcolor"
                                        name="inputlayoutcolor">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-4">
                            <fieldset class="form-group">
                                <label>Color</label>
                                <select class="form-control" id="color" name="color">
                                    <?php
                                foreach($color as $color1):
                                    ?>
                                    <option value="<?= $color1['id'] ?>"><?= $color1['value'] ?></option>
                                    <?php
                                endforeach;
                                ?>
                                </select>
                            </fieldset>

                        </div>
                        <div class="col-4">
                            <fieldset class="form-group">
                                <button type="button"
                                    class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light" style="margin-top: 19px" id="btn-add-color">+ Color</button>

                            </fieldset>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <input type="text" id="jsoncolor" value="[]">
                            <hr>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"
                                id="btn-submit">Submit</button>
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
                <h4 class="card-title">Properties</h4>
            </div>
            <!--begin::Body-->
            <div class="card-body card-dashboard">
                <ul class="list-group list-group-flush">

                    <?php

foreach($listProperties as $item):
?>

                    <li class="list-group-item" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>">
                        <?= $item['name'] ?>
                        <span class="badge badge-pill bg-primary float-right">4</span>
                    </li>
                    <?php
    endforeach;
    ?>
                </ul>

            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-9">
        <div class="card card-custom">
            <div class="card-header">
            </div>
            <!--begin::Body-->
            <div class="card-body card-dashboard">
                <div id="divve" class="d-inline-flex"></div>

                <input type="text" value="[]" id="json">

            </div>
            <!--end::Body-->
        </div>
    </div>

</div>