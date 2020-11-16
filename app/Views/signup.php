<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 10 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
<head>
    <base href="../../../../">
    <meta charset="utf-8"/>
    <title>Sign Up | Keenthemes</title>
    <meta name="description" content="Singin page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="assets/css/pages/login/login-4.css" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard" id="kt_login">
        <!--begin::Content-->
        <div class="login-container d-flex flex-center flex-row flex-row-fluid order-2 order-lg-1 flex-row-fluid bg-white py-lg-0 pb-lg-0 pt-15 pb-12">
            <!--begin::Container-->
            <div class="login-content login-content-signup d-flex flex-column">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-auto flex-column px-10">
                    <!--begin::Aside header-->
                    <a href="#" class="login-logo pb-lg-4 pb-10">
                        <img src="assets/media/logos/logo-4.png" class="max-h-70px" alt=""/>
                    </a>
                    <!--end::Aside header-->
                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav pt-5 pt-lg-15 pb-10">
                        <!--begin::Wizard Steps-->

                        <!--end::Wizard Steps-->
                    </div>
                    <!--end: Wizard Nav-->
                </div>
                <!--end::Aside Top-->
                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form class="form px-10" novalidate="novalidate" id="kt_login_signup_form">
                        <!--begin: Wizard Step 1-->
                        <div class="" data-wizard-type="step-content" data-wizard-state="current">
                            <!--begin::Title-->
                            <div class="pb-10 pb-lg-12">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Create
                                    Account</h3>
                                <div class="text-muted font-weight-bold font-size-h4">Already have an Account ?
                                    <a href="/signin"
                                       class="text-primary font-weight-bolder">Sign In</a></div>
                            </div>
                            <!--begin::Title-->
                            <!--begin::Form Group-->

                            <!--end::Form Group-->
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Full name</label>
                                        <input type="text"
                                               class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                               name="fullname" placeholder="Full name" value=""/>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Phone</label>
                                        <input type="text"
                                               class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                               name="phone" placeholder="Phone number" value=""/>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Account</label>
                                        <input type="text"
                                               class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                               name="username" placeholder="Account" value=""/>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="col-xl-6">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                        <input type="email"
                                               class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                               name="email" placeholder="example@gmail.com" value=""/>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="col-xl-6">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Password</label>
                                        <input type="password"
                                               class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                               name="password" id="password" placeholder="Password" value=""/>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="col-xl-6">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Confirm
                                            password</label>
                                        <input type="password"
                                               class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                               name="Cpassword" id="Cpassword" placeholder="Confirm password" value=""/>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>

                        </div>
                        <!--end: Wizard Step 1-->

                        <!--begin: Wizard Actions-->
                        <div class="d-flex justify-content-between pt-7">
                            <div class="mr-2">
                                <button type="button"
                                        class="btn btn-light-primary font-weight-bolder font-size-h6 pr-8 pl-6 py-4 my-3 mr-3"
                                        data-wizard-type="action-prev">
										<span class="svg-icon svg-icon-md mr-2">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Left-2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<rect fill="#000000" opacity="0.3"
                                                          transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)"
                                                          x="14" y="7" width="2" height="10" rx="1"/>
													<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                                          fill="#000000" fill-rule="nonzero"
                                                          transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>Previous
                                </button>
                            </div>
                            <div>
                                <button type="submit"
                                        class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">Đăng
                                    ký
                                    <span class="svg-icon svg-icon-md ml-2">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<rect fill="#000000" opacity="0.3"
                                                          transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                                          x="7.5" y="7.5" width="2" height="9" rx="1"/>
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                          fill="#000000" fill-rule="nonzero"
                                                          transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
												</g>
											</svg>
                                        <!--end::Svg Icon-->
										</span></button>
                            </div>
                        </div>
                        <!--end: Wizard Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signin-->
            </div>
            <!--end::Container-->
        </div>
        <!--begin::Content-->
        <!--begin::Aside-->
        <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
            <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom"
                 style="background-image: url(assets/media/svg/illustrations/login-visual-4.svg);">
                <!--begin::Aside title-->
                <h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">
                    We Got
                    <br/>A Surprise
                    <br/>For You</h3>
                <!--end::Aside title-->
            </div>
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/custom/login/login-4.js"></script>
<!--end::Page Scripts-->
<script>

    $('#kt_login_signup_form').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        var password = $('#password').val();
        var Cpassword = $('#Cpassword').val();
        if (password != Cpassword) {
            alert(1);
            return;
        }
        $.ajax({
            type: 'post',
            url: '/Auth/submitsignup',
            data: formData,
            dataType: "json",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.stt == true) {
                    window.location.assign('/');
                }
                //makeSAlert(data,5000);
                //$("#catlist").load(location.href + " #catlist");
                //$("#noti").html(data);
                //window.setTimeout(function(){location.reload()},1000);
            }
        }); //End Ajax
    }); //End submit
</script>
</body>
<!--end::Body-->
</html>