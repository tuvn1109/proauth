<section id="order">

    <div class="row">
        <div class="col-12">
            <h3>Account information</h3>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-12">

            <div class="payment-info">

                <form id="form_contact">
                    <div class="row">
                        <div class="col-3">
                            <div class="div-gender   centerContent <?= isset($user) && $user['gender'] == 'female' ? 'active-gender' : '' ?>"
                                 data-gender="female">

                                <img src="/download/image?name=category/5/girl-logo.png"> Mrs
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="div-gender centerContent <?= isset($user) && $user['gender'] == 'male' ? 'active-gender' : '' ?>"
                                 data-gender="male">
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
                    <div class="row ">
                        <div class="col-12">
                            <span data-toggle="modal"
                                  data-target="#exampleModalCenter"><i><u>Change password</u></i></span>
                        </div>
                    </div>
                    <div style="display: none">
                        <input type="text" name="id" id="id" value="<?= isset($user) ? $user['id'] : '' ?>">
                        <input type="text" name="gender" id="gender" value="<?= isset($user) ? $user['gender'] : '' ?>">
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn_save_acc">SAVE
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>


    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_password">
                    <div class="row">
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label for="roundText">Current password</label>
                                <input type="password" id="currentpassword" name="currentpassword"
                                       class="form-control round input-yellow" value="" placeholder="Current password">
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label for="roundText">New password</label>
                                <input type="password" id="newpassword" name="newpassword"
                                       class="form-control round input-yellow"
                                       value="" placeholder="Password">
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label for="roundText">Confirm</label>
                                <input type="password" id="confirm" name="confirm"
                                       class="form-control round input-yellow"
                                       value="" placeholder="Confirm">
                            </fieldset>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-change-pass">Change password</button>
            </div>
        </div>
    </div>
</div>