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
    <!-- END: Page CSS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" href="/assets/css/animate.min.css"/>
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
    <link href="/main.css" rel='stylesheet'>

</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top  navbar  navbar-light">
    <div class="container-fluid">


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
                    <input class="mr-sm-2" type="search" id="search-input"
                           placeholder="Search for items, brands and inspiration..." aria-label="Search">
                </li>

            </ul>
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item form-inline" style="padding-right: 33px">
                    <div class="favourite-icon"><a href="/favourite"><img src="/logo/heart-logo.png">
                            <div class="favourite-num"><span></span></div>
                        </a>
                    </div>
                </li>
                <li class="nav-item form-inline" style="padding-right: 9px">
                    <div class="cart-icon"><a href="/order"><img src="/logo/cart-logo.png"></a></div>
                </li>
                <li class="nav-item form-inline" style="padding-right: 46px">
                    <div class="cart-text"><a href="/order">Cart: <?= isset($cart) ? count($cart) : 0 ?></a></div>

                </li>

                <li class="nav-item form-inline " style="padding-right: 17px">
					<?php
					if (isset($user)) {
						if ($user) {
							?>
                            <div class="avatar-user" style="padding-right: 17px"><img
                                        src="/logo/man-logo.png">
                            </div>
                            <div class="name-user"><span>Hello,</span>&nbsp;<?= $user['fullname'] ?> &nbsp;&nbsp;&nbsp;
                                <a href="/auth/logout" style="color: #000000"><i class="fad fa-sign-out-alt"></i></a>
                            </div>
							<?php
						} else {
							?>
							<?php
						}
					} else {
						?>
                        <div class="btn-signinup"><a href="/auth">Sign In</a> | <a href="/auth/signup">Sign Up</a></div>
						<?php
					}
					?>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="space-navbar container-fluid">
    <div class="row">
        <div class="col-2">
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
        <div class="col-10">
			<?= view($temp, $this->data) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
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
                            <div><img src="http://proauth.com/logo/bestsell1.jpg" class="img-fluid"></div>
                            <div><img src="http://proauth.com/logo/tshirt1.png" class="img-fluid"></div>
                            <div><img src="http://proauth.com/logo/bestsell1.jpg" class="img-fluid"></div>
                            <div><img src="http://proauth.com/logo/tshirt1.png" class="img-fluid"></div>
                            <div><img src="http://proauth.com/logo/bestsell1.jpg" class="img-fluid"></div>
                            <div><img src="http://proauth.com/logo/tshirt1.png" class="img-fluid"></div>
                            <div><img src="http://proauth.com/logo/bestsell1.jpg" class="img-fluid"></div>
                            <div><img src="http://proauth.com/logo/tshirt1.png" class="img-fluid"></div>
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
<script src="owlcarousel/owl.carousel.min.js"></script>
<script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
<?php
echo view($temp . '_js', $this->data);
?>

<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 7,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true
    });
    owl.trigger('play.owl.autoplay', [1000])
</script>
</body>

</html>