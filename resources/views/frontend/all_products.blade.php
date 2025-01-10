@extends('frontend.template')

{{-- @section('styles')
    <style type="text/css">
        .view-c img {
            margin: 0 auto;
        }

        .view-c.ss {
            text-align: center;
            position: absolute;
            right: 0;
            left: 0;
            margin: 0 auto;
            display: block;
            bottom: 60px;
        }

        .super-oil-c.ss {
            box-shadow: 0 0 10px #ccc;
        }

        .super-oil-main {

            box-shadow: 0 0 16px #ccc;
        }

        .super-oil-third img {
            position: relative;
            top: 17px;
            left: 20px;
        }

        input#inquiry_form_email {
            margin-left: 0px;
            width: 100%;
        }

        .contactmain .col-md-6 {
            padding: 0px 13px;
        }

        .contactmain {
            margin-top: 0px;
        }

        div#btnContainer {
            display: none;
        }



        @media only screen and (max-width: 992px) {

            body a.my-view img {

                margin-top: 0px;
            }

            .filter-box button.navbar-toggle span {
                background: black;
            }

            .filter-box button.navbar-toggle {
                position: absolute;
                right: 0;
                top: 3px;
                margin: 0;
                right: 22px;
                border: 1px solid black;
                background: white;
                z-index: 9999;
            }

            body .product-contact {
                display: none;
            }


            body .navbar-header a.filter-head {
                display: block !important;
                margin-bottom: 20px;
                padding-bottom: 10px;
                padding-top: 10px;
                padding-left: 10px;
                background-color: #f8f8f8;
                color: #2a2a2a;
            }

            .filter-box button.navbar-toggle span {
                background: black;
            }

            .filter-box button.navbar-toggle {
                position: absolute;
                right: 0;
                top: 3px;
                margin: 0;
                right: 22px;
                border: 1px solid black;
                background: white;
                z-index: 9999;
            }


            body .pro-menu {
                min-height: unset;
                /* display: none; */
                z-index: 1;
            }

            body .none {
                display: block;

            }

            footer h4 {
                margin-top: 30px;
                font-size: 14px !important;
                text-align: left !important;
                left: 0 !important;
                display: block !important;
                padding-right: 0px !important;
            }

            body p.banner-para {
                font-size: 14px;
                line-height: 14px;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            body ul.btn-groups {
                display: none;
            }


            body .fea-products li {
                width: 100% !important;
                float: unset;
                margin-right: 6px;
            }

            body .fea-products {
                white-space: unset;
            }

            body .logo img {
                position: relative;
                left: 0px;
            }


            .navbar-collapse {
                position: absolute;
                z-index: 999;
                background-color: #fff;
                width: 100%;
                right: 0;
            }
        }


        @media only screen and (max-width: 992px) {

            body .menus {
                box-shadow: unset !important;
                background-color: unset !important;
            }

            body .super-oil-third img {

                left: 10px;
            }

            body .my-div-right {
                display: none;
            }

            body .right {
                margin: unset !important;
            }

            body .footer-menus-list li {
                margin: 0 auto;
            }

            body .categoty-flips-one {
                height: unset !important;
                height: 200px !important;
                margin: 0 auto;
            }

            body .main-serv-inner-11 {
                margin: 0 auto;
                max-width: 100%;
            }

            body .chance-inner-wrapperr-viewwww img {
                width: 100px;
            }

            body .main-inner-serv-22 {
                margin: 0 auto;
                margin-bottom: 70px;
            }

            body .main-inner-serv-33 {
                margin: 0 auto;
            }

            body .about-image {
                right: 0 !important;
            }

            body .contactmainn .owl-dots {
                display: none;
            }

            body section.bannerrr {

                padding: 35px 0px;

                background-size: 100% 100%;
            }

            body .product-button {
                text-align: center;
                margin: 0;
            }

            body section.videos {
                /* display: none; */
            }

            body .tab {
                display: none;
            }

            body .tab-tab {
                display: none;
            }

            body .services-services {
                float: unset;
                width: 100%;
                padding: 0 10px 0 10px;
                text-align: center;
            }

            body .ser-serrr {
                background: unset;
                background-color: #c90916;
                height: unset;
                padding: 10px 10px 10px 10px;
            }

            body .heading {
                margin-top: -40%;
            }

            body h2.ser-head {
                font-size: 22px;
                text-align: center;
                padding: 0;
            }

            body h2.serving {
                text-align: center;
                font-size: 22px;
            }

            .services-services {}

            .services-services {}

            body .services-sssdddd {
                text-align: center;
            }

            body h2.services-ser {
                text-align: center;
                font-size: 20px;
                padding: 0px 0 20px 0;
            }

            body .ser-lower {
                padding: 0 15px 0 15px;
            }

            body .sss {
                float: none;
            }

            body p.product-para {
                font-size: 14px;
                text-align: center;
            }

            body .chance-inner-wrapperr-view a {
                padding: 5px 10px 5px 10px;
            }

            body .product-button a {
                padding: 8px 10px 8px 10px;
                font-size: 14px;
            }

            body .main-serv-inner-2 p {
                font-size: 12px;
            }

            body .keqilblogs {
                padding: 0 10px 0 10px;
                top: 50%;
            }
        }

        button.header-search-btn-1 img {
            filter: brightness(100);
        }

        .my_cats a {
            background-color: #e3e1e1;
            display: block;
            margin-bottom: 3px;
            padding: 5px 15px 5px 5px;
            border-radius: 2px;
            color: #000000b0;
            font-size: 13px;
            text-transform: capitalize;
        }



        body .my_cats a.arrows:after {
            /*-moz-border-bottom-colors: none;*/
            /*-moz-border-left-colors: none;*/
            /*-moz-border-right-colors: none;*/
            /*-moz-border-top-colors: none;*/
            /*border-color: #fff transparent transparent transparent;*/
            /*border-image: none;*/
            /*border-style: solid;*/
            /*border-width: 4px;*/
            /*top: 13px;*/
            /*content: "";*/
            /*margin-top: 0;*/
            /*position: absolute;*/
            /*right: 5px;*/
            /*z-index: 11111;*/
        }


        /* new drop-down menu css start */


        a.click-arrow {
            display: inline-block;
            padding: 0 !important;
            font-size: 0 !important;
            width: 30px;
            height: 28px;
            max-width: unset !important;
            min-width: unset !important;
            position: absolute;
            right: 0;
            top: 9px;
        }

        ul.drop-menu {
            padding-left: 0;
            margin-bottom: 0;
        }

        ul.drop-menu li {
            background-color: #545454;
            cursor: pointer;
            position: relative;
            border-bottom: solid 3px #fff;
        }

        ul.drop-menu li a,
        ul.drop-menu li a.arrows {
            /*display: inline-block !important;*/
            max-width: 200px;
            min-width: 200px;
            margin-bottom: 0 !important;
            background-color: unset !important;
            font-size: 0;
        }

        body .menu_openeds ul.drop-menu li a.activess {
            display: inline-block !important;
        }

        .my_cats ul.drop-menu li:first-child {
            background-color: #cccc;
            cursor: pointer;
            position: relative;
            border-bottom: solid 3px #fff;
            margin-bottom: 0;
            height: initial;
            padding: 10px 5px 10px 5px !important;
            height: 40px;
            overflow: hidden;
        }

        li.unactivess-p {
            transition: .5s ease !important;
        }

        li.unactivess-p a {
            /*transition: .5s ease;*/
        }

        .my_cats ul.drop-menu li:first-child a {
            font-size: 16px;
            padding: 5px 15px 5px 5px;
        }

        body .my_cats ul.drop-menu li {
            padding: 0;
            background: unset;
            border: unset;
            cursor: unset;
            height: 0;
        }


        body .my_cats .drop-menu .parent-li .click-arrow:after {
            content: "";
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            border-color: #fff transparent transparent transparent;
            border-image: none;
            border-style: solid;
            border-width: 4px;
            top: 13px;
            content: "";
            margin-top: 0;
            position: absolute;
            right: 6px;
            z-index: 11111;
        }

        li.unactivess-p.open-list {
            height: unset !important;
            padding: 0 !important;
            background: inherit !important;
            background-color: #545454ab !important;
            cursor: pointer !important;
            position: relative;
            border-bottom: solid 3px #fff !important;
            transition: .5s ease !important;
            padding: 4px 0px 4px 5px !important;
        }

        /* new drop-down menu css end */



        body .my_cats ul.drop-menu li.unactivess-p.open-list a {
            font-size: 13px !important;
            display: block !important;
            padding: 5px 15px 5px 5px;
            border-radius: 2px;
            color: #fff;
            font-size: 13px !important;
            text-transform: capitalize;
            /*transition: .5s ease;*/
        }

        .my_cats a {
            padding: 0 !important;
        }

        .my_cats a.un_activess {
            display: none;
        }

        body .p_actives a.activess {
            display: block !important;
            background-color: #00000096;
            color: #fff;
        }

        body .menu_openeds a.activess {
            display: block !important;
            background-color: #00000096;
            color: #fff;
        }

        body .menu_openeds a.active_childs {
            background-color: #00000075;
        }

        /* side bar menu css end */
        .blog2 {
            height: 500px;
            box-shadow: 0 0 10px #ccc;
            border-radius: 8px;
        }

        .blog2 {
            height: 500px;
            box-shadow: 0 0 10px #ccc;
            border-radius: 8px;
        }

        p.date-format {
            color: #000000 !important;
            /* background: #2a2a2a; */
            /* padding: 5px 20px; */
            transform: rotate(270deg);
            position: absolute;
            left: -62px;
            top: 20px;
            /* font-style: italic; */
            padding: 0;
            margin: 0;
        }

        body .mobile-sub .wsmenu-submenu li a:before {
            display: none;
        }

        .main-inner-div:before {
            content: url(/images/row-before.png);
            position: absolute;
            top: 120px;
            /* background-color: #ccc; */
            width: 100%;
            margin: 0 auto;
            z-index: -999;
            top: 80px;
            background-repeat: no-repeat;
            left: 0;
            right: 0;
        }

        div#inq_cap_img {
            z-index: 9999;
            overflow: hidden;
        }

        h2.title {
            position: relative;
            padding-left: 0px;
            margin-top: 30px;
            font-size: 20px;
            font-weight: 700;
            color: #2a2a2a;
            text-transform: uppercase;
            font-family: 'Josefin Sans', sans-serif !important;
        }

        h2.title:before {
            position: absolute;
            background-color: #ed7d11;
        }

        .product-contact .form-control:focus {
            outline: none;
            box-shadow: unset;
            border-color: #000;
        }

        .product-contact .cap_img {
            margin-top: 0px;
            margin-bottom: 20px;
        }

        .product-contact .btn-primary {
            /* padding: 5px 15px 5px 15px; */

            border: unset;
            /* margin: 0 auto; */
            transition: initial;
            display: block;
            margin-top: 10px;
        }

        h4.Popular {
            padding: 30px 0px 10px 0px;
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 700;
            color: #2a2a2a;
            font-family: 'Josefin Sans', sans-serif !important;
        }

        .chance-mainn-1ssss {
            width: 50%;
            float: left;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            height: 120px;
            position: relative;
        }

        .chance-pros-mainnssss {
            position: relative;
        }

        button.header-search-btn-1 {
            font-size: 0;
            border: unset;
        }

        .header-search-btn-1 {
            font-size: 0;
            background-color: #2a2a2a !important;
            color: transparent;
            border: unset;
            height: 40px;
            position: relative;
            top: -5px;
            width: 40px;
            left: -43px;
            border-left: 1px solid #ccc !important;
        }

        .header-search-btn-1 i.fa.fa-search {
            font-size: 17px;
            color: #fafafa;
            background-color: transparent !important;
            position: absolute;
            / right: 6px;/ bottom: 5px;
            left: 10px;
            top: 13px;
        }

        .ext-padd input[type="text"]:focus {
            outline: none;
            border: unset !important;
        }

        body .ext-padd {
            position: relative;
            display: block;
        }

        ul.cus-social p {
            float: right;
            display: inline-block;
            color: #fff;
            font-weight: 500;
            margin-top: 10px;
            font-size: 15px;
            padding-left: 3px;
        }


        p.ll {
            position: relative;
            /* left: -10px; */
        }

        li.contt p {
            padding-right: 10px;
        }

        .my_cat.cat_level_1:hover a:before {
            content: "";
            background-color: #cb9229;
            width: 3px;
            height: 100%;
            position: absolute;
            left: -7px;
            top: 0px;
            opacity: 1;
        }

        .chance-pros-mainn:hover .chance-innerr-wrapper-product a {
            transition: 0.3s;
        }

        .chance-pro-2ssss a {
            font-size: 14px;
            color: #3b3333;
            font-weight: 600;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            padding: 33px 0 0px 0;
        }

        .product-contact {
            position: relative;
        }

        .product-contact .form-group {
            width: 100%;
            border: unset;
            background-color: transparent;
        }

        .chance-pro-2ssss {
            float: right;
            position: relative;
            width: 50%;
            margin-bottom: 50px;
            padding-left: 10px;
            display: flex;
        }

        .chance-innerr-wrapper-productsss {
            float: right;
        }

        .chance-inner-wrapperr-viewsssss {
            float: right;
        }

        .chance-pro-2ssss a {
            font-size: 14px;
            color: #3b3333;
            font-weight: 600;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            padding: 33px 0 0px 0;
        }

        .chance-pros-mainnssss {
            margin-top: 30px;
        }

        .related-products {
            display: none;
        }

        ul.products {
            margin-bottom: 0;
        }

        ul.productses {
            display: none;
        }

        p.filtered-by-s {
            display: none;
        }

        li.buil-d {
            max-width: 60%;
        }

        section.bread-crum {
            background-color: #cccccc52;
            max-width: 1600px;
            margin: 0 auto;
        }

        .bread_crumb {
            padding: 10px 0 10px 0 !important;
        }

        .bread_crumb a {
            color: #000;
            font-weight: 500;
            font-size: 14px;
        }

        h1.pgtitle {
            color: #2a2a2a;
            font-weight: 700;
            margin-top: 0;
            font-size: 18px;
        }

        ul.cus-social li a i {
            color: #ffffff !important;
            background: black;
            height: 40px;
            width: 40px;
        }

        .related-heading h4 {
            padding-left: 20px !important;
            margin-bottom: 0px;
            font-size: 42px;
            font-weight: 700;
        }

        .btn-primary:focus {
            background-color: #242b5b;
        }

        .social-icon-view-products {
            border-top: solid 2px #ccc;
            margin-top: 30px;
        }

        h6.social-icon-view-now {
            color: #b41f2e;
            font-weight: 700;
            font-size: 22px;
            padding-top: 20px;
        }

        .cus-social-1 {
            margin-top: 10px !important;
        }

        li.last-list a {
            margin-right: 0 !important;
        }

        .ab-1-top img {
            margin-bottom: 10px;
        }

        h3.cat-h3 {
            display: none;
        }

        div#btnContainer {
            /* display: none; */
        }

        /*section.menu-menu {*/
        /*    position: unset;*/
        /*}*/

        /*body .row.menus {*/
        /*    background-color: unset;*/
        /*    box-shadow: unset;*/
        /*}*/

        .chance-inner-wrapperr-view a {
            padding: 10px 10px 10px 10px;
        }

        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
            /* display: block; */
            text-align: right;
            float: right;
            position: relative;
            right: 16px;
        }

        div#products-box {
            margin-top: 40px;
        }

        .chance-mainn-1 {
            border: 1px solid #cccccc94;
        }


        /*child category css start*/

        .menu_opened.p_active a {
            color: #000 !important;
        }

        .search-results ul li {
            margin-bottom: 4px;
            font-size: 15px;
            color: #000;
        }

        .search-results ul li a {
            color: #337ab7 !important;
        }

        body .my_cat.cat_level_1.active a {
            color: #ffffff !important;
            background-color: #056da4 !important;
        }


        .cat_level_1>a:nth-child(1) {
            display: block !important;
        }

        .cat_level_1 a:first-child {
            position: relative;
        }

        .cat_level_1 a:first-child:before {
            content: "v";
            position: absolute;
            right: 11px;
            /* transform: rotate(85deg); */
            font-size: 15px !important;
            color: #000;
            font-weight: 700;
            opacity: 0;
        }

        .cat_level_1 .un_actives {
            display: none;
        }


        /*child category css end*/



        /*body{*/

        /*        background-color: #fafafa;*/
        /*}*/

        h2 {
            font-size: 22px;
            margin-top: 0px;
        }

        .product_thumb {
            /*height: 320px;*/
            /*line-height: 230px !important;*/
            border: 1px Solid #ccc;
            /* max-width: 20px; */
            text-align: center;
            padding: 0 !important;
            margin: 0 auto;
            float: none;
        }

        ul.products li.item {
            margin-bottom: 0px !important;
        }



        ul.products>li .product_thumb img {
            max-width: 100%;
            max-height: 100%;
            max-width: unset !important;
        }

        /*ul.products > li {*/
        /*    display: inline-block;*/
        /*    float: left;*/
        /*    width: 32%;*/
        /*    margin: 0 11px 20px 0;*/
        /*    height: 470px;*/
        /*}*/

        .cat_level_2:before {
            content: "-";
            margin-right: 5px;
            display: inline-block;
        }

        .cat_level_3:before {
            content: "-";
            margin-right: 5px;
            display: inline-block;
        }

        .cat_level_4:before {
            content: "-";
            margin-right: 5px;
            display: inline-block;
        }

        .cat_level_2 {
            padding-left: 20px;
        }

        .cat_level_3 {
            padding-left: 30px;
        }

        .cat_level_4 {
            padding-left: 40px;
        }

        .my_cat {
            /*border: 1px Solid #ccc;*/
            margin-bottom: 1px;
        }

        .my_cat:hover {

            cursor: pointer;
        }

        .my_cat a {
            color: #000;
            width: 100%;
            display: inline-block;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .cat_level_1 a {
            color: #0097af;
            /*font-weight: bold;*/
            font-size: 14px;
        }

        .active {
            /*background-color: #e0e0e0;*/
        }

        a.pro-title {
            color: #fff;
            font-size: 15px;
            display: table-cell;
            vertical-align: middle;
            /*height: 80px;*/
            text-align: center;
        }

        a.pro-title1 {
            color: #fff;
            font-size: 15px;
            display: table-cell;
            vertical-align: middle;
            height: 80px;
            text-align: center;
        }

        .prod_box {
            position: relative;
            overflow: hidden;
            padding: 0;
        }

        .prod_box img {
            width: 100%;
        }

        .pro-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: 0.3s linear 0s;
            bottom: -100%;
        }

        .best-sellers:hover div.pro-overlay {
            bottom: 0;
        }

        .prod_box:hover .featrued_prod_title {
            display: none;
        }



        @media only screen and (min-width: 600px) and (max-width: 900px) {
            ul.products>li {
                width: 48%;
            }
        }

        @media only screen and (min-width: 320px) and (max-width: 600px) {
            ul.products>li {
                width: 100%;
            }

            .pull-right {
                display: none;

            }
        }

        /*       @media only screen and (max-width: 992px){*/
        /*body .pro-menu {*/
        /*    min-height: 950px !important;*/
        /*}}*/

        body .my_cats ul.drop-menu li {
            list-style: none !important;

        }

        .ori-service {
            /* margin-top: 50px; */
            height: 250px;
            position: relative;
            overflow: hidden;
            text-align: center;
            margin-bottom: 15px;
            transition: .5s ease;
            padding: 10px;
        }

        .service {
            height: 200px;
            position: relative;
            overflow: hidden;
            transition: .5s ease;
        }

        .service-texts {
            padding: 0 0 0 0;
            position: relative;
            overflow: hidden;
            transition: 5s ease;
        }

        .service-texts h3 a {
            font-size: 18px;
            text-transform: capitalize !important;
            color: #388e83;
        }

        div#products-boxs {
            margin-top: 45px;
        }

        .ori-service:hover {
            border-radius: 5px;
            box-shadow: 0px 0px 10px #3a9488;
            padding: 10px 10px 10px 10px;
            transition: .5s ease;
            overflow: hidden;
        }

        @media only screen and (max-width: 992px) {
            body .service-texts {
                padding: 20px 0 0 0 !important;
            }

        }

        .inner-box:hover img {
            transform: scale(1.1);
            transition: 0.5s;
        }

        .inner-box img {
            transition: 0.5s;
        }

        a.det {
            color: #c2272d;
            font-size: 16px;
            font-weight: 500;
        }

        .shop-block-one .inner-box .lower-content .text {
            margin-bottom: 11px;
        }

        .service-sidebar .category-widget .widget-content li a:hover i,
        .service-sidebar .category-widget .widget-content li a.current i {
            background-color: #c1282a;
        }

        .col-lg-4.col-md-12.col-sm-12.sidebar-side {
            margin-top: 40px;
        }


        ul.category-list.clearfix li {
            margin-bottom: 15px !important;
            !i;
            !;
        }

        .bread_crumb span {
            color: #e90a14;
            font-size: 15px;
            font-family: sans-serif;
        }
    </style>
