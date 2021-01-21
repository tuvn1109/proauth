<section id="order">
    <div class="row">
        <div class="col-12">
            <h3>Order history</h3>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-12">
            <div class="payment-info">
                <div class="row">
                    <div class="col-12">
                        <table id="bang1" class="table table-bordered table-striped table-hover text-center">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Order code</th>
                                <th>Date</th>
                                <th>Total price</th>
                                <th>Shipping address</th>
                                <th>Shipping method</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							$i = 0;

							foreach ($list as $val):
								$i++;
								?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $val['order_code'] ?></td>
                                    <td><?= $val['order_date'] ?></td>
                                    <td><?= $val['order_price'] ?> $</td>
                                    <td><?= $val['order_address'] ?></td>
                                    <td><?= $val['name'] ?></td>
                                    <td>Done</td>
                                    <td>
                                        <div class="detail-order" data-id="<?= $val['order_id'] ?>"><i
                                                    class="far fa-info-circle" data-toggle="modal" data-target="#ModalCenter"></i></div>
                                    </td>
                                </tr>
							<?php
							endforeach;
							?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>

                        <script>
                            $(function () {
                               // $('#bang1').DataTable();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Order detail</h5>
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
