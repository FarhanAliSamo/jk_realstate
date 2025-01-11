@extends('frontend.template', ['showmore' => 'yes'])

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


    <!-- Search Start -->
    {{-- <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword">
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3">
                                <option selected>Property Type</option>
                                <option value="1">Property Type 1</option>
                                <option value="2">Property Type 2</option>
                                <option value="3">Property Type 3</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3">
                                <option selected>Location</option>
                                <option value="1">Location 1</option>
                                <option value="2">Location 2</option>
                                <option value="3">Location 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100 py-3">Search</button>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Search End -->


    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container"> 

            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Property Types </h1> 
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                    sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>

            <div class="row g-4">
                @foreach($industries as $key => $f_ind)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3"
                            href="/product-category/{{ $f_ind->slug }}">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid"
                                        src="/uploads/images/categories/{{ $f_ind->featured_image }}"alt="{{ $f_ind->name }}">
                                </div>
                                <h6>{{ $f_ind->name }}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Category End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="/assets_2/img/about.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h2 class="mb-1">About Us</h2>
                    <h5 class="mb-4 text-primary border-start border-3 ps-2  border-primary">
                        {{ $basic_details->company_name }}</h5>

                    <p class="mb-4">
                        @if (isset($seo_content['about_us']['content']))
                            {!! $seo_content['about_us']['content'] !!}
                        @endif
                    </p>

                    {{-- <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p> --}}
                    <a class="btn btn-primary py-3 px-5 mt-3" href="/about-us">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-12">
                    <div class="text-start mx-auto mb-5 wow slideInLeft d-flex justify-content-between align-items-center" data-wow-delay="0.1s">
                        <div>

                            <h1 class="mb-3">Recent Property Listing</h1>
                            <p style="max-width:600px">Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                                eirmod sit diam justo sed rebum.</p>
                            </div>

                            <div>
                                <a style="height: 40px" class=" btn d-flex justify-content-center align-items-center  btn-primary py-1 " href="/">See More</a>
                            </div>


                    </div>
                </div>
                 
            </div>



            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">


                        @foreach ($products as $key => $p)

                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ getproducturl($p) }}"><img class="img-fluid" src="{{ get_thumb_url_500('products', $p->thumbnail_img, 1) }}" {{ $p->name }}></a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3 text-capitalize">For {{ $p->property_for }}</div>
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $p->industry->name }}</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">PKR {{ $p->price }}</h5>
                                        <a class="d-block h5 mb-2" href="{{ getproducturl($p) }}">{{ $p->name }}</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $p->address }}</p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{ $p->size }} Sqft</small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{ $p->bed }} Bed</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{ $p->bath }} Bath</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12  text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                        </div>






 
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <!-- Property List End -->


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







    <section class="seo-content">
        <div class='container' style='margin-top:0px;'>
            @if (isset($seo_content['home_content1']['content']) && isset($seo_content['home_content2']['content']))
                <div class='row home'>
                    <div class='col-md-6'>
                        <p>{!! $seo_content['home_content1']['content'] !!}</p>
                    </div>
                    <div class='col-md-6'>
                        <p>{!! $seo_content['home_content2']['content'] !!}</p>
                    </div>
                </div>
            @endif
            @if (isset($seo_content['home_content3']['content']) && isset($seo_content['home_content4']['content']))
                <div class='row home'>
                    <div class='col-md-6'>
                        <p>{!! $seo_content['home_content3']['content'] !!}</p>
                    </div>
                    <div class='col-md-6'>
                        <p>{!! $seo_content['home_content4']['content'] !!}</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

