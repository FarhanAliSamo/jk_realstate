@extends('frontend.template')

@section('styles')
	
<style type="text/css">
.section-head.style-3 {}

.section-head.style-3 h1 {
    font-weight: 700;
    font-size: 32px;
    color: #c2272c;
    margin-top: 50px;
}

.col-lg-12.m-b30.aos-item.aos-init.aos-animate p {color: #000;font-size: 16px;padding-top: 5px;}
.col-lg-12.m-b30.aos-item.aos-init.aos-animate li {color: #000;font-size: 16px;padding-top: 5px;}


section.content-inner-2 {
    padding-bottom: 50px;
}

.row.align-items-center.about-bx5 strong {
    font-size: 24px;
}
</style>

@endsection

@section('content')	
	<div class="bannermain innerbanner"  >
		<div class="banner_overlay"></div>
		<img src="{{get_thumb_url_400('banners',"/".$basic_details->featured_banner,1)}}" alt="{{$basic_details->name}}">
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
    
    
    
    
    

	
	
	<section class="content-inner-2" style="background-image:url(/images/pt-bg1.jpg); background-position:right top; background-size:70%; background-repeat:no-repeat;">
			<div class="container">
				
			</div>
			<div class="container">
				<div class="row align-items-center about-bx5">
				
					<div class="col-lg-12 m-b30 aos-item aos-init aos-animate" data-aos="fade-in" data-aos-duration="800" data-aos-delay="400">
						<div class="section-head style-3">
  <h1>@if(isset($seo_content['about_h1']['content']))
                  {!! $seo_content['about_h1']['content'] !!}
                  @endif</h1>
						</div>
						<p>  @if(isset($seo_content['about_us_page']['content']))
		        	{!! $seo_content['about_us_page']['content'] !!}
		         @endif</p>
					
					
					</div>
				</div>
			</div>
		</section>


@endsection