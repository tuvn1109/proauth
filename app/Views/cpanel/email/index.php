<div class="card card-custom">
    <!--begin::Body-->
    <div class="card-body">
        <form id="form_update_email">

			<?php
			foreach ($data as $val):
				?>
                <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label"><?= ucfirst($val['filed']) ?></label>
                    <div class="col-6">
                        <input class="form-control  form-control-solid" type="text" value="<?= $val['value'] ?>"
                               id="<?= $val['filed'] ?>" name="<?= $val['filed'] ?>"/>
                    </div>
                </div>
			<?php
			endforeach;
			?>

        </form>

        <div class="row">
            <div class="col-10">
                <hr>
            </div>
            <div class="col-10">
                <button type="button" class="btn btn-primary mr-2" id="btnUpdateEmail">Update</button>
            </div>
        </div>
    </div>

    <!--end::Body-->
</div>