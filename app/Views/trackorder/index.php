<style>
    .divtrack {
        border-radius: 8px;
        padding: 15px 30px;
        border: 1px solid #DDD;
        background-color: #FFFFFF;
    }


</style>
<div class="row">
    <div class="col-12">
        <div class="divtrack">
            <div class="row">
                <div class="col-12 d-flex justify-content-center"><h2>TRACK ORDER</h2>
                </div>
                <div class="col-3">
                    <fieldset class="form-group">
                        <label for="roundText">Order code</label>
                        <input id="input-trackod" class="form-control round input-yellow" type="text"
                               placeholder="Ex : 11202101172444...">
                    </fieldset>
                </div>
                <div class="col-3">
                    <fieldset class="form-group">
                        <label for="roundText">Email</label>
                        <input id="input-mail" class="form-control round input-yellow" type="text"
                               placeholder="Ex : Example@gmail.com">
                    </fieldset>
                </div>
                <div class="col-2">
                    <button type="button" class="w-100 btn btn-danger mt-1" id="trackod">TRACK YOUR ORDER</button>
                </div>
            </div>
            <div id="drawtrack" class="mt-2"></div>
        </div>
    </div>
</div>