<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">
    <link rel="shortcut icon" type="image/x-icon" href="/logo/life-logo.png">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/tour/tour.css">

    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">

    <!-- END: Page CSS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" href="/assets/css/animate.min.css"/>
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/owlcarousel/assets/owl.theme.default.min.css">

    <link href="/main.css" rel='stylesheet'>

</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top  navbar  navbar-light">
    <a class="navbar-branch logo" href="/">
        <img src="/logo/life-logo.png">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item form-inline my-2 my-lg-0">
                <div class="search-icon">
                    <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2"
                         fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <circle cx="11" cy="11" r="8" style="border: 2px solid #9A9999"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65" style="border: 2px solid #9A9999"></line>
                    </svg>
                </div>
                <form action="/search">
                    <input class="mr-sm-2" type="search" id="search-input" name="texts"
                           placeholder="Search for items, brands and inspiration..." aria-label="Search"
                           value="<?= isset($_GET['texts']) ? $_GET['texts'] : '' ?>">
                </form>
            </li>


            <li class="nav-item form-inline menudesktop">
                <div class="favourite-icon"><a href="/favourite"><img src="/logo/heart-logo.png">
                        <div class="favourite-num">
                            <span></span></div>
                    </a>
                </div>

                <div class="cart-icon ml-1"><a href="/cart"><img src="/logo/cart-logo.png"></a></div>
                <div class="cart-text "><a href="/cart">Cart: <?= isset($cart) ? count($cart) : 0 ?></a></div>
            </li>

            <div id="menutest">
				<?php
				foreach ($menu as $val):
					?>
                    <li class="nav-item form-inline mt-1">
                        <div class="text-menu"><a href="/<?= $val['slug'] ?>"><span><?= $val['value'] ?></span></a>
                        </div>
                    </li>
				<?php
				endforeach;
				?>
            </div>
            <li class="nav-item form-inline divsignin">
				<?php
				if (isset($user)) {
					if ($user) {
						?>
                        <a href="/account">
                            <div class="avatar-user" style="padding-right: 17px"><img
                                        src="/logo/man-logo.png">
                            </div>
                        </a> <a href="/account">
                            <div class="name-user"><span>Hello,</span>&nbsp;<?= $user['fullname'] ?>    </div>

                        </a>&nbsp;&nbsp;&nbsp;
                        <a href="/auth/logout" style="color: #000000"><i class="fad fa-sign-out-alt"></i></a>
						<?php
					} else {

					}
				} else {
					?>
                    <div class="btn-signinup"><a href="javascript:void(0)" data-toggle="modal"
                                                 data-target="#signinModel">Sign In</a> | <a href="javascript:void(0)"
                                                                                             data-toggle="modal"
                                                                                             data-target="#signupModel">Sign
                            Up</a></div>
					<?php
				}
				?>
            </li>
        </ul>

    </div>
</nav>

<div class="space-navbar">
    <div class="row">
        <div class="col-md-2 col-lg-2" id="explore">
            <section class="main-menu ">
                <div class="title-menu">Explore</div>
                <div class="details-menu">
					<?php
					foreach ($menu as $val):
						?>
                        <li>
                            <div class="text-menu"><a href="/<?= $val['slug'] ?>"><img
                                            src="/download/image?name=<?= $val['icon'] ?>"><span><?= $val['value'] ?></span></a>
                            </div>
                        </li>
					<?php
					endforeach;
					?>

                    <li>
                        <div class="text-menu"><a href="#"><img
                                        src="/logo/collection-logo.png"><span>Collection</span></a></div>
                    </li>

                    <li>
                        <div class="text-menu"><a href="#"><img src="/logo/sale-logo.png"><span>Sale
                                        Off</span></a></div>
                    </li>
                    <li>
                        <div class="text-menu"><a href="#"><img src="/logo/trackorder-logo.png"><span>Track
                                        Order</span></a></div>
                    </li>
                    <li>
                        <div class="text-menu"><a href="#"><img
                                        src="/logo/faq-logo.png"><span>FAQs</span></a></div>
                    </li>
                    <li id="helpcenter">
                        <div class="text-menu"><a href="#"><img src="/logo/help-logo.png"><span>Help
                                        Center</span></a></div>
                    </li>
                    <li>
                        <div class="text-menu">
                            <p>© Copyright 2020 - <span
                                        style="color: #f37061;margin-left: 0px !important;">Life.</span></p>
                        </div>
                    </li>
                </div>
            </section>

        </div>
        <div class="col-md-12 col-lg-10">
			<?= view($temp, $this->data) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-sm-10 col-12">
            <section id="signup-save">
                <div class="row">
                    <div class="col-12  d-flex justify-content-center">
                        <span class="title-category">Sign up and save</span>
                    </div>
                    <div class="col-12  d-flex justify-content-center">
                            <span class="sub-title-category">Get all the latest information on Events, Sales and
                                Offers.</span>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <input id="input-mail-sub" type="text" placeholder="Enter your email here...">
                        <button id="input-sub" type="button">SUBSCRIBE</button>
                    </div>
                </div>
            </section>


            <section id="photo-fr-cus">
                <div class="row">
                    <div class="col-12">
                        <span class="title">Photos from customers</span>
                    </div>
                    <div class="col-12 d-flex justify-content-center" id="photo">
                        <div class="owl-carousel">
                            <div><img src="/logo/bestsell1.jpg" class="img-fluid"></div>
                            <div><img src="/logo/tshirt1.png" class="img-fluid"></div>
                            <div><img src="/logo/bestsell1.jpg" class="img-fluid"></div>
                            <div><img src="/logo/tshirt1.png" class="img-fluid"></div>
                            <div><img src="/logo/bestsell1.jpg" class="img-fluid"></div>
                            <div><img src="/logo/tshirt1.png" class="img-fluid"></div>
                            <div><img src="/logo/bestsell1.jpg" class="img-fluid"></div>
                            <div><img src="/logo/tshirt1.png" class="img-fluid"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="footer">
                <div class="row center d-flex justify-content-center">
                    <div class="col">
                        <span class="text">TERM</span>
                    </div>
                    <div class="col">
                        <span class="text">POLICY</span>
                    </div>
                    <div class="col-3">
                        <span><img src="/logo/pay-logo.png" class="img-fluid"></span>
                    </div>
                    <div class="col">
                        <span class="text">ABOUT US</span>
                    </div>
                    <div class="col">
                        <span class="text">SHIPPING</span>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
