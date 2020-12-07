<!DOCTYPE HTML >
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">


    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->
    <link href="/mainpro.css" rel='stylesheet'>
    <link href="/app-assets/css/bootstrap.css" rel='stylesheet'>
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top  navbar  navbar-light">
    <div class="container-fluid">

        <a class="navbar-branch logo" href="#">
            <img src="/logo/life-logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-3  d-flex justify-content-center ">
                <li class="nav-item mr-1">
                    <div class="item-menu active-menu"><span>T-Shirts</span></div>
                </li>
                <li class="nav-item  mr-1">
                    <div class="item-menu "><span>Mug</span></div>
                </li>
                <li class="nav-item  mr-1">
                    <div class="item-menu  "><span>Phone Case</span></div>

                </li>
                <li class="nav-item  mr-1">
                    <div class="item-menu  "><span>Sale Off</span></div>

                </li>
                <li class="nav-item  mr-1">
                    <div class="item-menu"><span>Track Order</span></div>
                </li>
                <li class="nav-item">
                    <div class="item-menu"><span>FAQs</span></div>
                </li>

                <li class="nav-item">
                    <div class="item-menu">
                        <div class="search-icon">
                            <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <circle cx="11" cy="11" r="8" style="border: 2px solid #9A9999"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"
                                      style="border: 2px solid #9A9999"></line>
                            </svg>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <input class="mr-sm-2" type="search" id="search-input"
                           placeholder="Search for items, brands and inspiration..." aria-label="Search">
                </li>

            </ul>
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item form-inline mr-1">
                    <div class="favourite-icon"><img src="/logo/heart-logo.png"></div>
                </li>
                <li class="nav-item form-inline mr-1">
                    <div class="cart-icon"><img src="/logo/cart-logo.png"></div>
                </li>
                <li class="nav-item form-inline mr-1">
                    <div class="cart-text">Cart: 2</div>

                </li>
                <li class="nav-item form-inline mr-1">
                    <div class="avatar-user"><img
                                src="https://s3-alpha-sig.figma.com/img/a897/b22c/eb9b17bd52cfeedd5bace94f3fb287dc?Expires=1607299200&Signature=Xm7BiSGXJDBDUn9Q2~tkAzPHfynZKXK~kaKqkSZpC3O63KyRwvjTp7kJr5MilKNMUWVTBYIjuYuRPSwA0JZoeb5e6Dq8xtQz0OfcJBktASwtEAxlpw5KA6ikN7idPu1JCLIsC9pNeZMv6B15r54r9hli29Tp5lQ3of-zXWx~Im7yzqZk3LHNiX6PKtRVlUoti4UbcILNxnOnRMwPF6rOJuCZeTkYQDOeuViHFP2QjzyEXoNngGgOMziwe2YJjeJuaFsNzyZqQ3antdZZJ4q4Tsikm3hywgusKaVV8JKFOOst4qhzXrH4uH1nddoSVhOtZJABt4pnh3ul7FDYrLxx9A__&Key-Pair-Id=APKAINTVSUGEWH5XD5UA">
                    </div>
                </li>

                <li class="nav-item form-inline ">
                    <div class="name-user">HELLE, ADMIN</div>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class="space-navbar container">
    <div class="row">
        <div class="col-12">
			<?= view($temp, $this->data) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <section id="signup-save">
                <div class="row">
                    <div class="col-12  d-flex justify-content-center">
                        <span class="title-category">Sign up and save</span>
                    </div>
                    <div class="col-12  d-flex justify-content-center">
                        <span class="sub-title-category">Get all the latest information on Events, Sales and Offers.</span>
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
<script>
    $(document).ready(function () {

        $(".owl-carousel").owlCarousel({
            nav: true,
            loop: true,
            items: 1,
            margin: 0,
            stagePadding: 0,
            autoplay: false,
            navClass: ['btn-up', 'btn-down'],
            navContainerClass: ['owl-nav-pro'],
        });

        dotcount = 1;

        $('.owl-dot').each(function () {
            $(this).addClass('dotnumber' + dotcount);
            $(this).attr('data-info', dotcount);
            dotcount = dotcount + 1;
        });

        slidecount = 1;

        $('.owl-item').not('.cloned').each(function () {
            $(this).addClass('slidenumber' + slidecount);
            slidecount = slidecount + 1;
        });

        $('.owl-dot').each(function () {
            grab = $(this).data('info');
            slidegrab = $('.slidenumber' + grab + ' img').attr('src');
            $(this).css("background-image", "url(" + slidegrab + ")");
        });

        amount = $('.owl-dot').length;
        gotowidth = 100 / 6;
        $('.owl-dot').css("height", gotowidth + "%");
        $('.owl-dot').css("outline", "none");

    });
    $(".btn-up").html("<img src='/logo/arrowup.png'>");
    $(".owl-nav .owl-next span").html("<img src='/logo/arrowup.png' >");


    $('.owl-item').on('click', function (event) {
        var $this = $(this);
        if ($this.hasClass('clicked')) {
            $this.removeClass('clicked');
        } else {
            $('#c1').find(".clicked").removeClass('clicked');
            $this.addClass('clicked');
        }
    });


</script>
</body>
</html>