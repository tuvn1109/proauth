<div class="card card-custom">
    <div class="card-header">
        <button type="button" class="btn btn-outline-primary  waves-effect waves-light" data-toggle="modal"
                data-target="#default"><span><i class="feather icon-plus"></i> Add New</span></button>
    </div>
    <!--begin::Body-->
    <div class="card-body card-dashboard">
        <div class="table-responsive">
            <table class="table" id="Table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Body-->
</div>

<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Add product type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="all" action="#">
                    <div class="row" style="margin-top: 20px">
                        <div class="col-12">
                            <fieldset class="form-label-group">
                                <input type="text" class="form-control" id="value" name="value"
                                       placeholder="Name type">
                                <label for="Name type">Name type</label>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Icon</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="iconcate" name="iconcate">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"
                        id="addprotype">Add
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="edittype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Edit product type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="alledit" action="">
                    <div class="row" style="margin-top: 20px">
                        <div class="col-12">
                            <input type="hidden" class="form-control" id="id" name="id">
                        </div>
                        <div class="col-12">
                            <fieldset class="form-label-group">
                                <input type="text" class="form-control" id="value" name="value"
                                       placeholder="Name type">
                                <label for="Name type">Name type</label>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label for="basicInputFile">Icon</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="iconcateup" name="iconcate">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"
                        id="editrotype">Edit
                </button>
            </div>
        </div>
    </div>
</div>