<script>
    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }


    toastr.options.positionClass = 'toast-bottom-right';


    // GET FEELBACK
    $.ajax({
        url: "/home/photofeelback",
        dataType: "json",
        data: {},
        type: "POST",
        success: function (data) {

        },
        error: function () {
        }
    });


    $('#kt_login_signin_submit').on('click', function (e) {
        e.preventDefault();
        var formData = new FormData($('#kt_login_signin_form')[0]);
        $.ajax({
            type: 'post',
            url: '/Auth/submitsignin',
            data: formData,
            dataType: "json",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                if (data.stt == true) {
                    toastr.success(data.msg, 'Success');
                    window.setTimeout(function () {
                        location.reload();
                    }, 1500)
                } else {
                    toastr.error(data.msg, 'Error');
                }
                //makeSAlert(data,5000);
                //$("#catlist").load(location.href + " #catlist");
                //$("#noti").html(data);
                //window.setTimeout(function(){location.reload()},1000);
            }
        }); //End Ajax
    });


    $('#kt_login_signup_submit').on('click', function (e) {
        e.preventDefault();
        var formData = new FormData($('#kt_login_signup_form')[0]);
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
                    toastr.success(data.msg, 'Success');
                    window.setTimeout(function () {
                        window.location.assign('/');
                    }, 1500)
                } else {
                    toastr.error(data.msg, 'Error');
                }
            }
        }); //End Ajax

    });

    $('#signup_bk').click(function () {
        $('#signinModel').modal('hide');
        $('#signupModel').modal('show');

    });

    $('#signin_bk').click(function () {
        $('#signupModel').modal('hide');
        $('#signinModel').modal('show');
    });

    $('#input-sub').click(function () {
        var email = $('#input-mail-sub').val();
        if (!validateEmail(email)) {
            toastr.error('Please Enter Valid Email Address', 'Error');
            return;
        }
        $.ajax({
            url: "/home/subscribes",
            dataType: "json",
            data: {email: email},
            type: "POST",
            success: function (data) {
                $('#input-mail-sub').val('');
                toastr.success('Thanks for subscribing');

            },
            error: function () {
            }
        });
    });


    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 3,
            },
            600: {
                items: 5,
                nav: false
            },
            1000: {
                items: 7,
            },
        }
    });

    var owl2 = $('.owl-carousel-cus');
    owl2.owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 3,
            },
            600: {
                items: 5,
                nav: false
            },
            1000: {
                items: 7,
            },
        }
    });
    //  owl.trigger('play.owl.autoplay', [1000])


    // count FAVOURIITE
    $.ajax({
        url: "/Favourite/favouriteadd",
        dataType: "html",
        data: {},
        type: "POST",
        success: function (data) {
            $('.favourite-num span').html(data);

        },
        error: function () {
        }
    });


    // count CART
    $.ajax({
        url: "/cart/listcart",
        dataType: "html",
        data: {},
        type: "POST",
        success: function (data) {
            var number = JSON.parse(data).length;
            $('.cart-text a').html('Cart: ' + number);
        },
        error: function () {
        }
    });


    $(document).on('click', '.favourite', function () {
        var id = $(this).data('id');
        var checkf = $(this).data('fav');
        $.ajax({
            url: "/Favourite/favouriteadd",
            dataType: "html",
            data: {id: id},
            type: "POST",
            success: function (data) {
                $('.iconfavourite' + id).toggleClass('fal fas');
                $('.iconfavourite' + id).css("color", "red");
                $('.favourite-num span').html(data);
            },
            error: function () {
            }
        });


        if (checkf == 1) {
            var myobj = $("#html" + id);
            myobj.remove();
        }

    });


    var origin = window.location.origin;


    $('body').delegate('.btnShare', 'click', function () {
        var id = $(this).data('id');
        var link = $(this).data('url');
        console.log(this);
        $('.shareBlock' + id).html('');
        $('.shareBlock' + id).cShare({
                spacing: 20,
                description: 'jQuery plugin - C Share buttons...',
                showButtons: ['fb', 'line', 'twitter'],
                data: {
                    fb: {
                        fa: 'fab fa-facebook-f',
                        name: 'Fb',
                        href: (url) => {
                            var urla = origin + link;
                            return `https://www.facebook.com/sharer.php?u=${urla}`
                        },
                        show: true
                    },

                }
            },
        );

    });
</script>
