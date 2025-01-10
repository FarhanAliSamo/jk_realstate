{{-- @extends('frontend.template')
 

@section('content')
    <div class="bannermain innerbanner">
        <div class="banner_overlay"></div>
        <img src="{{ get_thumb_url_400('banners', '/' . $basic_details->featured_banner, 1) }}" alt="{{ $basic_details->name }}">
        <div class="innercaption">
            <div class="container">
                <h2>About US</h2>
            </div>
        </div>
    </div>


    <section class="bread-crum">

        <div class="container">

            <div class="bread_crumb">
                <a href="/">Home</a> >
                <a href="/about-us">About Us</a>
            </div>

        </div>

    </section>








    <section class="content-inner-2"
        style="background-image:url(/images/pt-bg1.jpg); background-position:right top; background-size:70%; background-repeat:no-repeat;">
        <div class="container">

        </div>
        <div class="container">
            <div class="row align-items-center about-bx5">

                <div class="col-lg-12 m-b30 aos-item aos-init aos-animate" data-aos="fade-in" data-aos-duration="800"
                    data-aos-delay="400">
                    <div class="section-head style-3">
                        <h1>
                            @if (isset($seo_content['about_h1']['content']))
                                {!! $seo_content['about_h1']['content'] !!}
                            @endif
                        </h1>
                    </div>
                    <p>
                        @if (isset($seo_content['about_us_page']['content']))
                            {!! $seo_content['about_us_page']['content'] !!}
                        @endif
                    </p>


                </div>
            </div>
        </div>
    </section>
@endsection
 


 --}}


@extends('frontend.template')

@section('styles')
@endsection

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
                                                    <input type="text" class="form-control border-0 py-2" placeholder="Search Keyword" name="property_keyword">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select border-0 py-2" name="property_type">
                                                        <option value="" selected>Property Type</option>
                                                        <option value="rent">Rent</option>
                                                        <option value="sale">Sale</option>
                                                        <option value="both">Both</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select text-capitalize border-0 py-2" name="property_location">
                                                        <option value="" selected>Location</option>
                                                        @foreach(getSearchBarData() as $address)
                                                        <option value="{{ $address }}">{{ $address }}</option>
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

 


 
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-start mt-4">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="/assets_2/img/about.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-1">
						@if (isset($seo_content['about_h1']['content']))
						{!! $seo_content['about_h1']['content'] !!}
					@endif
					</h1>

                    <h5 class="mb-4 text-primary border-start border-3 ps-2  border-primary">
                        {{ $basic_details->company_name }}</h5>

						
                    <p class="mb-4">
                       @if (isset($seo_content['about_us_page']['content']))
                            {!! $seo_content['about_us_page']['content'] !!}
                        @endif
                    </p>
  
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
 
    <!-- Call to Action Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded w-100" src="/assets_2/img/call-to-action.jpg" alt="">
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="mb-4">
                                <h1 class="mb-3">Contact With Our Certified Agent</h1>
                                <p>Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit diam
                                    justo sed vero dolor duo.</p>
                            </div>
                            <a href="tel:{{ $basic_details->phone_number }}" class="btn btn-primary py-3 px-4 me-2"><i
                                    class="fa fa-phone-alt me-2"></i>Make A Call</a>
                            <a href="/contact-us" class="btn btn-dark py-3 px-4"><i
                                    class="fa fa-calendar-alt me-2"></i>Get Appoinment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->




    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Our Clients Say!</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                    sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="/assets_2/img/testimonial-1.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="/assets_2/img/testimonial-2.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="/assets_2/img/testimonial-3.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
	
@endsection

