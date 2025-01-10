@extends('frontend.template')

@section('styles')
	
<style type="text/css">




</style>


<!-- Add jQuery library -->
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>-->

<!-- Add mousewheel plugin (this is optional) -->
<!--<script type="text/javascript" src="/assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>-->


@endsection

@section('content')	

<div class="bannermain innerbanner">
		<div class="banner_overlay"></div>
			@if(isset($meta_info['featured_banners']) )

    		<img src="/uploads/images/banners/{{$meta_info['featured_banners']}}" alt="{{$basic_details->name}}">
		
	    @else
		
		<img src="{{get_thumb_url_400('banners',"/".$basic_details->featured_banner,1)}}" alt="{{$basic_details->name}}">
		
		@endif
		<div class="innercaption">
			<div class="container">
				<h2>Blogs</h2>
			</div>
		</div>
	</div>
		<section class="bread-crum">
        
        <div class="container">
        
            <div class="bread_crumb">
    	            <a href="/">Home</a> > 
    	            <a href="/blogs">Blogs</a>
    	    </div>
	    
	    </div>
         
    </section>
	<section class="blogs-section">
	<div class="container">
	    <div class="row">
	        <div class="col-xs-12 col-12" style="margin-bottom: 20px;">
	         
	        </div>
	    
	            
	             @foreach($data['blogs'] as $key=>$value)
          
                                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="inner-box">
                                <span class="post-date">{{$value->created_at->format('j-M-Y')}} </span>
                               
                                <h5><a href="blog/chemical-safety-and-risk-management-industry-best-practices">{{$value->title}}</a></h5>
                                <figure class="image-box"><a href="{{route('blogs.view',$value->slug)}}" title="{{$value->title}}"><img src="{{get_blogthumb_url_500('blogs/',$value->featured_image,1)}}" alt="{{$value->title}}"></a></figure>
                                <div class="btn-box">
                                    <a href="{{route('blogs.view',$value->slug)}}" title="{{$value->title}}"><i class="flaticon-right-arrow"></i>Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                          
                             @endforeach
	        
	        <div class="col-xs-12">
	            {{$data['blogs']->links()}}
	        </div>
	    </div>
	</div>
	</section>
	
	
@endsection


@section('scripts')

<script type="text/javascript" src="/assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.7"></script>

<script type="text/javascript" src="/assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="/assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="/assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="/assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>



<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

@endsection