@endsection

@section('content')
    <div class="left">
        <div class="bannermain innerbanner">
            <div class="banner_overlay"></div>

            @if (isset($meta_info['featured_banners']))
                <img src="/uploads/images/banners/{{ $meta_info['featured_banners'] }}" alt="{{ $basic_details->name }}">
            @else
                <img src="{{ get_thumb_url_400('banners', '/' . $basic_details->featured_banner, 1) }}"
                    alt="{{ $basic_details->name }}">
            @endif

            <div class="innercaption">
                <div class="container">
                    <!--<h2>All Products</h2>-->
                </div>
            </div>
        </div>

        <section class="bread-crum">

            <div class="container">

                <div class="bread_crumb">
                    <a href="/">Home</a> >
                    <a href="/products">Products</a> >
                    <span>All Products ({{ $all_products->total() }})</span>

                </div>

            </div>

        </section>

        <div class="contactmain">
            <div class="container">


                <div class="row">

                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="service-sidebar default-sidebar">
                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h5>Categories</h5>
                                    <div class="icon-box"><img src="/assets/images/icons/icon-57.png" alt=""></div>
                                </div>
                                <div class="widget-content">
                                    @foreach ($all_industries as $key => $ind)
                                        <ul class="category-list clearfix">
                                            <li>
                                                <a class="{{ request()->segment(2) === $ind->slug ? 'current' : '' }}"
                                                    href="/product-category/{{ $ind->slug }}">
                                                    <i class="fas fa-long-arrow-right"></i>{{ $ind->name }}
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-12 our-product">

                        @if (request()->product_name != '' && $all_products->count() == 0)
                            <div class="search-results">

                                <ul>

                                    <li>Sorry no products found for '{{ request()->product_name }}'</li>

                                    <li>Suggestions</li>

                                    <li>- Make Sure words are spelled correctly.</li>

                                    <li>- Insert space or comma between two or more keywords.</li>

                                    <li> - Try less specific keywords.</li>

                                    <li> - Try rephrasing keywords or using synonyms.</li>

                                    <li> Haven't found any product? <a class="contact-us" rel="nofollow" href="/contact-us">
                                            Contact Us</a> Now.</li>

                                    <li> Need Help? <a href="/contact-us" rel="nofollow">Tell us your searching needs!</a>
                                    </li>

                                </ul>

                            </div>
                        @else
                            <div class="col-xs-12">

                                <div id="btnContainer">
                                    <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i>
                                        Grid</button>
                                    <button class="btn custum-style" onclick="listView()"><i class="fa fa-bars"></i>
                                        List</button>

                                </div>

                                <div id="products-boxs" class="">


                                    @foreach ($all_products as $key => $p)
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <a title="Magnesium Hydroxide" href="{{ getproducturl($p) }}">
                                                        <figure class="image-box"><img
                                                                src="{{ get_thumb_url_500('products', $p->thumbnail_img, 1) }}"
                                                                alt="{{ $p->name }}"></figure>
                                                    </a>
                                                    <div class="lower-content">
                                                        <div class="text centred">
                                                            <h6><a title="{{ $p->name }}"
                                                                    href="{{ getproducturl($p) }}">{{ $p->name }}</a>
                                                            </h6>
                                                        </div>
                                                        <div class=" centred fg">
                                                            <a class="det" href="{{ getproducturl($p) }}">View Details
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>

                            </div>
                        @endif


                    </div>


                </div>
                <div class="row xxp">
                    <div class="col-xs-12">
                        <ul class="pagination ">
                            {{ $all_products->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="clear"> </div>

    </div>
@endsection --}}








