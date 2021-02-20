<div class="card card-custom">
    <div class="card-header">
    </div>
    <!--begin::Body-->
    <div class="card-body card-dashboard">
        <div class="table-responsive">
            <table class="table" id="ordersTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Order code</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total price</th>
                    <th>Payment status</th>
                    <th>Shipping address</th>
                    <th>Shipping method</th>
                    <th>Status</th>
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


<!-- Modal -->
<div class="modal fade text-left" id="modalUpdate" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Orders Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table" id="ordersTable">
                        <thead>
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Front</th>
                            <th style="text-align: center">Back</th>
                            <th style="text-align: center">Size</th>
                            <th style="text-align: center">Color</th>
                            <th style="text-align: center">Price</th>
                        </tr>
                        </thead>
                        <tbody id="drawdetail">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>