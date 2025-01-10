{{-- <html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('fav-icon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="pragma" content="no-cache" />
    @if (isset($meta_info['title']) && isset($meta_info['description']))
        <title>{{ $meta_info['title'] }}</title>
        <meta name="description" content="{{ $meta_info['description'] }}">
        @if (isset($meta_info['keyword']) && $meta_info['keyword'] != '')
            <meta name="keywords" content="{{ $meta_info['keyword'] }}">
        @endif
    @else
        <title>{{ $basic_details->company_name }}</title>
        <meta name="description" content="{{ $basic_details->company_name }}">
    @endif
    @if ($basic_details->is_index == 0)
        <meta name='robots' content='noindex, nofollow'>
    @else
        @if (isset($meta_info['is_index']) && $meta_info['is_index'] == '0')
            <meta name='robots' content='noindex, nofollow'>
        @endif
    @endif
    @if (config('global.header_scripts') != '')
        {!! config('global.header_scripts') !!}
    @endif
    <?php
    $canonicalUrl = request()->url();
    if (request()->page > 1) {
        $canonicalUrl .= '?page=' . request()->page;
        // $canonicalUrl  = $canonicalUrl . '?page=' . request()->page;
    }
    ?>
    <link rel="canonical" href="{!! $canonicalUrl !!}" />
    <div class="organization-schema">
        <script>
            @if (isset($meta_info['page_schema']) && $meta_info['page_schema'] != '')

                {!! $meta_info['page_schema'] !!}
            @endif
        </script>
    </div>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style_new.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/stylemain.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/res.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/fancybox.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/inquiry_css.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/all.css">
    <style type="text/css">
    </style>
    @yield('styles')
</head>

<body>
    <header class="main-header">
        <!-- header-top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="top-inner clearfix">
                    <div class="text left-column pull-left">
                        <h6><i class="comment-icon fas fa-comments"></i>Looking for Chemical Consulting?</h6>
                    </div>
                    <div class="right-column pull-right clearfix">
                        <ul class="info clearfix">
                            <li class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn" type="button" id="dropdownMenu3"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="fas fa-search"></i>Search</button>
                                    <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
                                        <div class="form-container">
                                            <form action="https://kozchem.com/urunler">
                                                <div class="form-group">
                                                    <input type="search" name="s" value=""
                                                        placeholder="Search...." required="">
                                                    <button type="submit" class="search-btn"><span
                                                            class="fas fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="social-links clearfix">
                            <li><a href="https://facebook.com/" title="Facebook"><i class="fab fa-facebook"></i></a>
                            </li>

                            <li><a href="https://linkedin.com/" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                            </li>

                            <li><a href="https://instagram.com/" title="İnstagram"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-lower">
            <div class="auto-container">
                <div class="outer-box clearfix">
                    <div class="menu-area pull-left clearfix">
                        <div class="logo-box pull-left">

                            <figure class="logo" style="margin-top: 10px;    width: 220px;"><a
                                    href="{{ config('app.url') }}"><img
                                        src="/uploads/images/logo/{{ $basic_details->logo }}"
                                        alt="{{ $basic_details->name }}"></a></figure>
                        </div>
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li>
                                        <a href="/">Homepage</a>
                                    </li>
                                    <li>
                                        <a href="/about-us">About Us</a>
                                    </li>


                                    <li class="dropdown">
                                        <a href="/products">Products</a>
                                        <ul>
                                            <?php
                                            $counter = 0;
                                            $headerIndustries = getTopHeaderIndustries();
                                            ?>
                                            @foreach ($headerIndustries['industries'] as $ind)
                                                @if ($ind->parent_id == 0)
                                                    <li>
                                                        <a
                                                            href="/product-category/{!! $ind->slug !!}">{!! $ind->name !!}</a>
                                                    </li>
                                                    <?php
                                                    $counter++;
                                                    ?>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="/blogs">Blog</a>
                                    </li>
                                    <li>
                                        <a href="/contact-us">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="nav-right pull-right clearfix">
                        <div class="support-box">
                            <h5><i class="fas fa-headphones"></i><span>+92 3129090823</span></h5>
                            <ul class="info-box">
                                <li>
                                    <i class="far fa-map"></i>
                                    <h6>Address</h6>
                                    <span>R-61 Sector 5A1 North Karachi., Karachi, Pakistan
                                    </span>
                                </li>
                                <li>
                                    <i class="far fa-envelope-open"></i>
                                    <h6>Email</h6>
                                    <span><a href="mailto:info@chemtexglobal.com">info@chemtexglobal.com</a></span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-header">
            <div class="auto-container">
                <div class="outer-box">
                    <div class="menu-area pull-left clearfix">
                        <div class="logo-box pull-left">
                            <figure class="logo" style="margin-top: 10px;    width: 220px;">
                                <a href="/"><img src="/uploads/images/logo/{{ $basic_details->logo }}"
                                        alt="Kozchem"></a>
                            </figure>
                        </div>
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                    <div class="nav-right pull-right clearfix">
                        <div class="support-box">
                            <h5><i class="fas fa-headphones"></i>Phone: <span>+92 3129090823</span></h5>
                            <ul class="info-box">
                                <li>
                                    <i class="far fa-map"></i>
                                    <h6>Address</h6>
                                    <span>R-61 Sector 5A1 North Karachi., Karachi, Pakistan
                                    </span>
                                </li>
                                <li>
                                    <i class="far fa-envelope-open"></i>
                                    <h6>Email</h6>
                                    <span><a href="mailto:info@chemtexglobal.com">info@chemtexglobal.com</a></span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->
    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="index-2.html"><img src="ykimg/kozchem.png"
                        alt="{{ $basic_details->name }}"></a></div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>R-61 Sector 5A1 North Karachi., Karachi, Pakistan</li>
                    <li><a href="tel:+923129090823">+92 3129090823</a></li>
                    <li><a href="mailto:info@chemtexglobal.com">info@chemtexglobal.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="https://facebook.com/" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://linkedin.com/" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="https://pinterest.com/" title="Pinterest"><i class="fab fa-pinterest"></i></a></li>
                    <li><a href="https://instagram.com/" title="İnstagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->
    <style>
        @media only screen and (min-width: 768px) {
            .image-layer video {
                width: 100%;
                height: auto;
                opacity: 0.7;
            }
        }

        /* Mobil cihazlar için */
        @media only screen and (max-width: 767px) {
            .image-layer video {
                width: auto;
                height: 100%;
            }
        }
    </style>
    <div class='clearfix'></div>
    @yield('content')
    @if (intval(request()->page) <= 1)
        @if (isset($meta_info['content']) && $meta_info['content'] != '')
            <div class="seo-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 pad0 content content-hidden">
                            {!! $meta_info['content'] !!}
                        </div>
                    </div>
                    @if (isset($showmore) && $showmore == 'yes')
                        <button class="btn btn-primary btn-toggle" id="toggleBtn">Show More</button>
                    @endif
                </div>
            </div>
        @endif
    @endif
    <footer class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ffc">
                    <div class="logo-foot">
                        <a class="logo" href="{{ config('app.url') }}"
                            title="{{ $basic_details->company_name }}">
                            <img src="/uploads/images/logo/{{ $basic_details->logo }}"
                                alt="{{ $basic_details->name }}" class="ts img-responsive"
                                alt="{{ $basic_details->name }}">
                        </a>
                    </div>
                    <div class="footer-p">
                        <p>
                            Chemtex Global was founded with a vision to revolutionize the textile chemical supply chain
                            by providing superior products and exceptional services. Over the years, we have built a
                            strong reputation for our reliability, professionalism, and commitment to excellence.
                        </p>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-12 col-md-2 col-lg-2 f4">
                    <div class="ab-ft">
                        <h4>Links</h4>
                    </div>
                    <div class="footer-menus">
                        <ul class="footer-menus-list">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about-us">About Us</a></li>
                            <li><a href="/all-products">Products</a></li>
                            <li><a href="/blogs">Blogs</a></li>
                            <li><a href="/contact-us">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-12 col-md-3 col-lg-3">
                    <div class="footer-menus">
                        <div class="ab-ft">
                            <h4>Contact Us</h4>
                        </div>
                        <ul class="contact-menus-list">
                            <li><i class="fa-solid fa-phone"></i> <a
                                    href="tel:{{ $basic_details->phone_number }}">{{ $basic_details->phone_number }}</a>
                            </li>
                            <li><i class="fa-solid fa-envelope"></i> <a
                                    href="mailto:{{ $basic_details->email }}">{{ $basic_details->email }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ffc cc">
                    <div class="ab-ft">
                        <h4>Follow Us</h4>
                    </div>
                    <ul class="contact-menus-list">
                        <li><i class="fa-brands fa-facebook"></i> <a
                                href="{{ $basic_details->facebook_url }}">Facebook</a></li>
                        <li><i class="fa-brands fa-instagram"></i> <a
                                href="{{ $basic_details->instagram_url }}">Instagram</a></li> <br>
                        <li><i class="fa-brands fa-linkedin"></i> <a
                                href="{{ $basic_details->linkedin_url }}">Linkedin</a></li>
                </div>
            </div>
        </div>
        </div>
        <div class="container-fluid azxczx">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <p class="asdas"> All rights Reserved © {{ date('Y') }} <a href="/"
                            rel="sponsored">Chemtex Global</a>Powered By <a href="https://www.diginotive.com/"
                            rel="sponsored">Diginotive.com</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!--      <form id="appointmentForm" action="/appointment" method="POST" >-->
    <!--    @csrf-->
    <!-- Your form fields go here -->
    <!--    <input type="text" name="name" placeholder="Name" required>-->
    <!--    <input type="email" name="email" placeholder="Email" required>-->
    <!--    <input type="datetime-local" name="date_time" required>-->
    <!--    <button type="submit">Submit</button>-->
    <!--</form>-->
    <!-- Modal -->
    <div id="contactSupplierModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    <h2 class="com-title">{{ $basic_details->company_name }}</h2>
                    <h4 class="modal-title">Contact Form</h4>
                </div>
                <div class="modal-body" id='inquiry_popup_form'>
                    <div class="row">
                        <form id='form1' method="post" action="/save_contact/1">
                            {{ csrf_field() }}
                            <div id="err_msg"></div>
                            <div class="col-md-12 form-group">
                                <i class="fa fa-user icon"></i>
                                <input id='inquiry_name' name="inquiry_name" class="form-control" placeholder="Name"
                                    type="text" required="">
                            </div>
                            <div class="col-md-12 form-group">
                                <i class="fa fa-envelope icon"></i>
                                <input id='inquiry_email' name="inquiry_email" class="form-control"
                                    placeholder="Email" type="email" required="">
                            </div>
                            <div class="col-md-12 form-group">
                                <i class="fa fa-phone icon"></i>
                                <input id='inquiry_phone' name="inquiry_phone" class="form-control"
                                    placeholder="Phone" type="text" required="">
                            </div>
                            <input type="hidden" name="inquiry_subject"
                                value="{{ $basic_details->company_name }} Inquiry">
                            <div class="col-md-12 form-group">
                                <textarea id='inquiry_message' name="inquiry_message" class="form-control" placeholder="Message" rows="4"
                                    required=""></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="agree"><input type="checkbox" required="">
                                    <span>I agree to share my Details to the supplier.</span></label>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 fiff">
                                    <input class="form-control" type="text" id="captcha" name="captcha"
                                        placeholder="captcha" required="">
                                </div>
                                <div class="col-md-6" id="inq_cap_img">
                                    {!! $captcha_img !!}
                                </div>
                            </div>
                            <div class="col-md-12 form-group cent">
                                <input id='inquiry_popup_btn' type="submit" value='Submit' class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-popup">
        <button class="close-search style-two"><img src="/images/cross (1).png"></span></button>
        <form method="GET" action="/products">
            <div class="form-group">
                <input type="text" value="" placeholder="Search Here" name="product_name"
                    autocomplete="off">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/scroll.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/webslidemenu.js"></script>
    <script src="/assets/js/fancybox.js"></script>
    <script src="/assets/js/ss-simple.min5e9d.js"></script>
    <script src="/assets/js/aos.js"></script>
    <!--<script src="/assets/js/jquery-3.3.1.min.js"></script>-->
    <script>
        if ($('.search-box-outer').length) {
            $('.search-box-outer').on('click', function() {
                $('body').addClass('search-active');
            });
            $('.close-search').on('click', function() {
                $('body').removeClass('search-active');
            });
        }
    </script>
    <script>
        $('#form1').on('submit', function(e) {
            e.preventDefault();

            document.getElementById('inquiry_popup_btn').disabled = true;

            var data = $('#form1').serialize();

            var url = "/save_contact/1";

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                dataType: 'json',
                success: function(data) {
                    document.getElementById('inquiry_popup_btn').disabled = false;

                    document.getElementById('inquiry_popup_form').innerHTML =
                        "<div class='alert alert-success alert-dismissable'>We have received your message. Our team will get back to you soon.</div>";


                    setTimeout(function() {
                        window.location.reload(1);
                    }, 2000);
                },
                error: function(msg) {
                    document.getElementById('err_msg').innerHTML = "";

                    var err = JSON.parse(msg.responseText);

                    $.each(err.errors, function(key, val) {

                        if (typeof(val[0]) !== 'undefined' && val[0] != val[0].replace(
                                'Entered_', '')) {

                            var str_arr = val[0].split("Entered_");

                            $('#err_msg').append("<div>" + str_arr[0] + "</div>");
                            document.getElementById('inq_cap_img').innerHTML = str_arr[1];
                        } else {
                            $('#err_msg').append("<div>" + val + "</div>");
                        }
                    })

                    $("#err_msg").removeClass();
                    $('#err_msg').addClass('alert alert-danger');
                    document.getElementById('err_msg').style.display = 'block';

                    document.getElementById('inquiry_popup_btn').disabled = false;
                }
            });

            return false;
        });






        $('.form_submit').on('submit', function(e) {
            e.preventDefault();
            var formInstance = $(this);
            formInstance.find('.inquiry_form_btn').prop('disabled', true);
            formInstance.find('.inquiry_form_btn').html("Sending...");

            var data = formInstance.serialize();

            var url = formInstance.attr('action');

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(data) {
                    formInstance.trigger('reset');

                    formInstance.find('.inquiry_form_btn').prop('disabled', false);
                    formInstance.find('.inquiry_form_btn').html('Send');

                    formInstance.find('.form_success').html(
                        "<div class='alert alert-success alert-dismissable' >Message Sent Successfully</div>"
                    );

                    // formInstance.find('.inquiry_popup_form').html("<div class='alert alert-success alert-dismissable'>Your Message has been Sent Successfully</div>");

                    formInstance.find('.err_msg_1').html("");
                    // $("#err_msg_1").removeClass();

                },
                error: function(msg) {

                    formInstance.find('.err_msg_1').html("");

                    var err = JSON.parse(msg.responseText);

                    $.each(err.errors, function(key, val) {

                        if (typeof(val[0]) !== 'undefined' && val[0] != val[0].replace(
                                'Entered_', '')) {

                            var str_arr = val[0].split("Entered_");
                            formInstance.find('.err_msg_1').append("<div>" + str_arr[0] +
                                "</div>");
                            $('.cap_img').html(str_arr[1]);
                        } else {
                            formInstance.find('.err_msg_1').append("<div>" + val + "</div>");
                        }
                    })

                    formInstance.find('.err_msg_1').removeClass('alert alert-danger');
                    formInstance.find('.err_msg_1').addClass('alert alert-danger');
                    formInstance.find('.err_msg_1').attr('style', 'display:block;');

                    formInstance.find('.inquiry_form_btn').prop('disabled', false);
                    formInstance.find('.inquiry_form_btn').html("Send");
                }
            });

            return false;
        });




        $('#form2').on('submit', function(e) {
            e.preventDefault();

            document.getElementById('inquiry_form_btn').disabled = true;
            document.getElementById('inquiry_form_btn').innerHTML = "Send";

            var data = $('#form2').serialize();

            var url = "/save_contact/2";

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(data) {
                    if (data == 1) {
                        document.getElementById('form2').reset();
                        document.getElementById('c_inquiry_popup_form').innerHTML =
                            "<div class='alert alert-success alert-dismissable'>We have received your message. Our team will get back to you soon.</div>";
                    } else {
                        document.getElementById('form2').reset();

                        document.getElementById('inquiry_form_btn').disabled = false;
                        document.getElementById('inquiry_form_btn').innerHTML = "Send";

                        document.getElementById('form_success').innerHTML =
                            "<div class='alert alert-success alert-dismissable' >Message Sent Successfully</div>";

                        document.getElementById('inquiry_popup_form').innerHTML =
                            "<div class='alert alert-success alert-dismissable'>Your Message has been Sent Successfully</div>";

                        document.getElementById('err_msg_1').innerHTML = "";
                        $("#err_msg_1").removeClass();
                    }
                },
                error: function(msg) {


                    document.getElementById('err_msg_1').innerHTML = "";

                    var err = JSON.parse(msg.responseText);

                    $.each(err.errors, function(key, val) {

                        if (typeof(val[0]) !== 'undefined' && val[0] != val[0].replace(
                                'Entered_', '')) {

                            var str_arr = val[0].split("Entered_");

                            $('#err_msg_1').append("<div>" + str_arr[0] + "</div>");
                            document.getElementById('inq_cap_img').innerHTML = str_arr[1];
                        } else {
                            $('#err_msg_1').append("<div>" + val + "</div>");
                        }
                    });

                    $("#err_msg_1").removeClass();
                    $('#err_msg_1').addClass('alert alert-danger');
                    document.getElementById('err_msg_1').style.display = 'block';

                    document.getElementById('inquiry_form_btn').disabled = false;
                    document.getElementById('inquiry_form_btn').innerHTML = "Send";


                }
            });

            return false;
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".parent-li .click-arrow").click(function(e) {
                e.preventDefault();
                $(this).parents('.drop-menu').find('.unactivess-p').toggleClass('open-list');
                return false;

            })

        });
    </script>
    <script>
        function showContent() {
            $(".content").toggleClass('content-hidden');
            if ($("#toggleBtn").text() == 'Show More') {
                $("#toggleBtn").text('Show Less');
            } else {
                $("#toggleBtn").text('Show More');
            }
        }

        $(document).ready(function() {

            $("#toggleBtn").click(function() {
                showContent();
            });

        });
    </script>
    <script>
        $(".product-change").click(function() {
            $(".product-change").removeClass("active"); // Remove active class from all tab links
            $(this).addClass("active"); // Add active class to the clicked tab link

            var key = $(this).attr('data-id');
            if (key == 'all') {
                $(".product-list").show();
            } else {
                $(".product-list").hide();
                $(".product-list" + key).show();
            }
        });
    </script>
    <script>
        $("#form3").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    $("#success-newsletter").show();
                    $("#error-newsletter").hide();
                    $(this).trigger('reset');
                },
                error: function() {
                    $("#success-newsletter").hide();
                    $("#error-newsletter").show();
                    $(this).trigger('reset');
                }
            })
            return false;
        });
    </script>
    </script>
    <script>
        AOS.init({
            // Global settings:
            disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
            startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
            initClassName: 'aos-init', // class applied after initialization
            animatedClassName: 'aos-animate', // class applied on animation
            useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
            disableMutationObserver: false, // disables automatic mutations' detections (advanced)
            debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
            throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 120, // offset (in px) from the original trigger point
            delay: 0, // values from 0 to 3000, with step 50ms
            duration: 400, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            once: true, // whether animation should happen only once - while scrolling down
            mirror: false, // whether elements should animate out while scrolling past them
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        });
    </script>
    @yield('scripts')
    @if (config('global.footer_scripts') != '')
        {!! config('global.footer_scripts') !!}
    @endif