<div class="modal fade" id="signinModel" tabindex="-1" role="dialog" aria-labelledby="signinModel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sign In</h5>
            </div>
            <div class="modal-body">
                <form id="kt_login_signin_form">
                    <fieldset
                            class="form-label-group form-group position-relative has-icon-left">
                        <input type="text" class="form-control" id="username"
                               name="username"
                               placeholder="Username" required>
                        <div class="form-control-position">
                            <i class="fal fa-user"></i>
                        </div>
                        <label for="user-name">Username</label>
                    </fieldset>

                    <fieldset class="form-label-group position-relative has-icon-left">
                        <input type="password" class="form-control" id="password"
                               name="password"
                               placeholder="Password" required>
                        <div class="form-control-position">
                            <i class="fal fa-lock-alt"></i>
                        </div>
                        <label for="user-password">Password</label>
                    </fieldset>
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <div class="text-left">
                            <fieldset class="checkbox">
                                <div class="vs-checkbox-con vs-checkbox-primary">
                                    <input type="checkbox">
                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                    <span class="">Remember me</span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="text-right"><a href="auth-forgot-password.html"
                                                   class="card-link">Forgot Password?</a>
                        </div>
                    </div>
                    <a href="javascript:void(0)"
                       class="btn btn-outline-primary float-left btn-inline" id="signup_bk">Register</a>
                    <button type="submit" class="btn btn-primary float-right btn-inline"
                            id="kt_login_signin_submit">
                        SIGN IN
                    </button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="signupModel" tabindex="-1" role="dialog" aria-labelledby="signupModel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">SIGN UP</h5>
            </div>
            <div class="modal-body">
                <form id="kt_login_signup_form">
                    <div class="form-label-group">
                        <input type="text" id="fullname" name="fullname"
                               class="form-control"
                               placeholder="Full Name" required>
                        <label for="inputName">Name</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="phone" name="phone"
                               class="form-control"
                               placeholder="Phone" required>
                        <label for="inputName">Phone</label>
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="email" name="email" class="form-control"
                               placeholder="Email" required>
                        <label for="inputEmail">Email</label>
                    </div>
                    <div class="form-label-group">
                        <input type="password" id="password" name="password"
                               class="form-control"
                               placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                    </div>
                    <div class="form-label-group">
                        <input type="password" id="cpassword" name="cpassword"
                               class="form-control"
                               placeholder="Confirm Password" required>
                        <label for="inputConfPassword">Confirm Password</label>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <fieldset class="checkbox">
                                <div class="vs-checkbox-con vs-checkbox-primary">
                                    <input type="checkbox" checked>
                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                    <span class=""> I accept the terms & conditions.</span>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <a href="javascript:void(0)"
                       class="btn btn-outline-primary float-left btn-inline mb-50" id="signin_bk">Login</a>
                    <button type="submit" id="kt_login_signup_submit"
                            class="btn btn-primary float-right btn-inline mb-50">
                        Register
                    </button>
                </form>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script src="/owlcarousel/owl.carousel.min.js"></script>
<script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="/assets/plugins/share/jquery.c-share.js"></script>
<script src="/assets/plugins/star/starrr.js"></script>
<?php
echo view($temp . '_js', $this->data);
echo view('layout_js', $this->data);
?>

</body>

</html>