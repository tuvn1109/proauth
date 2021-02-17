<div class="row">

    <div class="col-12">
        <div class="card card-custom">
            <div class="card-header">
                <h3>Create Page <i class="fa fa-heart-o"></i></h3>
            </div>
            <!--begin::Body-->
            <div class="card-body card-dashboard">
                <form id="fr_create">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </fieldset>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicSelect">Layout</label>
                                <select class="form-control" id="layout" name="layout">
                                    <option value="1">Vertical Menu</option>
                                    <option value="2">Horizontal Menu</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="help-center">
                            </fieldset>
                        </div>

                        <div class="col-xl-1 col-md-6 col-12 mb-1">
                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                <p class="mb-0">Menu</p>
                                <input type="checkbox" class="custom-control-input" id="menu" name="menu">
                                <label class="custom-control-label" for="menu">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-x"></i></span>
                                </label>
                            </div>
                        </div>


                        <div class="col-xl-1 col-md-6 col-12 mb-1">
                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                <p class="mb-0">Shows</p>
                                <input type="checkbox" class="custom-control-input" id="shows" name="shows">
                                <label class="custom-control-label" for="shows">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-x"></i></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div id="full-container">
                                <div class="editor"></div>
                            </div>

                        </div>
                        <div class="col-12">

                        </div>

                    </div>

                </form>
            </div>
        </div>

        <!--end::Body-->
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