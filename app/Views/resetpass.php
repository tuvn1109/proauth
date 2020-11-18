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
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&amp;l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8"/>
    <title>Reset password</title>
    <meta name="description" content="Login page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="/assets/css/pages/login/classic/login-1.css?v=7.1.5" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="/assets/plugins/global/plugins.bundle.css?v=7.1.5" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.1.5" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/style.bundle.css?v=7.1.5" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="/assets/css/themes/layout/header/base/light.css?v=7.1.5" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/themes/layout/header/menu/light.css?v=7.1.5" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/themes/layout/brand/dark.css?v=7.1.5" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/themes/layout/aside/dark.css?v=7.1.5" rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="/assets/media/logos/favicon.ico"/>
    <!-- Hotjar Tracking Code for keenthemes.com -->
    <script>(function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {hjid: 1070954, hjsv: 6};
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');</script>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->

        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
            <!--begin::Content header-->
            <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
            </div>
            <!--end::Content header-->
            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
                <!--begin::Signin-->
                <div class="login-form login-signin">
                    <div class="text-center mb-10 mb-lg-20">
                        <h3 class="font-size-h1">RESET PASSWORD</h3>
                        <p class="text-muted font-weight-bold">Enter your new password</p>
                    </div>
					<?php


					if ($data['check'] == 1) {
						if ($data['action'] == 0) {
							?>
                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" id="kt_resetpass_form">
                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                                           placeholder="New password" name="password" autocomplete="off"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                                           placeholder="Confirm new password" name="cpassword" autocomplete="off"/>
                                </div>
                                <!--begin::Action-->
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="hidden"
                                       name="code"
                                       value="<?= $data['code'] ?>"/>
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="hidden"
                                       name="email"
                                       value="<?= $data['email'] ?>"/>
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="hidden"
                                       name="idforget" value="<?= $data['Id'] ?>"/>
                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center"
                                     style="text-align: center">
                                    <button type="button" id="kt_reset_submit"
                                            class="btn btn-primary font-weight-bold px-9 py-4 my-3">Reset
                                    </button>
                                </div>
                                <!--end::Action-->
                            </form>
                            <!--end::Form-->
							<?php
						} else {
							?>
                            <div class="form-group " style="margin-bottom: 5000px;text-align: center">&nbsp;
                                <p style="font-size: 18px">PHIÊN LÀM VIỆC ĐÃ ĐƯỢC SỬ DỤNG</p>
                            </div>
							<?php
						}
					} else {
						?>
                        <div class="form-group" style="margin-bottom: 5000px;text-align: center">&nbsp;
                            <p style="font-size: 18px">KHÔNG TỒN TẠI</p>
                        </div>
						<?php
					}

					?>
                </div>
                <!--end::Signin-->

            </div>
            <!--end::Content body-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<script>var HOST_URL = "/metronic/theme/html/tools/preview";</script>
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
<script src="/assets/plugins/global/plugins.bundle.js?v=7.1.5"></script>
<script src="/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.1.5"></script>
<script src="/assets/js/scripts.bundle.js?v=7.1.5"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script>
    "use strict";

    // Class Definition
    var KTLogin = function () {
        var _login;

        var _showForm = function (form) {
            var cls = 'login-' + form + '-on';
            var form = 'kt_login_' + form + '_form';

            _login.removeClass('login-forgot-on');
            _login.removeClass('login-signin-on');
            _login.removeClass('login-signup-on');

            _login.addClass(cls);

            KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
        }

        var _handleResetForm = function (e) {
            var validation;
            var form = KTUtil.getById('kt_resetpass_form');

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                form,
                {
                    fields: {
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'The new password is required'
                                }
                            }
                        },
                        cpassword: {
                            validators: {
                                notEmpty: {
                                    message: 'The new password confirmation is required'
                                },
                                identical: {
                                    compare: function () {
                                        return form.querySelector('[name="password"]').value;
                                    },
                                    message: 'The password and its confirm are not the same'
                                }
                            }
                        },
                        agree: {
                            validators: {
                                notEmpty: {
                                    message: 'You must accept the terms and conditions'
                                }
                            }
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            $('#kt_reset_submit').on('click', function (e) {
                e.preventDefault();
                validation.validate().then(function (status) {
                    if (status == 'Valid') {
                        var formData = new FormData($('#kt_resetpass_form')[0]);
                        $.ajax({
                            type: 'post',
                            url: '/Auth/submitreset',
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
                    } else {

                    }
                });
            });


        }


        // Public Functions
        return {
            // public functions
            init: function () {
                _handleResetForm();
            }
        };
    }();

    // Class Initialization
    jQuery(document).ready(function () {
        KTLogin.init();
    });
</script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>