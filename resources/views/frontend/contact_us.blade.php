@extends('frontend.template')

@section('styles')

<style type="text/css">
.shadow-box h2 {
    text-align: center;
    padding: 0px 0 10px 0;
}

.contactmain form .col-md-4 {
    padding: 0;
    float: left;
}
.col-md-6.CONS img {
    margin-top: 200px;
}
.contact-list li i {
    color: white !important;
    font-size: 30px;
    padding: 10px 0 10px 0;
}
ul.contact-list li {
    list-style: none;
}
span.subtitle.dash-true.style-dark.text-default {
    font-size: 28px;
    text-align: center;
    margin: 0 auto;
    font-weight: 600;
}
.form-group img {
    position: absolute;
    margin-top: 9px;
    margin-left: 9px;
}
.contactmain .form-control {
    padding: 10px 50px 4px 10px;
}
.siteorigin-widget-tinymce.textwidget.no-mrg {
    text-align: center;
    padding: 40px 20px 0px 20px;
    padding-top: 0px;
}
.cont-extra-ab p {
    font-size: 18px;
    color: white;
    padding: 20px 20px 0 20px;
    text-align: left;
}

.shadow-box {
    margin-top: 0; !important
}



.contact-list li {
    font-size: 18px !important;
    color: white;
    padding: 0px 20px 23px 20px;
}

.cont-cont-p {
    padding: 30px 0 20px 0;
}

ul.contact-list {
    padding: 10px 0 0 0;
}
.cap_img {
    padding-left: 10px !important;
    overflow: hidden;
}

.col-md-4.col-sm-6.col-xs-6.cap_img img {
    max-width: 100%;
    margin-bottom: 8px;
}

.contactmain button#inquiry_form_btn {
    background-color: #41b296;
    border: 1px solid #41b296;
    font-size: 14px;
    padding: 10px 20px 10px 20px;
}
.contactmain {
    margin-top: 80px;
}


.form-control {
    resize: none !important;
}

.form-group {
    margin-bottom: 17px;
}

.col-md-6.paddingg {
    float: left;
}

.contactmain form .col-md-6 {
    float: left;
}
p.feature-text {
    font-size: 22px;
    font-weight: 600;
}
.contactmain button#inquiry_form_btn {
    background-color: #2480c1;
    border: 1px solid #2480c1;
    font-size: 14px;
    padding: 10px 20px 10px 20px;
}
ul.contact-list {
    padding: 0;
}
.contactmain .container {
    padding: unset;
    box-shadow: none;
    position: unset;
    margin-bottom: unset;
    text-align: unset !important;
}


.paddingg input#inquiry_form_email {margin-left: 15px;}


section.adds {
    background-color: #f5f5f5;
    padding: 100px 0px;
}
.feature-box.box-hovered {
    background: #fefefe;
    box-shadow: 0 2px 5px 0px rgb(0 0 0 / 7%);
    height: 180px !important;
    padding: 35px;
}
.feature-box.icon-top-centered {
    text-align: center;
}
.shadow-box {
    padding: 50px!important;
    height: 520px;
    padding-top: 10px !important
    margin-bottom: 50px;
    max-width:75%;
    margin:0 auto;
}
.body-dark .feature-title, .feature-box .feature-title {
    color: #333;
    font-size: 1.3em;
    line-height: 1.2em;
    margin-bottom: 0;
}
.shadow-box:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #fff;
    left: 0;
    top: 0;
    z-index: -1;
}
.shadow-box, .shadow-box.light {
    position: relative;
    padding: 50px;
    background: #fff;
    
}
.container.s {
    box-shadow: 0 2px 15px 0px rgb(0 0 0 / 7%);
        padding: 0 12px;
  
}
.col-md-6.CONS {
    background-image: url(/images/contactus.jpg);
}

.cont-cont-p h3 {
    text-align: center;
    color: white;
    font-size: 37px;
}

.cont-cont-p h4 {
    text-align: center;
    font-size: 18px;
    color: white;
}
button#inquiry_form_btn:hover {
    background-color: #00aeef;
    box-shadow: unset;
    border-color: #00aeef;
}
input#inquiry_form_email {
    margin-left: 10px;
    width: 100%;
    display: inline;
    margin: 0 auto;
    /* text-align: center; */

}

a.cta-footer {
    position: relative;
    display: block;
    text-align: center;
    background: #2d2e29;
    margin: 0;
    padding: 50px;
    text-decoration: none;
    transition: .1s;
    margin-top: -10px;
    border-top: 1px solid rgba(0,0,0,.1);
    position: relative;
    top: 2px;
}

