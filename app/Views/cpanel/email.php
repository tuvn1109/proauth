<div class="card card-custom">
    <!--begin::Header-->
    <div class="card-header flex-wrap border-0 ">
        <div class="card-title">
        </div>
        <div class="card-toolbar">
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <form id="form_update_email">
            <div class="form-group row">
                <label for="example-email-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input class="form-control" type="email" value="<?= $data['email'] ?>"
                           id="email" name="email"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-email-input" class="col-2 col-form-label">Password</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="<?= $data['password'] ?>"
                           id="password" name="password"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label">Subject</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="<?= $data['subject'] ?>" id="subject"
                           name="subject"/>
                </div>
            </div>

        </form>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-10">
                <button type="button" class="btn btn-primary mr-2" id="btnUpdateEmail">Update</button>
            </div>
        </div>
    </div>
    <!--end::Body-->
</div>