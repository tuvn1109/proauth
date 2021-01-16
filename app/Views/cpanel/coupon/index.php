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
                    <th>Code</th>
                    <th>Discount</th>
                    <th>Expiration date</th>
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
                <h4 class="modal-title" id="myModalLabel1">Add coupon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="all" action="#">
                    <div class="row" style="margin-top: 20px">
                        <div class="col-12">
                            <fieldset class="form-label-group">
                                <input type="text" class="form-control" id="code" name="code"
                                       placeholder="">
                                <label>Code</label>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <fieldset class="form-label-group">
                                <input type="text" class="form-control" id="discount" name="discount"
                                       placeholder="">
                                <label>Discount</label>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-label-group">
                                <input type="date" class="form-control" id="date" name="date">
                                <label>Expiration date</label>

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
                                <input type="text" class="form-control" id="code" name="code"
                                       placeholder="Ex: XXL..">
                                <label>Code</label>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-label-group">
                                <input type="text" class="form-control" id="discount" name="discount"
                                       placeholder="20">
                                <label>Discount</label>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-group">
                                <input type="date" class="form-control" id="date" name="date">
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