{{-- =================== new =============== --}}



@section('content')

    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
         
        <div class="animated fadeIn">

            <div class="header_banner">
                <img class=""
                        src="{{ get_thumb_url_400('banners', '/' . $basic_details->featured_banner, 0) }}"
                        alt="{{ $basic_details->name }}">


                        <div class="container-fluid  mb-5 wow fadeIn search_bar" data-wow-delay="0.1s" style="padding: 35px;">
                            <div class="container">
                                <form method="GET" action="/products">
                                <div class="row g-2">
                                    <div class="col-md-10">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control border-0 py-2" placeholder="Search Keyword" name="property_keyword" {{ isset($search_term["property_keyword"]) ? 'value='.$search_term["property_keyword"] : '' }} >
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-select border-0 py-2" name="property_type">
                                                    <option value="" {{ isset($search_term["property_type"]) ? '' : 'selected' }}>Property Type</option>
                                                    <option value="rent" {{ isset($search_term["property_type"]) && $search_term["property_type"] == 'rent' ? 'selected' : '' }}>Rent</option>
                                                    <option value="sale" {{ isset($search_term["property_type"]) && $search_term["property_type"] == 'sale' ? 'selected' : '' }}>Sale</option>
                                                    <option value="both" {{ isset($search_term["property_type"]) && $search_term["property_type"] == 'both' ? 'selected' : '' }}>Both</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-select text-capitalize border-0 py-2" name="property_location">
                                                    <option value="" {{ isset($search_term["property_location"]) ? '' : 'selected' }}>Location</option>
                                                    @foreach(getSearchBarData() as $address)
                                                    <option value="{{ $address }}" {{ isset($search_term["property_location"]) && $search_term["property_location"] == $address ? 'selected' : '' }}>{{ $address }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary border-0 w-100 py-2">Search</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>


            </div>
        </div>
</div>
<!-- Header End -->

    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">

            @if(!$is_filtered)
                <div class="row g-0 gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h2 class="mb-3">Discover Your Dream Property</h2>
                            <p>  Explore a wide range of properties that match your lifestyle and preferences. 
                                From modern apartments to spacious family homes, find the perfect place to call home.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#both">Both</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#forSale">For Sale</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#forRent">For Rent</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif


            @if($is_filtered)
                
                <div class="tab-content">

                    <div id="both" class="tab-pane fade show p-0 active">
                        <div class="row g-4">

                            @foreach ($all_products as $key => $p)
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href="{{ getproducturl($p) }}"><img class="img-fluid"
                                                    src="{{ get_thumb_url_500('products', $p->thumbnail_img, 1) }}"
                                                    {{ $p->name }}></a>
                                            <div
                                                class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3 text-capitalize">
                                                For {{ $p->property_for }}</div>
                                            <div
                                                class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                {{ $p->industry->name }}</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">PKR {{ $p->price }}</h5>
                                            <a class="d-block h5 mb-2" href="{{ getproducturl($p) }}">{{ $p->name }}</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $p->address }}</p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-ruler-combined text-primary me-2"></i>{{ $p->size }}
                                                Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-bed text-primary me-2"></i>{{ $p->bed }} Bed</small>
                                            <small class="flex-fill text-center py-2"><i
                                                    class="fa fa-bath text-primary me-2"></i>{{ $p->bath }} Bath</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>    

            @else

                <div class="tab-content">

                    <div id="both" class="tab-pane fade show p-0 active">
                        <div class="row g-4">

                            @foreach ($all_products as $key => $p)
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href="{{ getproducturl($p) }}"><img class="img-fluid"
                                                    src="{{ get_thumb_url_500('products', $p->thumbnail_img, 1) }}"
                                                    {{ $p->name }}></a>
                                            <div
                                                class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3 text-capitalize">
                                                For {{ $p->property_for }}</div>
                                            <div
                                                class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                {{ $p->industry->name }}</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">PKR {{ $p->price }}</h5>
                                            <a class="d-block h5 mb-2" href="{{ getproducturl($p) }}">{{ $p->name }}</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $p->address }}</p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-ruler-combined text-primary me-2"></i>{{ $p->size }}
                                                Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-bed text-primary me-2"></i>{{ $p->bed }} Bed</small>
                                            <small class="flex-fill text-center py-2"><i
                                                    class="fa fa-bath text-primary me-2"></i>{{ $p->bath }} Bath</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div id="forSale" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            @foreach ($all_products as $key => $p)
                                @if ($p->property_for == 'sale')
                                    <div class="col-lg-4 col-md-6  "  >
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href="{{ getproducturl($p) }}"><img class="img-fluid"
                                                        src="{{ get_thumb_url_500('products', $p->thumbnail_img, 1) }}"
                                                        {{ $p->name }}></a>
                                                <div
                                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3 text-capitalize">
                                                    For {{ $p->property_for }}</div>
                                                <div
                                                    class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                    {{ $p->industry->name }}</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">PKR {{ $p->price }}</h5>
                                                <a class="d-block h5 mb-2"
                                                    href="{{ getproducturl($p) }}">{{ $p->name }}</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $p->address }}
                                                </p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i
                                                        class="fa fa-ruler-combined text-primary me-2"></i>{{ $p->size }}
                                                    Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i
                                                        class="fa fa-bed text-primary me-2"></i>{{ $p->bed }} Bed</small>
                                                <small class="flex-fill text-center py-2"><i
                                                        class="fa fa-bath text-primary me-2"></i>{{ $p->bath }}
                                                    Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            {{-- <div class="col-lg-4 col-md-6">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href=""><img class="img-fluid" src="img/property-1.jpg"
                                                alt=""></a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            For Sell</div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            Appartment</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">$12,345</h5>
                                        <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                        <small class="flex-fill text-center py-2"><i
                                                class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>

                    <div id="forRent" class="tab-pane fade show p-0">
                        <div class="row g-4">

                            @foreach ($all_products as $key => $p)
                            @if ($p->property_for == 'rent')
                                <div class="col-lg-4 col-md-6 "  >
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href="{{ getproducturl($p) }}"><img class="img-fluid"
                                                    src="{{ get_thumb_url_500('products', $p->thumbnail_img, 1) }}"
                                                    {{ $p->name }}></a>
                                            <div
                                                class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3 text-capitalize">
                                                For {{ $p->property_for }}</div>
                                            <div
                                                class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                {{ $p->industry->name }}</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">PKR {{ $p->price }}</h5>
                                            <a class="d-block h5 mb-2"
                                                href="{{ getproducturl($p) }}">{{ $p->name }}</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $p->address }}
                                            </p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-ruler-combined text-primary me-2"></i>{{ $p->size }}
                                                Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-bed text-primary me-2"></i>{{ $p->bed }} Bed</small>
                                            <small class="flex-fill text-center py-2"><i
                                                    class="fa fa-bath text-primary me-2"></i>{{ $p->bath }}
                                                Bath</small>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
    
                            
                        </div>
                    </div>
                </div>       
                
            @endif

            <div class="row xxp">
                <div class="col-xs-12">
                    <ul class="pagination ">
                        {{ $all_products->links() }}
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Property List End -->
@endsection
