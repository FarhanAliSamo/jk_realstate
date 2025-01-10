@extends('frontend.template')

@section('styles')
	
<style type="text/css">



/* blogs view general css start */


body .innercaption h2 {
    max-width: 80%;
    font-size: 32px !important;
    line-height: 34px !important;
}


section.blogs-view-wrapper h1 {
    font-size: 38px;
    color: #000 !important;
    text-transform: capitalize;
    padding-top: 0;

}

section.blogs-view-wrapper h2 {
    font-size: 32px;
    color: #000 !important;
    text-transform: capitalize;

}

section.blogs-view-wrapper h3 {
    font-size: 26px;
    color: #000 !important;
    text-transform: capitalize;

}

section.blogs-view-wrapper h4 {
    font-size: 20px;
    color: #000 !important;
    text-transform: capitalize;

}

section.blogs-view-wrapper h5 {
    font-size: 18px;
    color: #000 !important;
    text-transform: capitalize;

}

section.blogs-view-wrapper h6 {
    font-size: 14px;
    color: #000 !important;
    text-transform: capitalize;

}


section.blogs-view-wrapper p {
    font-size: 14px;
    color: #595d61 !important;
    text-transform: capitalize;

}


@media only screen and (min-width: 320px) and (max-width: 999px) {
    
    
body .innercaption h2 {
    max-width: unset;
    font-size: 18px !important;
    line-height: 20px !important;
}

body .innercaption {
    top: 20% !important;
}
section.blogs-view-wrapper h1 {
    font-size: 25px;
    color: #000 !important;
    text-transform: capitalize;

}

section.blogs-view-wrapper h2 {
    font-size: 23px;
    color: #000 !important;
    text-transform: capitalize;

}

section.blogs-view-wrapper h3 {
    font-size: 21px;
    color: #000 !important;
    text-transform: capitalize;

}

section.blogs-view-wrapper h4 {
    font-size: 18px;
    color: #000 !important;
    text-transform: capitalize;

}

section.blogs-view-wrapper h5 {
    font-size: 16px;
    color: #000 !important;
    text-transform: capitalize;

}

section.blogs-view-wrapper h6 {
    font-size: 14px;
    color: #000 !important;
    text-transform: capitalize;

}

    
}



section.blogs-view-wrapper img {
    float: unset !important;
    margin: 0 auto 20px auto;
    width: unset !important;
}


section.blogs-view-wrapper {
    padding-top: 20px;
    padding-bottom: 40px;
    
    text-align: center;
}

.blog-box-shad{
    background-color: #fff;
    /* border:solid 1px #ccc; */
     padding:20px 15px 30px 15px; 
    margin-top:30px;
    box-shadow: 0 0 10px #ccc;
    transform: unset !important;
    border: unset;
}


.blog-box-shad:hover {
    transform: unset !important;
    box-shadow: 0 0 10px #ccc !important;
    border: unset;
}

/* blogs view general css end */




    .blog-list .blog-list-heading {
        font-size: 16px;
        margin-bottom: 10px;
    }
    
    .blog-list {
        margin-bottom: 20px;
    }
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        background: #cf2126;
        border: 1px solid #cf2126;
    }    
    
    
    
    

.blog-veiw-section img {
    float: unset;
    margin-right: 20px;
}

.leavereply .col-md-6.col-xs-12.form-group {
    margin-bottom: 20px;
}

.leavereply .form-group.full {
    margin-bottom: 20px;
}

section.blogs-view-wrapper h1 {
    font-weight: 700;
    font-size: 30px;
    margin-bottom: 30px;
}

.blog-section.blog-veiw-section p {
    font-size: 15px;
    color: #000 !important;!i;!;
}
</style>



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
				<h2>{{$blog->title}}</h2>
			</div>
		</div>
	</div>
	
	
<section class="blogs-view-wrapper">	
	<div class="container">
	    <div class="row">
	        <div class="col-xs-12 col-md-12 blog-box-shad" style="margin-bottom: 20px;">
	            <div class="blog-section blog-veiw-section">
	                <h1>{{$blog->title}}</h1>
	                
	                <div class="sharethis-inline-share-buttons" style="margin-bottom:20px"></div>
	                
	                <img src="{{asset('uploads/images/blogs/'.$blog->featured_image)}}" title="{{$blog->created_at}}" class="img-responsive">
	                
	                
	                {!! $blog->content !!}
	                
	                
	            </div>
	        </div>
	    </div>

	</div>
</section>	

<style>


/* blogs comments css start */

.approved-msg h4 {
    font-size: 20px;
    display: inline-block;
    border-bottom: solid 2px;
}

.approved-msg h5 {
    color: #878282;
}

.approved-msg h6 {
    font-size: 16px;
    line-height: 21px;
    color: #000000c7;
}

section.leavereply {
    margin-bottom: 20px;
}

section.leavereply h2.reply {
    color: #fc5e5a;
    font-weight: 700;
    font-size: 22px;
}

/* blogs comments css end */

</style>


@endsection


@section('scripts')


<script>

$(document).ready(function(){
       
    $('#save_comments').submit(function (e) {
        e.preventDefault();
        formInstance = $(this);
        var prevBtnText = formInstance.find('.form_submit_button').html();
        formInstance.find('.form_submit_button').prop('disabled',true).html('Loading...');


        var data = formInstance.serialize();

        var url = formInstance.attr('action');

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(data){
                formInstance.trigger('reset');
                formInstance.find('.form_submit_button').prop('disabled',false)
                formInstance.find('.form_submit_button').html(prevBtnText);
                formInstance.find('.form_message_container').html ("<div class='alert alert-success alert-dismissable'>Your message has been sent successfully. It will be published shortly after review.</div>");
                formInstance.find('.form_error_container').html('');
                // setTimeout(function(){window.location = redirectionUrl;},2000);
                
                setTimeout(function(){
                        window.location.reload(1);
                    }, 2000);
            },
            error: function(msg){
                formInstance.find('.form_error_container').html('');
				var err = JSON.parse(msg.responseText);
				$.each(err.errors, function(key, val){
				    if(typeof(val[0]) !== 'undefined' && val[0] != val[0].replace('Entered_','') ){
				        var str_arr = val[0].split("Entered_");
				        formInstance.find('.form_error_container').append("<div>"+str_arr[0]+"</div>");
                        formInstance.find('.form_captcha').html(str_arr[1]);
				    }
                    else
                    {
						formInstance.find('.form_error_container').append("<div>"+val+"</div>");
				    }
				});

                formInstance.find('.form_error_container').removeClass();
				formInstance.find('.form_error_container').addClass('alert alert-danger');
                formInstance.find('.form_submit_button').prop('disabled',false).html(prevBtnText);
                
                setTimeout(function(){
                        window.location.reload(1);
                    }, 2000);
            }
        });
    
       return false;
    });
    
});
       
</script>

<script>
$(document).ready(function(){
    var headerHeight = $('sections').outerHeight() + 431;
    var footerHeight = $('footer').outerHeight() + 60;
    $('.sticky-shares').affix({
      offset: {
        top: headerHeight,
        bottom: footerHeight
      }
    });    
});

</script>


<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5ff587d074e0a600127b0c0e&product=inline-share-buttons" async="async"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

@endsection