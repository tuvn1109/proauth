<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard store</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.css">

    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">

    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/quill.bubble.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/tour/tour.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/form-file-uploader.min.css">
    <!-- END: Page CSS-->
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css"/>

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/plugins/tagify/tagify.css">
    <link rel="stylesheet" type="text/css"
          href="/assets/plugins/editable/bootstrap4-editable/css/bootstrap-editable.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<?php
$user = $_SESSION['user'];
?>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                        class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icon-menu-->
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="Todo"><i
                                        class="ficon feather icon-check-square"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="Chat"><i
                                        class="ficon feather icon-message-square"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="Email"><i class="ficon feather icon-mail"></i></a>
                        </li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="Calendar"><i
                                        class="ficon feather icon-calendar"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i
                                        class="ficon feather icon-star warning"></i></a>
                            <div class="bookmark-input search-input">
                                <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="form-control input" type="text" placeholder="Explore Vuexy..."
                                       tabindex="0" data-search="template-list">
                                <ul class="search-list search-list-bookmark"></ul>
                            </div>
                            <!-- select.bookmark-select-->
                            <!--   option Chat-->
                            <!--   option email-->
                            <!--   option todo-->
                            <!--   option Calendar-->
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                                                       id="dropdown-flag" href="#"
                                                                       data-toggle="dropdown" aria-haspopup="true"
                                                                       aria-expanded="false"><i
                                    class="flag-icon flag-icon-us"></i><span
                                    class="selected-language">English</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"
                                                                                      data-language="en"><i
                                        class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#"
                                                                                          data-language="fr"><i
                                        class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"
                                                                                         data-language="de"><i
                                        class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#"
                                                                                         data-language="pt"><i
                                        class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                    </li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                    class="ficon feather icon-search"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                            <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
                                   data-search="template-list">
                            <div class="search-input-close"><i class="feather icon-x"></i></div>
                            <ul class="search-list search-list-main"></ul>
                        </div>
                    </li>

                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                           data-toggle="dropdown"><i
                                    class="ficon feather icon-bell"></i><span
                                    class="badge badge-pill badge-primary badge-up">..</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">Order New</h3><span
                                </div>
                            </li>
                            <li class="scrollable-container media-list"><a class="d-flex justify-content-between"
                                                                           href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i
                                                    class="feather icon-plus-square font-medium-5 primary"></i></div>
                                        <div class="media-body">
                                            <h6 class="primary media-heading">You
                                                have new order!</h6><small
                                                    class="notification-text"> Check now?</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name text-bold-600"><?= $user['fullname'] ?></span><span
                                        class="user-status">Available</span></div>
                            <span><img class="round" src="/app-assets/images/portrait/small/avatar-s-11.jpg"
                                       alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                          href="page-user-profile.html"><i
                                        class="feather icon-user"></i> Edit Profile</a><a class="dropdown-item"
                                                                                          href="app-email.html"><i
                                        class="feather icon-mail"></i> My Inbox</a><a class="dropdown-item"
                                                                                      href="app-todo.html"><i
                                        class="feather icon-check-square"></i> Task</a><a class="dropdown-item"
                                                                                          href="app-chat.html"><i
                                        class="feather icon-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/auth/logout"><i class="feather icon-power"></i>
                                Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Files</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="/app-assets/images/icons/xls.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                        Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;17kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="/app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;11kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="/app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                        Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;150kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="/app-assets/images/icons/doc.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;256kb</small>
        </a></li>
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Members</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="/app-assets/images/portrait/small/avatar-s-8.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="/app-assets/images/portrait/small/avatar-s-1.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="/app-assets/images/portrait/small/avatar-s-14.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                        Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="/app-assets/images/portrait/small/avatar-s-6.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <div class="brand-logo"><a class="navbar-brand"
                                           href="http://192.168.1.3/logo/life-logo.png"></div>
                <h2 class="brand-text mb-0">Life.</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="<?= $menu == 'home' ? 'active ' : '' ?> nav-item"><a href="/cpanel"><i
                            class="feather icon-home"></i><span class="menu-title">Dashboard</span></a>
            </li>
            <li class="<?= $menu == 'orders' ? 'active ' : '' ?> nav-item"><a href="/cpanel/orders"><i
                            class="feather icon-clipboard"></i><span class="menu-title">Order management</span></a>
            </li>
            <li class=" navigation-header"><span>Product</span>
            </li>
            <li class="<?= $menu == 'createproduct' ? 'active ' : '' ?> nav-item"><a href="/cpanel/product/create"><i
                            class="feather icon-plus-circle"></i><span class="menu-title">Create product</span></a>
            </li>
            <li class="<?= $menu == 'product' ? 'active ' : '' ?> nav-item"><a href="/cpanel/product"><i
                            class="feather icon-menu"></i><span class="menu-title">Products</span></a>
            </li>
            <li class="<?= $menu == 'feelback' ? 'active ' : '' ?> nav-item"><a href="/cpanel/feelback"><i
                            class="fal fa-comment-dots"></i><span class="menu-title">Feelbacks</span></a>
            </li>
            <li class="<?= $menu == 'properties' ? 'active ' : '' ?> nav-item"><a href="/cpanel/properties"><i
                            class="feather icon-codepen"></i><span class="menu-title">Properties</span></a>
            </li>
            <li class="<?= $menu == 'category' ? 'active ' : '' ?> nav-item"><a href="/cpanel/category"><i
                            class="feather icon-clipboard"></i><span class="menu-title">Categories</span></a>
            </li>
            <li class="<?= $menu == 'sizes' ? 'active ' : '' ?> nav-item"><a href="/cpanel/size"><i
                            class="feather icon-maximize-2"></i><span class="menu-title">Sizes</span></a>
            </li>
            <li class="<?= $menu == 'colors' ? 'active ' : '' ?> nav-item"><a href="/cpanel/color"><i
                            class="feather icon-aperture"></i><span class="menu-title">Colors</span></a>
            </li>
            <li class="<?= $menu == 'coupon' ? 'active ' : '' ?> nav-item"><a href="/cpanel/coupon"><i
                            class="fad fa-ticket"></i><span class="menu-title">Coupon</span></a>
            </li>
            <li class=" navigation-header"><span>Delivery</span>
            </li>
            <li class="<?= $menu == 'shippingmethod' ? 'active ' : '' ?> nav-item"><a href="/cpanel/shippingmethod"><i
                            class="fas fa-truck"></i><span class="menu-title">Shipping method</span></a>
            </li>

            <li class=" navigation-header"><span>Settings</span>
            </li>
            <li class="<?= $menu == 'users' ? 'active ' : '' ?> nav-item"><a href="/cpanel/users"><i
                            class="feather icon-user"></i><span class="menu-title">Users</span></a>
            </li>
            <li class="<?= $menu == 'page' ? 'active ' : '' ?> nav-item"><a href="/cpanel/page"><i
                            class="far fa-pager"></i><span class="menu-title">Page</span></a>
            </li>
            <li class="<?= $menu == 'homesetting' ? 'active ' : '' ?> nav-item"><a href="/cpanel/settings/home"><i
                            class="fa fa-home"></i><span class="menu-title">Home settings</span></a>
            </li>
            <li class="<?= $menu == 'bannersetting' ? 'active ' : '' ?> nav-item"><a href="/cpanel/settings/banner"><i
                            class="fa fa-picture-o"></i><span class="menu-title">Banner settings</span></a>
            </li>
            <li class="<?= $menu == 'email' ? 'active ' : '' ?> nav-item"><a href="/cpanel/email"><i
                            class="feather icon-mail"></i><span class="menu-title"
                                                                data-i18n="Email">Email settings</span></a>
            </li>
            <li class="<?= $menu == 'subscribes' ? 'active ' : '' ?> nav-item"><a href="/cpanel/subscribes"><i
                            class="fal fa-ad"></i><span class="menu-title"
                                                        data-i18n="subscribes">Subscribes</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
			<?= view($temp, $this->data) ?>
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a
                    class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio"
                    target="_blank">Pixinvent,</a>All rights Reserved</span><span
                class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
