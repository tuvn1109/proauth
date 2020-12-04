<div class="card card-custom transition-none" id="divaddnew" style="display: none">
    <!--begin::Body-->
    <div class="card-body card-dashboard">
        <form action="#" id="all">

            <div class="row" style="margin-top: 20px">
                <div class="col-3">
                    <fieldset class="form-label-group">
                        <input type="text" class="form-control" id="value" name="value"
                               placeholder="Name properties">
                        <label for="Properties">Properties</label>
                    </fieldset>
                </div>
                <div class="col-12">
                    <div class="dropzone dropzone-area" id="mydropzone">
                        <div class="dz-message">Drop Files Here To Upload
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <hr>
                </div>
                <div class="col-12" style="margin-top: 20px">
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="addproperties">Add
                    </button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">

            </div>
        </div>

    </div>
    <!--end::Body-->
</div>
<div class="card card-custom">
    <div class="card-header">
        <button type="button" class="btn btn-outline-primary  waves-effect waves-light" id="btn-addnew"><span><i class="feather icon-plus"></i> Add New</span></button>
    </div>
    <!--begin::Body-->
    <div class="card-body card-dashboard">

        <div class="table-responsive">
            <table class="table" id="Table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
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
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Add properties</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

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
    <div class="modal-dialog modal-dialog-scrollable   modal-xl" role="document">
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