a.cta-footer h2, a.cta-footer h2:after {
    color: #ffffff!important;
}
body .contactmain {
    padding-top: 10px !important;
}
.feature-box.icon-top-centered.box-hovered.default span {
    font-size: 25px;
}
.fa, .far, .fas {
    font-family: "Font Awesome 5 Free" !important;
}


/*section.menu-menu {*/
/*    position: unset;*/
/*}*/

/*body .row.menus {*/
/*    background-color: unset;*/
/*    box-shadow: unset;*/
/*}*/
	.contact-list li{
		font-size: 16px;
		padding:4px;
	}
	h2.contact-head {
    font-size: 32px;
    color: #c90916;
    font-weight: 700;
    font-family: 'Roboto', sans-serif;
    padding-bottom:20px;
    
    
}
ul.contact-list h5 {
    font-weight: 700;
    font-family: 'Roboto', sans-serif;
    margin-bottom: 1px;
    color: #2a2a2b;
    font-size: 16px;
    
}
.alert-danger {
    padding: 1px 10px;
}

p.info {
    padding-bottom: 20px;
}

.contactmain .form-control {
    background: transparent;
    border: 1px solid #e6e1e1;
    border-radius: 6px;
}
.col-md-5.PACK {
height: 500px;
background: #eaeaea;
padding: 40px;
border-top-right-radius: 10px;
    
}
.col-md-6.back-colour {
    border: black;
    padding:40px;
}

.container.entry {
    border-radius: 10px;
    box-shadow: 0 0 10px #ccc;
    position: relative;
    background: #fff;
    height: 500px;
  
}


	.contact-list li i{
		margin-right: 10px;
		color:#242424;
	}
	
	.map_img{
	    height:auto;
	}
	
	h2.title {
    border-bottom: 1px dotted;
    color: #282828 !important;
    position: relative;
    display: inline-block;
    padding-bottom: 3px;
    font-size: 30px;
    font-weight:600;
}

h2.title:after {
    content: '';
    position: relative;
    bottom: -4px;
    border-bottom: 5px solid #0f4e98;
    width: 30%;
    display: flex;
}

h2.title {
    margin-left: 15px;
}
.cont {
    position: inherit;
}

ul.contact-list2 li {
    list-style: none;
    display: -webkit-box;
}
ul.contact-list2 .fa, ul.contact-list2 .fab {
    color: #0f4e98 !important;
    display: inline-block;
    font-size: 16px;
    width: 32px;
    height: 32px;
    line-height: 32px;
    top: -2px;
    word-spacing: 1px;
    position: relative;
    text-align: center;
    vertical-align: middle;
    max-width: 100%;
}
.contactmain form .col-md-6 {
    padding: 0;
}
.contactmain form .col-md-12 {
    padding: 0;
}
.contactmain form .col-md-4 {
    padding: 0 !important;
}

body .contactmain {
    background-color: unset !important;

    
    background-position: left top;
    background-repeat: repeat;
    background-color: #ffffff;
}
h2.info-info {
    font-size: 32px;
    color: #c90916;
    font-weight: 700;
    font-family: 'Roboto', sans-serif;
    padding-bottom: 20px;
}
.contactmain .btn-primary {
    padding: 6px 10px;
}


.contactmain {
    padding: 0 0 50px 0 !important;
}

.cap_code {
    /* text-align: right; */
    margin-top: -40px;
    float: right;}

@media only screen and (max-width: 992px)
{

.cap_code {
    margin-top: 10px;
    margin-left: 0px;
}
.contactmain {
    margin-top: 0px;
}
.col-md-4.col-sm-6.col-xs-6 {
    float: left;
    padding: 0 0px !important;
    max-width: 49%;
}

body .shadow-box, .shadow-box.light {
    height: unset !important;
    background: unset !important;
    background-color: unset !important;
    box-shadow: unset;
}
body .shadow-box {
    padding: 10px!important;
    height: auto;
    margin-top: 50px;
    margin-bottom: 50px;
}

body input#inquiry_form_email {
    margin-left: 0px !important;
    width: 100%;
}

body .contactmain .btn-primary {
    padding: 6px 10px;
    text-align: left;
    display: block;
    margin-top: 20px;
}
body .contactmain form .col-md-4 {
  padding-left: 17px;
}


}
	
</style>

@endsection

@section('content')	
	<div class="bannermain innerbanner">
		<div class="banner_overlay"></div>