<script src="/app-assets/vendors/js/extensions/dropzone.min.js"></script>
<script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>

<!-- END: Page Vendor JS-->
<script src="/app-assets/vendors/js/editors/quill/katex.min.js"></script>
<script src="/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
<script src="/app-assets/vendors/js/editors/quill/quill.min.js"></script>
<script src="/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>

<!-- BEGIN: Theme JS-->
<script src="/app-assets/js/core/app-menu.js"></script>
<script src="/app-assets/js/core/app.js"></script>
<script src="/app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<script src="/app-assets/js/scripts/datatables/datatable.js"></script>
<script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="/app-assets/js/scripts/forms/select/form-select2.js"></script>
<script src="/assets/plugins/tagify/jQuery.tagify.min.js"></script>
<script src="/assets/plugins/editable/bootstrap4-editable/js/bootstrap-editable.min.js"></script>
<!-- END: Page JS-->
<?php
echo view($temp . '_js', $this->data);
?>
<script>
    $(function () {
        countOd();
    });

    function countOd() {
        $.ajax({
            url: "/cpanel/orders/count",
            dataType: "json",
            data: {},
            type: "POST",
            success: function (data) {
                $('span.badge-up').html(data);
                $('.media-heading').html('You have ' + data + ' new order!');
            },
            error: function () {
            }
        });
    }
</script>
</body>
<!-- END: Body-->

</html>