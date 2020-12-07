

<div class="row">
<div class="col-3">
<div class="card card-custom">
    <div class="card-header">
    <h4 class="card-title">Properties</h4>
    </div>
    <!--begin::Body-->
    <div class="card-body card-dashboard">
    <ul class="list-group list-group-flush">

    <?php

foreach($listProperties as $item):
?>
                                            
                                        <li class="list-group-item" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>"><?= $item['name'] ?>
                                            <span class="badge badge-pill bg-primary float-right">4</span>
                                        </li>
                                        <?php
    endforeach;
    ?>
                                    </ul>

    </div>
    <!--end::Body-->
</div>
</div>
<div class="col-9">
<div class="card card-custom">
    <div class="card-header">
    </div>
    <!--begin::Body-->
    <div class="card-body card-dashboard">
    <div id="divve" class="d-inline-flex"></div>
 
<input type="text" value="[]" id="json" >

    </div>
    <!--end::Body-->
</div>
</div>

</div>
