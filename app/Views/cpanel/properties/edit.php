<div class="card card-custom">
    <!--begin::Body-->
    <div class="card-body card-dashboard">
        <div class="row" style="margin-top: 20px">
            <div class="col-3">
                <fieldset class="form-label-group">
                    <input type="text" class="form-control" id="value" name="value" value="<?= $info['name'] ?>"
                           placeholder="Name properties">
                    <label for="Properties">Properties</label>
                </fieldset>
            </div>
            <div class="col-12">


            </div>

            <div class="col-6">
                <div class="dropzone dropzone-area dz-clickable" id="mydropzone">
                    <div class="dz-message">Drop Files Here To Upload
                    </div>
                </div>
            </div>
            <div class="col-6">
				<?php
				foreach ($detail as $detail1):
					?>
                    <div class="image-preview">
                        <div class="detail">
                            <div class="detail-thumb"></div>
                            <div class="detail-size"></div>
                            <img src="<?= WRITEPATH ?>uploads\properties11\hair5.jpg">
                        </div>
                    </div>
				<?php
				endforeach;
				?>
            </div>

            <div class="col-12">
                <hr>
            </div>
            <div class="col-12" style="margin-top: 20px">
                <button type="button" class="btn btn-primary waves-effect waves-light" id="addproperties">Add
                </button>
            </div>
        </div>
    </div>
    <!--end::Body-->
</div>