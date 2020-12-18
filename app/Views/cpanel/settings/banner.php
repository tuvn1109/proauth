<div class="card card-custom">
    <!--begin::Body-->
    <div class="card-header"><h3>Banner</h3></div>
    <div class="card-body">
		<?php
		$info = array_column($banner, 'value', 'filed');
		?>

        <div class="tab-content">
            <form id="form_update_home">
                <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                    <div class="row">
                        <div class="col-xl-2 col-md-6 col-12 mb-1">
							<?php
							if ($info['image3']) {
								?>
                                <img src="/download/image?name=<?= $info['image1'] ?>" class="rounded mr-75 w-100"
                                     alt="profile image" height="64" width="64">
								<?php
							}
							?>
                        </div>
                        <div class="col-xl-2 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Image 1</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image1">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-xl-2 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Link image 1</label>
                                <input type="text" class="form-control" id="basicInput" placeholder="https://example.vn/"
                                       name="image1_link" value="">
                            </fieldset>
                        </div>

                        <div class="col-xl-2 col-md-6 col-12 mb-1">
							<?php
							if ($info['image3']) {
								?>
                                <img src="/download/image?name=<?= $info['image2'] ?>" class="rounded mr-75 w-100"
                                     alt="profile image" height="64" width="64">
								<?php
							}
							?>
                        </div>
                        <div class="col-xl-2 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Image 2</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image2">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xl-2 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Link image 2</label>
                                <input type="text" class="form-control" id="basicInput" placeholder="https://example.vn/"
                                       name="image2_link" value="">
                            </fieldset>
                        </div>

                        <div class="col-xl-2 col-md-6 col-12 mb-1">
							<?php
							if ($info['image3']) {
								?>
                                <img src="/download/image?name=<?= $info['image3'] ?>" class="rounded mr-75 w-100"
                                     alt="profile image" height="64" width="64">
								<?php
							}
							?>
                        </div>
                        <div class="col-xl-2 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Image 3</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image3">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xl-2 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Link image 3</label>
                                <input type="text" class="form-control" id="basicInput" placeholder="https://example.vn/"
                                       name="image3_link" value="">
                            </fieldset>
                        </div>


                        <div class="col-xl-2 col-md-6 col-12 mb-1">
							<?php
							if ($info['image4']) {
								?>
                                <img src="/download/image?name=<?= $info['image4'] ?>" class="rounded mr-75 w-100"
                                     alt="profile image" height="64" width="64">
								<?php
							}
							?>
                        </div>
                        <div class="col-xl-2 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Image 4</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image4">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xl-2 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Link image 4</label>
                                <input type="text" class="form-control" id="basicInput" placeholder="https://example.vn/"
                                       name="image4_link" value="">
                            </fieldset>
                        </div>


                        <div class="col-xl-2 col-md-6 col-12 mb-1">
							<?php
							if ($info['image5']) {
								?>
                                <img src="/download/image?name=<?= $info['image5'] ?>" class="rounded mr-75 w-100"
                                     alt="profile image" height="64" width="64">
								<?php
							}
							?>
                        </div>
                        <div class="col-xl-2 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Image 5</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image5">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xl-2 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Link image 5</label>
                                <input type="text" class="form-control" id="basicInput" placeholder="https://example.vn/"
                                       name="image5_link" value="">
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Text</label>
                                <input type="text" class="form-control" id="basicInput" placeholder="text selling"
                                       name="textsell" value="<?= $info['textsell'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Text 1</label>
                                <input type="text" class="form-control" id="basicInput" placeholder="text 1"
                                       name="text1"
                                       value="<?= $info['text1'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Text 2</label>
                                <input type="text" class="form-control" id="basicInput" placeholder="text 2"
                                       name="text2"
                                       value="<?= $info['text2'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Text 3</label>
                                <input type="text" class="form-control" id="basicInput" placeholder="text 3"
                                       name="text3"
                                       value="<?= $info['text3'] ?>">
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <hr>
                        </div>

                    </div>
                    <div class="row">


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