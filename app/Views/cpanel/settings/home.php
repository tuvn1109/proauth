<div class="card card-custom">
    <!--begin::Body-->
    <div class="card-header"><h5>Home page</h5></div>
    <div class="card-body">
		<?php
		$info = array_column($data, 'value', 'filed');
		?>

        <div class="tab-content">
            <form id="form_update_home">
                <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" class="form-control" id="basicInput" placeholder="title" name="title"
                                       value="<?= $info['title'] ?>">
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">LOGO</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1" style="">
                            <img src="/logo/life-logo.png" style="width: 86px;height: 36px;">
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12 mb-1 d-flex">
                            <h5>Section Best Selling</h5>
                            <div class="custom-control custom-switch custom-switch-success ml-1 mr-2 mb-1">
                                <input type="checkbox" class="custom-control-input" id="section1"
                                       name="section1" <?= $info['section1'] == 'on' ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="section1">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12 mb-1 d-flex">
                            <h5>Section banner text</h5>
                            <div class="custom-control custom-switch custom-switch-success ml-1 mr-2 mb-1">
                                <input type="checkbox" class="custom-control-input" id="section2"
                                       name="section2" <?= $info['section2'] == 'on' ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="section2">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12 mb-1 d-flex">
                            <h5>Section category 1</h5>
                            <div class="custom-control custom-switch custom-switch-success ml-1 mr-2 mb-1">
                                <input type="checkbox" class="custom-control-input" id="section3"
                                       name="section3" <?= $info['section3'] == 'on' ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="section3">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Title</label>
                                <input type="text" class="form-control" id="section_category1_title"
                                       placeholder="text selling"
                                       name="section_category1_title" value="<?= $info['section_category1_title'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Limit number</label>
                                <input type="text" class="form-control" id="section_category1_limit"
                                       placeholder="limit number show"
                                       name="section_category1_limit" value="<?= $info['section_category1_limit'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="select2 form-control select2-hidden-accessible" multiple=""
                                        id="section_category1_type" name="section_category1_type[]"
								<?php
								foreach ($listcategory as $listcategory1):
									?>
                                    <option value="<?= $listcategory1['id'] ?>" <?php
									foreach (json_decode($info['section_category1_type'], true) as $item) {
										if ($listcategory1['id'] == $item) {
											echo 'selected';
										}
									}
									?>><?= $listcategory1['value'] ?> </option>
								<?php
								endforeach;
								?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">View link</label>
                                <input type="text" class="form-control" id="section_category1_view"
                                       placeholder="https://example.vn/"
                                       name="section_category1_view" value="<?= $info['section_category1_view'] ?>">
                            </fieldset>
                        </div>

                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12 mb-1 d-flex">
                            <h5>Section banner</h5>
                            <div class="custom-control custom-switch custom-switch-success ml-1 mr-2 mb-1">
                                <input type="checkbox" class="custom-control-input" id="section4"
                                       name="section4" <?= $info['section4'] == 'on' ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="section4">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12 mb-1 d-flex">
                            <h5>Section category 2</h5>
                            <div class="custom-control custom-switch custom-switch-success ml-1 mr-2 mb-1">
                                <input type="checkbox" class="custom-control-input" id="section5"
                                       name="section5" <?= $info['section5'] == 'on' ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="section5">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12 mb-1 d-flex">
                            <h5>Section banner 2</h5>
                            <div class="custom-control custom-switch custom-switch-success ml-1 mr-2 mb-1">
                                <input type="checkbox" class="custom-control-input" id="section6"
                                       name="section6" <?= $info['section6'] == 'on' ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="section6">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Title</label>
                                <input type="text" class="form-control" id="section_category2_title"
                                       placeholder="text selling"
                                       name="section_category2_title" value="<?= $info['section_category2_title'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Limit number</label>
                                <input type="text" class="form-control" id="section_category2_limit"
                                       placeholder="limit number show"
                                       name="section_category2_limit" value="<?= $info['section_category2_limit'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="select2 form-control select2-hidden-accessible" multiple=""
                                        id="section_category2_type" name="section_category2_type[]"
								<?php
								foreach ($listcategory as $listcategory1):
									?>
                                    <option value="<?= $listcategory1['id'] ?>" <?php
									foreach (json_decode($info['section_category2_type'], true) as $item) {
										if ($listcategory1['id'] == $item) {
											echo 'selected';
										}
									}
									?>><?= $listcategory1['value'] ?> </option>
								<?php
								endforeach;
								?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">View link</label>
                                <input type="text" class="form-control" id="section_category1_view"
                                       placeholder="https://example.vn/"
                                       name="section_category1_view" value="<?= $info['section_category1_view'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12 mb-1 d-flex">
                            <h5>Section feelback</h5>
                            <div class="custom-control custom-switch custom-switch-success ml-1 mr-2 mb-1">
                                <input type="checkbox" class="custom-control-input" id="section7"
                                       name="section7" <?= $info['section7'] == 'on' ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="section7">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12 mb-1 d-flex">
                            <h5>Section picture fr customers</h5>
                            <div class="custom-control custom-switch custom-switch-success ml-1 mr-2 mb-1">
                                <input type="checkbox" class="custom-control-input" id="section8"
                                       name="section8" <?= $info['section8'] == 'on' ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="section8">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12 mb-1 d-flex">
                            <h5>Section 9</h5>
                            <div class="custom-control custom-switch custom-switch-success ml-1 mr-2 mb-1">
                                <input type="checkbox" class="custom-control-input" id="section9"
                                       name="section9" <?= $info['section9'] == 'on' ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="section9">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-primary mr-2" id="btnUpdateHome">Update</button>
                </div>
            </div>
        </div>

        <!--end::Body-->
    </div>