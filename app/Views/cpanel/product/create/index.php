<div class="row">

    <div class="col-12">
        <div class="card card-custom">
            <div class="card-header">
                <h3>Create Product <i class="fa fa-heart-o"></i></h3>
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
									foreach ($listcategory as $category1):
										?>
                                        <option value="<?= $category1['id'] ?>"><?= $category1['value'] ?></option>
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
                                        <option value="<?= $size1['id'] ?>"><?= $size1['value'] ?>
                                        </option>

									<?php
									endforeach;
									?>

                                </select>
                            </div>
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

                        <div class="col-xl-2 col-12 mb-1">
                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                <p class="mb-0">Sale</p>
                                <input type="checkbox" class="custom-control-input" id="salestatus" name="salestatus">
                                <label class="custom-control-label" for="salestatus">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-x"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-2 col-12 mb-1">
                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                <p class="mb-0">Bestselling</p>
                                <input type="checkbox" class="custom-control-input" id="bestselling" name="bestselling">
                                <label class="custom-control-label" for="bestselling">
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
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="#Tag">
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Flash sale</label>
                                <input type="date" class="form-control" id="date_end_flash" name="date_end_flash" value="">
                            </fieldset>
                        </div>
                    </div>
                    <!-- <div class="row">

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

					 </div>-->
                    <div class="row">

                        <div class="col-12">
                            <fieldset class="form-group">
                                <label for="label-textarea">Description</label>
                                <div id="full-container">
                                    <div class="editor"></div>
                                </div>
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
                <div class="row text-center">
                    <div class="col-sm-12 dropzone" id="thumbnail_panel">
                        <div class="dz-message" data-dz-message><small class="text-muted">Drop image Here To Upload (
                                min 345x500 )
                                image here</small>
                        </div>
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
                <div class="row">

                    <div class="col-4">
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label>Layout front</label>
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
									foreach ($color as $color1):
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
                        <div class="dropzone" id="imageproduct">
                            <div class="dz-message" data-dz-message><small class="text-muted">Drop Files Here To Upload</small>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div id="drawtable" class="perfect"></div>
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
            <!--begin::Body-->
            <div class="card-body card-dashboard">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"
                            id="btn-submit">Submit
                    </button>
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>


</div>