<img src="{{get_thumb_url_400('banners',"/".$basic_details->featured_banner,1)}}" alt="{{$basic_details->name}}">
		<div class="innercaption">
			<div class="container">
				<h2>Contact Us</h2>
			</div>
		</div>
	</div>
	

	<div class="contactmain">
		<div class="container s ">
		    
		    
		    
			<div class="row">
			    
			       <div class="col-md-12 ssss">
			    <div id="pgc-28-1-0" class="panel-grid-cell">
			        <div id="panel-28-1-0-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="3">
      <div class="so-widget-sow-editor so-widget-sow-editor-base">
         <div class="siteorigin-widget-tinymce textwidget no-mrg">
            <!--<span class="subtitle dash-true style-dark text-default">Contact with us.</span>-->
            <!--<h2><strong>Simply fill out the form below as best you can. And don't sweat the details</strong></h2>-->
         </div>
      </div>
   </div>
   
   <div id="panel-28-1-0-1" class="so-panel widget widget_sow-editor panel-last-child" data-index="4">
      <div class="shadow-box btn-fullwidth panel-widget-style panel-widget-style-for-28-1-0-1">
          <h2>Kindly Submit Your Information</h2>
         <div class="so-widget-sow-editor so-widget-sow-editor-base">
            <div class="siteorigin-widget-tinymce textwidget">
               <div class="siteorigin-widget-tinymce textwidget">
                  	<form class="form_submit" id='form21' method="post" action="/save_contact/2" autocomplete="off" >
                  <div class="col-md-12">
                     <div id="form_success" class="form_success"></div>
                     <div id="err_msg_1" class="err_msg_1"></div>
                  </div>
                  <div class="col-md-12">
                     <div role="form" class="wpcf7" id="wpcf7-f264-o2" lang="en-US" dir="ltr">
                        {{csrf_field()}}
                        <div class="col-md-12">
                           <div class="form-group">
                             <input type="text" class="form-control" maxlength="150" id='inquiry_form_name' name="inquiry_form_name" placeholder="Full Name" required>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                             <input type="text" class="form-control" maxlength="50" id='inquiry_form_phone' name="inquiry_form_phone" placeholder="Phone Number" required>
                           </div>
                        </div>
                        <div class="col-md-12 ">
                           <div class="form-group">
                           <input type="email" class="form-control" maxlength="100" id='inquiry_form_email' name="inquiry_form_email" placeholder="Email Address" required>
                           </div>
                        </div>
                        <input type="hidden" name="inquiry_form_subject" value="{{$basic_details->company_name}} Inquiry">
                        <!-- Test --> 
                     </div>
                      <div class="col-md-12">
			                <div class="form-group full">
			                    <textarea id='inquiry_form_message' name="inquiry_form_message" class="form-control" maxlength="1500" rows="5" placeholder="Message" required></textarea>
			                </div>
              </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group full">
                     </div>
                  </div>
                  <div class="form-row" style="height: 62px;">
                     <div class="col-md-4 col-sm-6 col-xs-6">
                        <input class="form-control ca" type="text" id="captcha" name="captcha" placeholder="Captcha" required="">
                     </div>
                     <div class="col-md-4 col-sm-6 col-xs-6 cap_img" >
                        {!! $captcha_img !!}
                     </div>
                     <div class="col-md-4 col-sm-6 col-xs-12 cap_codee">
                        <button id='inquiry_form_btn' class="btn btn-primary inquiry_form_btn" type="submit" title="Submit">Send Message</button>
                     </div>
                  </div>
               </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!--<div class="col-md-6 CONS">-->
    
<!--<div class="cont-cont-p">-->
<!--    <h3>Get Quick Response</h3>-->
<!--    <h4>Share your needs with us, We'll contact you in very short time.</h4>-->
    
<!--</div>-->
<!--<ul class="contact-list">-->
<!--	                    <li> <i class="fa fa-map-marker" aria-hidden="true"></i> {{$basic_details->address}}</li>-->
<!--						<li> <i class="fa fa-phone"></i>{{$basic_details->phone_number}}</li>-->
							<!--<li> <i class="fa fa-phone"></i>{{$basic_details->phone_number2}}</li>-->
<!--						<li> <i class="fa fa-envelope"></i>{{$basic_details->email}}</li>							-->
<!--			        	<li> <i class="fab fa-whatsapp" aria-hidden="true"></i> {{$basic_details->phone_number}}</li>-->
			        	<!--<li> <i class="fab fa-weixin" aria-hidden="true"></i> {{$basic_details->wechat}}</li>-->
			        	<!--<li> <i class="fab fa-skype" aria-hidden="true"></i> weng.haipeng</li>-->
			        	
<!--					</ul>-->
<!--					<div class="cont-extra-ab">-->
					  
<!--					</div>-->
<!--					    <div class="footer-social sd">-->
                  
<!--                  </div>-->
					
<!--</div>-->

</div>	</div>
	</div>


	<div class="clear"> </div>

@endsection