</body>

</html>
 --}}






{{-- ====================== newwwwww =================== --}}






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JK Propety - RealState</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta http-equiv="pragma" content="no-cache" />
    @if (isset($meta_info['title']) && isset($meta_info['description']))
        <title>{{ $meta_info['title'] }}</title>
        <meta name="description" content="{{ $meta_info['description'] }}">
        @if (isset($meta_info['keyword']) && $meta_info['keyword'] != '')
            <meta name="keywords" content="{{ $meta_info['keyword'] }}">
        @endif
    @else
        <title>{{ $basic_details->company_name }}</title>
        <meta name="description" content="{{ $basic_details->company_name }}">
    @endif
    @if ($basic_details->is_index == 0)
        <meta name='robots' content='noindex, nofollow'>
    @else
        @if (isset($meta_info['is_index']) && $meta_info['is_index'] == '0')
            <meta name='robots' content='noindex, nofollow'>
        @endif
    @endif
    @if (config('global.header_scripts') != '')
        {!! config('global.header_scripts') !!}
    @endif
    <?php
    $canonicalUrl = request()->url();
    if (request()->page > 1) {
        $canonicalUrl .= '?page=' . request()->page;
        // $canonicalUrl  = $canonicalUrl . '?page=' . request()->page;
    }
    ?>
    <link rel="canonical" href="{!! $canonicalUrl !!}" />
    <div class="organization-schema">
        <script>
            @if (isset($meta_info['page_schema']) && $meta_info['page_schema'] != '')

                {!! $meta_info['page_schema'] !!}
            @endif
        </script>
    </div>

    <!-- Favicon -->
    <link href="/assets_2/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/assets_2/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/assets_2/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/assets_2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/assets_2/css/style.css" rel="stylesheet">
    
    @yield('styles')
    
    <link href="/assets_2/css/custom.css" rel="stylesheet">


