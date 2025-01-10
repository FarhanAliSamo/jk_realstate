


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

          <!-- Contact Start -->
          <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Contact Us</h1>
                    <p class="mb-1">Looking for your dream property or have questions? Get in touch with us today, and let us help you find the perfect match.</p>

                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="bg-light rounded p-3">
                                    <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                        <div class="icon me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-map-marker-alt text-primary"></i>
                                        </div>
                                        <span>{{ $basic_details->address }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="bg-light rounded p-3">
                                    <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                        <div class="icon me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-envelope-open text-primary"></i>
                                        </div>
                                        <span>{{ $basic_details->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="bg-light rounded p-3">
                                    <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                        <div class="icon me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-phone-alt text-primary"></i>
                                        </div>
                                        <span>+{{ $basic_details->phone_number }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <p class="mb-1">Have questions about our properties? Contact us using the form below, and we’ll respond promptly.</p>

                            <form class="form_submit" id='form21' method="post" action="/save_contact/2"
                                                autocomplete="off">

                                <div class="row g-3">

                                    <div class="col-md-12">
                                        <div id="form_success" class="form_success"></div>
                                        <div id="err_msg_1" class="err_msg_1"></div>
                                    </div>
                                    {{ csrf_field() }}

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" maxlength="150"
                                            id='inquiry_form_name' placeholder="" name="inquiry_form_name"
                                             required>
 
                                            <label >Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" maxlength="100"
                                            id='inquiry_form_email' name="inquiry_form_email" placeholder=""
                                             required>
                                            <label>Your Email</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" maxlength="50"
                                            id='inquiry_form_phone' name="inquiry_form_phone"
                                            placeholder="Phone Number" required>

                                            <label >Phone Number</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" required id="inquiry_form_subject" name="inquiry_form_subject" placeholder="">
                                            <label  >Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">

                                            <textarea id='inquiry_form_message' name="inquiry_form_message" class="form-control" maxlength="1500" rows="5"
                                            placeholder="Leave a message here" required></textarea>

                                           
                                            <label >Message</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row" >
                                            <div class="col-md-4 col-sm-6 col-lg-6">
                                                <input class="form-control ca" type="text" id="captcha"
                                                    name="captcha" placeholder="Captcha" required="">
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-lg-6 cap_img">
                                                {!! $captcha_img !!}
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12 cap_codee">
                                                {{-- <button id='inquiry_form_btn'
                                                    class="btn btn-primary inquiry_form_btn" type="submit"
                                                    title="Submit">Send Message</button> --}}
                                                    <button id='inquiry_form_btn' class="btn btn-primary inquiry_form_btn w-100 py-3" type="submit">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
 
	
@endsection

