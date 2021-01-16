<section id="order">

    <div class="row">
        <div class="col-12">
            <h3>Information</h3>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-12">

            <div class="payment-info">

                <form id="form_contact">
                    <div class="row">
                        <div class="col-3">
                            <div class="div-gender active-gender  centerContent">
                                <img src="/download/image?name=category/5/girl-logo.png"> Mrs
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="div-gender centerContent">
                                <img src="/download/image?name=category/4/man-logo.png"> Mr
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-3">
                            <fieldset class="form-group">
                                <label for="roundText">Fullname</label>
                                <input type="text" id="fullname" name="fullname" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['fullname'] : '' ?>"
                                       placeholder="Alax sanderia">
                            </fieldset>
                        </div>
                        <div class="col-3">
                            <fieldset class="form-group">
                                <label for="roundText">Phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['phone'] : '' ?>" 
                                       placeholder="+1.6868.99.999">
                            </fieldset>
                        </div>
                        <div class="col-4">
                            <fieldset class="form-group">
                                <label for="roundText">Email</label>
                                <input type="text" id="email" name="email" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['email'] : '' ?>" 
                                       placeholder="example@gmail.com">
                            </fieldset>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-3">
                            <fieldset class="form-group">
                                <label for="roundText">Country</label>
                                <input type="text" id="country" name="country" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['country'] : '' ?>" 
                                       placeholder="United States">
                            </fieldset>
                        </div>
                        <div class="col-3">
                            <fieldset class="form-group">
                                <label for="roundText">City</label>
                                <input type="text" id="city" name="city" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['city'] : '' ?>" 
                                       placeholder="New York">
                            </fieldset>
                        </div>
                        <div class="col-2">
                            <fieldset class="form-group">
                                <label for="roundText">Postal Code</label>
                                <input type="text" id="postalcode" name="postalcode"
                                       value="<?= isset($user) ? $user['postalcode'] : '' ?>" 
                                       class="form-control round input-yellow"
                                       placeholder="999999">
                            </fieldset>
                        </div>
                        <div class="col-4">
                            <fieldset class="form-group">
                                <label for="roundText">Address</label>
                                <input type="text" id="address" name="address" class="form-control round input-yellow"
                                       value="<?= isset($user) ? $user['address'] : '' ?>" 
                                       placeholder="2707 Avenues Road">
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>