</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-5">
             

               <a class="navbar-brand d-flex align-items-center text-center" href="{{ config('app.url') }}">
                  <div class="p-2">
                     <img class="header_logo" src="/uploads/images/logo/{{ $basic_details->logo }}" alt="{{ $basic_details->name }}" 
                        >
                 </div>  
               </a>  


                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">

                     
                        <a href="/" class="nav-item nav-link active">Home</a>
                        <a href="/about-us" class="nav-item nav-link">About</a>


                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="property-list.html" class="dropdown-item">Property List</a>
                                <a href="property-type.html" class="dropdown-item">Property Type</a>
                                <a href="property-agent.html" class="dropdown-item">Property Agent</a>
                            </div>
                        </div>


                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Error</a>
                            </div>
                        </div>
                        <a href="/contact-us" class="nav-item nav-link">Contact</a>
                    </div>
                     
                </div>
            </nav>
        </div>
        <!-- Navbar End -->
        
        
        <!-- Dynamic Content Start -->
        @yield('content')
        <!-- Dynamic Content end -->
        




        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $basic_details->phone_number }}</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $basic_details->email }}</p>
                        <div class="d-flex pt-2">

                            <a class="btn btn-outline-light btn-social" href="{{ $basic_details->facebook_url }}"><i
                                    class="fab fa-facebook-f"></i></a>

                            <a class="btn btn-outline-light btn-social" href="{{ $basic_details->linkedin_url }}"><i
                                    class="fab fa-linkedin-in"></i></a>
                           
                                    <a class="btn btn-outline-light btn-social" href="{{ $basic_details->instagram_url }}"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="/about-us">About Us</a>
                        <a class="btn btn-link text-white-50" href="/">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="/all">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Photo Gallery</h5>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="/assets_2/img/property-1.jpg"
                                    alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="/assets_2/img/property-2.jpg"
                                    alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="/assets_2/img/property-3.jpg"
                                    alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="/assets_2/img/property-4.jpg"
                                    alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="/assets_2/img/property-5.jpg"
                                    alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="/assets_2/img/property-6.jpg"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Your email">
                            <button type="button"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets_2/lib/wow/wow.min.js"></script>
    <script src="/assets_2/lib/easing/easing.min.js"></script>
    <script src="/assets_2/lib/waypoints/waypoints.min.js"></script>
    <script src="/assets_2/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/assets_2/js/main.js"></script>

    <script>
        if ($('.search-box-outer').length) {
            $('.search-box-outer').on('click', function() {
                $('body').addClass('search-active');
            });
            $('.close-search').on('click', function() {
                $('body').removeClass('search-active');
            });
        }
    </script>
    <script>
        $('#form1').on('submit', function(e) {
            e.preventDefault();

            document.getElementById('inquiry_popup_btn').disabled = true;

            var data = $('#form1').serialize();

            var url = "/save_contact/1";

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                dataType: 'json',
                success: function(data) {
                    document.getElementById('inquiry_popup_btn').disabled = false;

                    document.getElementById('inquiry_popup_form').innerHTML =
                        "<div class='alert alert-success alert-dismissable'>We have received your message. Our team will get back to you soon.</div>";


                    setTimeout(function() {
                        window.location.reload(1);
                    }, 2000);
                },
                error: function(msg) {
                    document.getElementById('err_msg').innerHTML = "";

                    var err = JSON.parse(msg.responseText);

                    $.each(err.errors, function(key, val) {

                        if (typeof(val[0]) !== 'undefined' && val[0] != val[0].replace(
                                'Entered_', '')) {

                            var str_arr = val[0].split("Entered_");

                            $('#err_msg').append("<div>" + str_arr[0] + "</div>");
                            document.getElementById('inq_cap_img').innerHTML = str_arr[1];
                        } else {
                            $('#err_msg').append("<div>" + val + "</div>");
                        }
                    })

                    $("#err_msg").removeClass();
                    $('#err_msg').addClass('alert alert-danger');
                    document.getElementById('err_msg').style.display = 'block';

                    document.getElementById('inquiry_popup_btn').disabled = false;
                }
            });

            return false;
        });






        $('.form_submit').on('submit', function(e) {
            e.preventDefault();
            var formInstance = $(this);
            formInstance.find('.inquiry_form_btn').prop('disabled', true);
            formInstance.find('.inquiry_form_btn').html("Sending...");

            var data = formInstance.serialize();

            var url = formInstance.attr('action');

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(data) {
                    formInstance.trigger('reset');

                    formInstance.find('.inquiry_form_btn').prop('disabled', false);
                    formInstance.find('.inquiry_form_btn').html('Send');

                    formInstance.find('.form_success').html(
                        "<div class='alert alert-success alert-dismissable' >Message Sent Successfully</div>"
                    );

                    // formInstance.find('.inquiry_popup_form').html("<div class='alert alert-success alert-dismissable'>Your Message has been Sent Successfully</div>");

                    formInstance.find('.err_msg_1').html("");
                    // $("#err_msg_1").removeClass();

                },
                error: function(msg) {

                    formInstance.find('.err_msg_1').html("");

                    var err = JSON.parse(msg.responseText);

                    $.each(err.errors, function(key, val) {

                        if (typeof(val[0]) !== 'undefined' && val[0] != val[0].replace(
                                'Entered_', '')) {

                            var str_arr = val[0].split("Entered_");
                            formInstance.find('.err_msg_1').append("<div>" + str_arr[0] +
                                "</div>");
                            $('.cap_img').html(str_arr[1]);
                        } else {
                            formInstance.find('.err_msg_1').append("<div>" + val + "</div>");
                        }
                    })

                    formInstance.find('.err_msg_1').removeClass('alert alert-danger');
                    formInstance.find('.err_msg_1').addClass('alert alert-danger');
                    formInstance.find('.err_msg_1').attr('style', 'display:block;');

                    formInstance.find('.inquiry_form_btn').prop('disabled', false);
                    formInstance.find('.inquiry_form_btn').html("Send");
                }
            });

            return false;
        });




        $('#form2').on('submit', function(e) {
            e.preventDefault();

            document.getElementById('inquiry_form_btn').disabled = true;
            document.getElementById('inquiry_form_btn').innerHTML = "Send";

            var data = $('#form2').serialize();

            var url = "/save_contact/2";

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(data) {
                    if (data == 1) {
                        document.getElementById('form2').reset();
                        document.getElementById('c_inquiry_popup_form').innerHTML =
                            "<div class='alert alert-success alert-dismissable'>We have received your message. Our team will get back to you soon.</div>";
                    } else {
                        document.getElementById('form2').reset();

                        document.getElementById('inquiry_form_btn').disabled = false;
                        document.getElementById('inquiry_form_btn').innerHTML = "Send";

                        document.getElementById('form_success').innerHTML =
                            "<div class='alert alert-success alert-dismissable' >Message Sent Successfully</div>";

                        document.getElementById('inquiry_popup_form').innerHTML =
                            "<div class='alert alert-success alert-dismissable'>Your Message has been Sent Successfully</div>";

                        document.getElementById('err_msg_1').innerHTML = "";
                        $("#err_msg_1").removeClass();
                    }
                },
                error: function(msg) {


                    document.getElementById('err_msg_1').innerHTML = "";

                    var err = JSON.parse(msg.responseText);

                    $.each(err.errors, function(key, val) {

                        if (typeof(val[0]) !== 'undefined' && val[0] != val[0].replace(
                                'Entered_', '')) {

                            var str_arr = val[0].split("Entered_");

                            $('#err_msg_1').append("<div>" + str_arr[0] + "</div>");
                            document.getElementById('inq_cap_img').innerHTML = str_arr[1];
                        } else {
                            $('#err_msg_1').append("<div>" + val + "</div>");
                        }
                    });

                    $("#err_msg_1").removeClass();
                    $('#err_msg_1').addClass('alert alert-danger');
                    document.getElementById('err_msg_1').style.display = 'block';

                    document.getElementById('inquiry_form_btn').disabled = false;
                    document.getElementById('inquiry_form_btn').innerHTML = "Send";


                }
            });

            return false;
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".parent-li .click-arrow").click(function(e) {
                e.preventDefault();
                $(this).parents('.drop-menu').find('.unactivess-p').toggleClass('open-list');
                return false;

            })

        });
    </script>
    <script>
        function showContent() {
            $(".content").toggleClass('content-hidden');
            if ($("#toggleBtn").text() == 'Show More') {
                $("#toggleBtn").text('Show Less');
            } else {
                $("#toggleBtn").text('Show More');
            }
        }

        $(document).ready(function() {

            $("#toggleBtn").click(function() {
                showContent();
            });

        });
    </script>
    <script>
        $(".product-change").click(function() {
            $(".product-change").removeClass("active"); // Remove active class from all tab links
            $(this).addClass("active"); // Add active class to the clicked tab link

            var key = $(this).attr('data-id');
            if (key == 'all') {
                $(".product-list").show();
            } else {
                $(".product-list").hide();
                $(".product-list" + key).show();
            }
        });
    </script>
    <script>
        $("#form3").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    $("#success-newsletter").show();
                    $("#error-newsletter").hide();
                    $(this).trigger('reset');
                },
                error: function() {
                    $("#success-newsletter").hide();
                    $("#error-newsletter").show();
                    $(this).trigger('reset');
                }
            })
            return false;
        });
    </script>
    </script>
    <script>
        // AOS.init({
        //     // Global settings:
        //     disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        //     startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        //     initClassName: 'aos-init', // class applied after initialization
        //     animatedClassName: 'aos-animate', // class applied on animation
        //     useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        //     disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        //     debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        //     throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
        //     // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        //     offset: 120, // offset (in px) from the original trigger point
        //     delay: 0, // values from 0 to 3000, with step 50ms
        //     duration: 400, // values from 0 to 3000, with step 50ms
        //     easing: 'ease', // default easing for AOS animations
        //     once: true, // whether animation should happen only once - while scrolling down
        //     mirror: false, // whether elements should animate out while scrolling past them
        //     anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        // });
    </script>
    @yield('scripts')
    @if (config('global.footer_scripts') != '')
        {!! config('global.footer_scripts') !!}
    @endif



</body>

</html>
