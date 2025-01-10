@extends('frontend.template')

@section('styles')

<style type="text/css">
tbody, td, tfoot, th, thead, tr {
    border-color: inherit;
    border-style: solid;
    border-width: 1px;
    padding: 8px;
}
.chance-pros-mainn {
    height: 370px;
    margin-top: 30px;
    margin-bottom: 0;
    transition: .3s ease;
    margin-bottom: 0 !important;
    /* background: #f5f5f5; */
    transition: .5s;
    position: relative;
    /* box-shadow: 0 0 10px #cccccc94; */
    margin: 0 10px;
    /* overflow: visible; */
    margin-top: 25px;
    /* border-bottom: 5px solid #3ebbd9; */
}
.chance-mainn-1 {
    max-width: 100%;
    height: 290px;
    position: relative;
    transition: .5s ease !important;
    margin-bottom: 0;
    position: relative;
    /* background: #ccc; */
    border: 10px solid #f3f3f3;
}

.chance-mainn-1 img {
    max-height: 100%;
    position: absolute;
    width: unset !important;
    max-width: 100%;
    transition: 0.5s;
    /* width: 100% !important; */
    /* height: 100%; */
    object-fit: cover;
    /* padding: 9px; */
    /* padding-bottom: 10px !important; */
    top: 0;
    bottom: 0;
    margin: auto !important;
    right: 0;
    left: 0;
    margin: 0 auto;
}
.img_active {
    border: 1px Solid #59BDE6;
}
.chance-innerr-wrapper-product a {
    color: #000000 !important;
    font-weight: 700;
    font-size: 16px;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: .3s !important;
    opacity: 1 !important;
    text-align: center;
    margin-bottom: 8px;
}
.prod_desc h2 {
    color: #000;
    font-weight: 700;
}
.container.prod_main {
    padding-top: 30px;
}
.col-md-1.col-xs-12.no-s {
    padding: 0;
    margin: 0;
}
ul.view-pro-img {
    white-space: nowrap;
    padding-left: 15px !important;
}
body .main-pic {
    border: 1px solid #ccc;
    margin-bottom: 10px;
}
.main-pic {
    height: 400px;
    /* line-height: 496px !important; */
    /* border: 1px Solid #ccc; */
    /* max-width: 20px; */
    text-align: center;
    padding: 0 !important;
    margin: 0 auto;
    float: none;
    position: relative;
}
.main-pic img {
    max-width: 100%;
    vertical-align: middle !important;
    max-height: 100% !important;
    position: absolute;
    left: 0;
    right: 0;
    margin: auto;
    bottom: 0;
    top: 0;
}
ul.view-pro-img {
    white-space: nowrap;
    padding-left: 15px !important;
}

.product_secondary_images_container {
    height: 80px;
    position: relative;
    margin: 0;
}
.product_secondary_images_container img {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
}

body .pd-thumbs ul li {
    text-align: left;
    padding-left: 0;
    width: 100%;
    display: block;
    margin-bottom: 10px;
}
.col-md-6.col-sm-12.col-xs-12.my-quote {
    padding-left: 20px;

}
h1.pgtitle {
    color: ##FF5101;
    font-weight: 700;
    margin-top: 0;
    font-size: 22px;
}
.short-descrition-inner {
    overflow: hidden;
    overflow-x: auto;
}

table {
    WIDTH: 100% !important;
    max-width: 100%;
    padding: 30px !important;
}
/*.prod_desc img {*/
/*    display: none !important;*/
/*}*/
.prod_desc h5 {
    color: #000;
    font-weight: 700;
    font-size: 18px;
    padding: 0 0 0 0;
}
.gernal-heads h2 {
    font-weight: 700;
}

/* alibaba product page css start */


.leadtime-table__value {
    padding: 4px 0;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.prod_desc table, .prod_desc td {
    max-width: 100%;

}


.prod_main .btn-primary {
    background: #93ba22;
}

button.btn.btn-primary.inquiry-pops {
    background: #23a89b;
}
section.clearfix.arrival-area.product {
    padding-bottom: 30px;
}
.prod_main .btn-primary {
    background: #59BDE6;
}
ul.view-pro-img {
    white-space: nowrap;
    padding-left: 15px !important;
}

body .product_secondary_images_container {
    height: 60px;
    margin-bottom: 0px;
}

.ui2-table-normal {
    width: auto;
    max-width: 100%;
}

.ui2-table td, .ui2-table th {
    padding: 12px;
    text-align: left;
    border: 1px solid #c8d2e0;
}

.do-content {
    overflow: hidden;
}

.widget-detail-overview .do-overview {
    border-top: 1px dashed #e6e7eb;
}

.widget-detail-overview .do-overview .do-entry-title {
    font-weight: 700;
    font-size: 14px;
    color: #333;
    line-height: 14px;
    padding: 8px 0;
}

 .do-overview {
    border-top: 1px dashed #e6e7eb;
}

 .do-entry {
    border-bottom: 1px dashed #e6e7eb;
    padding: 10px 0 16px;
    font-size: 12px;
    float: left;
    width: 100%;
}

 .do-overview .do-entry-title {
    font-weight: 700;
    font-size: 14px;
    color: #333;
    line-height: 14px;
    padding: 8px 0;
}

.do-entry .do-entry-list {
    margin: 0 0px;
    box-sizing: border-box;
}

.do-entry-separate dl {
    width: 480px;
}

.do-entry dt {
    width: 110px;
}

.do-entry dt {
    padding: 4px 0;
    color: #666;
    width: 102px;
    float: left;
    overflow: hidden;
    margin-right: 10px;
    text-overflow: ellipsis;
}

.do-entry dd {
    padding: 4px 0;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    color: #333;
    margin: 0;
}

.text-ellipsis {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.do-entry-separate dl {
    width: 480px;
}

.do-entry-separate dl {
    width: 380px;
    zoom: 1;
    float: left;
}

/* alibaba product page css end */



body .row.menus {
    background-color: unset;
    box-shadow: unset;
}

.prod_desc table tr td:first-child {
font-weight: 700 !important;
}

.prod_desc table tr td:first-child p span {
font-weight: 600 !important;
}

.prod_desc table tr td:nth-child(3) {
font-weight: 700 !important;
}

.prod_desc table tr td:nth-child(3) p span {
font-weight: 600 !important;
}
/*.prod_desc p {*/
/*    display: none;*/
/*}*/

.prod_desc table td span {
    font-weight: 400;
}

.prod_desc table td {
    padding: 10px 10px !important;
}


ul.short-specification li {
    font-size: 16px;
}

.prod_desc h3 {
    color: #2480c1;
    font-weight: 500;
}
.related-products {
    padding-left: 20px;
}


/*child category css start*/

.pd-thumbs ul li:nth-child(6) {
    display: none;
}

.pd-thumbs ul li:nth-child(7) {
    display: none;
}

.pd-thumbs ul li:nth-child(8) {
    display: none;
}

.pd-thumbs ul li:nth-child(9) {
    display: none;
}
.pd-thumbs ul li {
    display: none;
}

.cat_level_1 a:first-child:before {
    content: "v";
    position: absolute;
    right: 11px;
    /* transform: rotate(85deg); */
    font-size: 15px !important;
    color: #242b5b;
    font-weight: 700;
    opacity:0;
}

.cat_level_1 a:first-child {
    position: relative;
}

.cat_level_1.menu_opened > a {
    display: block !important;
    position: relative;
}

.cat_level_1 > a {
    display: none !important;
}

.cat_level_1 > a:nth-child(1) {
    display: block !important;
}

body .my_cat .active_child {
    /*background-color: #056da4 !important;*/
    color: #fff !important;
}
.heng-1 {
    border: solid 1px #f7a84c !important;
    margin: 14px 9px 0 0 !important;
    vertical-align: top !important;
    margin-bottom: 20px !important;
}
.prod_main .btn-primary {
    float: unset;
    margin-top: 10px;
    background-color: #ef4b50;
    border: 0;
    color: #fff;
    border-radius: 0;
    font-size: 16px;
    font-weight: 600;
    letter-spacing: 1px;
    padding: 9px 30px 9px 30px;
    background: #c90916;
    text-transform: uppercase;
}


/*child category css end*/


    h1{
        font-size: 30px;   
    }
    
    
    body .pro-menu {
    margin-top: 0px;
    }
    
    body .my_cat a {
    width: 100%;
    }

    .bx-wrapper img{
        margin: 0 auto;
    }


    .slide_img_box {
        height: 500px;
        line-height: 500px !important;
        /*border: 1px Solid #ccc;*/
        max-width: 500px;
        text-align: center;
        padding: 0 !important;
        margin: 0 auto;
    }
.heze-pros-main {
    margin-top: 50px;
    background: #fff;
    position: relative;
    /* height: 335px; */
    transition: 0.5s ease;
    border: 1px solid #ccc;
    margin-bottom: 15px;
}
    .slide_img_box img {
        vertical-align: middle;
        max-height: 500px;
        display: initial;
    }
    
    .main-pic{
        height: 400px;
        /*line-height: 496px !important;*/
        /*border: 1px Solid #ccc;*/
        /* max-width: 20px; */
        text-align: center;
        padding: 0 !important;
        margin: 0 auto;
        float: none;
       
    }
    
    .req-btn {
    background-color: #242b5b;
    border: none;
    color: #fff;
    padding: 10px 50px;
    /* border-radius: 50px; */
    font-weight: 700;
}
    
    .main-pic img {
        max-width: 100%;
        vertical-align: middle;
        max-height: 351px;
        /*width:100%;*/
    }
    
    .pd-thumbs ul li {
     text-align: left;
    
   
    width: 20%;
    
    display:inline-block;
    }
    
    .pd-thumbs ul li:hover {
        cursor: pointer;
    }
    
    .pd-thumbs ul li span {
       width: 100%;
    height: 100%;
    display: block;
    text-align: center;
    border: 1px solid #ccc;
    vertical-align: middle;
    }
    img.product_secondary_image_sm {
  
        max-height: 90px;
    max-width: 90px;
}
.col-md-1.col-xs-12.no-s {
    padding: 0;
    margin:0;
}

.product_secondary_images_container {
  height: 90px;
    margin-bottom: 5px;
}
    
    body .pd-thumbs ul li img {
        max-height: 100%;
    vertical-align: middle;
    
    }
    
    .img_active {
        border: 1px Solid #59BDE6;
    }
    
    .pd-thumbs {
            text-align: left;
            margin-top: 10px;
          
            padding-right: 8px;
    }

    
    @media only screen and (max-width: 600px)  {
        .main-pic{
            max-height: 300px;
            line-height: 296px !important;
            /*border: 1px Solid #ccc;*/
            /* max-width: 20px; */
            text-align: center;
            padding: 0 !important;
            margin: 0 auto;
            float: none;
        }
        body .pd-thumbs ul li span {
    width: 100%;
    height: 100%;
    display: block;
    text-align: center;
    border: 0px solid #ccc;
    vertical-align: middle;
}
        
        .main-pic img {
            max-width: 300px;
            vertical-align: middle;
            max-height: 296px;
        }
    }
    
      @media  only screen and (min-width: 600px) and (max-width: 900px) {
    	ul.products > li {
            width: 48%;
        }
    }
    
     @media  only screen and (min-width: 320px) and (max-width: 600px) {
    	ul.products > li {
            width: 100%;
        }
        body .ZoomContainer {
    display: none !important;
}
        
        .pull-right {
    display: none;
}
    }
    
   .Product-Description {
    color: #ffad19;
}
.Product-Description-main {
      font-size: 18px;
    color: #fff;
}

.Product-Description-cap {
    text-transform: uppercase;
    font-weight: 700;
    margin-bottom: 10px;
    padding: 0;
}

.no-paddis {
    padding: 0 0;
}

.my-quote textarea {
    resize: none;
}

@media only screen and (max-width: 992px)
{
   body ul.view-pro-img li {
    width: 17% !important;
    float: left;
    margin-right: 2px;
    border: 1px solid #ccc;
    margin: 3px;
    overflow: hidden;
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
.service-sidebar .category-widget .widget-content li a:hover i, .service-sidebar .category-widget .widget-content li a.current i {
    background-color: #c1282a;
}

.col-lg-4.col-md-12.col-sm-12.sidebar-side {
    margin-top: 40px;
}


ul.category-list.clearfix li {
    margin-bottom: 15px !important;!i;!;
}

.bread_crumb span {
    color: #e90a14;
    font-size: 15px;
    font-family: sans-serif;
}
.col-lg-3.col-md-6.col-sm-12.shop-block {
    margin-top: 40px;
}
.short-descrition-inner p {}

.short-descrition-inner {
    margin-top: 10px;
    padding-right: 20px;
}

.short-descrition-inner p {
    font-size: 17px;
    color: #000;
}

button.btn.btn-primary.inquiry-pops {
    background: #c2272d;
}

section.clearfix.arrival-area.product {
    margin-top: 30px;
}

.img_active {
    border: 1px solid red;
}

</style>

@endsection


@section('content')

<div class="bannermain innerbanner">
	<div class="banner_overlay"></div>
	<img src="{{get_thumb_url_400('banners',"/".$basic_details->featured_banner,1)}}" alt="{{$basic_details->name}}">
	<div class="innercaption">
		<div class="container">
		
		</div>
	</div>
</div>


<section class="bread-crum">
        
        <div class="container">
        
            <div class="bread_crumb">
            <a href="/">Home</a> > 
            <a href="/products">Products</a> > 
            
            @if($industry->parent_id != 0)
                
                @foreach($industries as $k => $ind)
                    @if($ind->id == $industry->parent_id)
                        <a href="/product-category/{{$ind->slug}}" > {{$ind->name}} </a> > 
                    @endif
                @endforeach
                
            @endif
            
        	<a href="/product-category/{{$industry->slug}}" > {{$industry->name}} </a> >
            <span>{{$product->name}}</span>
            
        </div>
	    
	    </div>
         
    </section>


<section class="clearfix arrival-area product">
    <div class="container prod_main" >
        
        <div class="row">
            
       
  
            <div class="col-md-5 col-sm-12 col-xs-12 prod_desc_box">
                
                    <div class="summary entry-summary">
                        <div class="list_image_container pd-left">
                            <div id="main_img_0" class="new_bg_image_overlay main-pic" style="display: block;">
                                <img src="{{get_thumb_url_500('products',$product->thumbnail_img,1)}}" class="prdouct_lbox" title="{{$product->name}}">
                            </div>
                            
                            @foreach($product_images as $key => $value)
                                <div id="main_img_{{$value->id}}" class="new_bg_image_overlay main-pic" style="display: none;">
                                    <img src="{{get_thumb_url_500('products',$value->img_name,1)}}" class="prdouct_lbox" @if($product->imagetitle != '') alt="{{$product->imagetitle}}" @else alt="{{$product->name}}" @endif>
                                </div>
                            @endforeach
                     
                        </div>    
                    </div>
            </div>
                 <div class="product_secondary_images pd-thumbs col-md-1 col-xs-12 no-s">
                <ul class="view-pro-img">
                    
                    <li class="img_active" onclick="change_img_thumb(0)" id="prod_img_0">
                        <span>
                            <div class="product_secondary_images_container">
                                <img class="product_secondary_image_sm" alt="{{$product->name}}" src="{{get_thumb_url_100('products',$product->thumbnail_img,1)}}">
                            </div>
                        </span>
                    </li>
                    
                    @foreach($product_images as $key => $value)
                        <li class="" onclick="change_img_thumb({{$value->id}})" id="prod_img_{{$value->id}}">
                            <span>
                                <div class="product_secondary_images_container">
                                    <img class="product_secondary_image_sm" alt="{{$product->name}}" src="{{get_thumb_url_100('products',$value->img_name,1)}}" >
                                </div>
                            </span>
                        </li>   
                    @endforeach
                    
                </ul>
                
            </div>
            
           
           
               <div class="col-md-6 col-sm-12 col-xs-12 my-quote">
                <h1 class="pgtitle">{{ucwords($product->name)}}</h1>
                @if($product->diagram != '')
                    <img class='img-responsive' src="/uploads/images/{{$product->diagram}}" >
                @endif
                
                 <div class="short-descrition-inner" itemprop="short_description">
                        <p >{!! ($product_detail->description) !!}</p>
                    </div>
			        
                
                	<button class="btn btn-primary inquiry-pops" data-bs-toggle="modal" data-bs-target="#contactSupplierModal" href="javascript:">Inquire Now</button>
                
             
                
            </div>
            
            <!--         <div class="col-md-10 col-sm-12 col-xs-12 ">-->
                
            <!--    <div class="prod_desc">-->
                   
            <!--     <h4 class="Product-Description Product-Description-main">Description:</h4>-->
            <!--        <div itemprop="description">-->
                        
                        
                        
                        
                        
            <!--        </div>-->
                    
            <!--        <div class="summary entry-summary">-->
                        <!--<button class="btn btn-primary" data-toggle="modal" data-target="#contactSupplierModal" href="javascript:" >Product Inquiry</button>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
      <section class="rel-prods">
    <div class="container">
    
      <div class='row'>
            
                
                        <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="gernal-heads">
               <h2>Related<span> Products</span></h2>
           </div>
         </div>
                        
                      
				
				@foreach($related_products as $key => $p)
    			
    			 	       
                        
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                   <a title="Magnesium Hydroxide" href="{{getproducturl($p)}}">
                                    <figure class="image-box"><img src="{{get_thumb_url_500('products',$p->thumbnail_img,1)}}" alt="{{$p->name}}"></figure>
                                </a>
                                    <div class="lower-content">
                                        <div class="text centred">
                                            <h6><a title="{{$p->name}}" href="{{getproducturl($p)}}">{{$p->name}}</a></h6>
                                                                                  </div>
                                                                                  <div class=" centred fg">
                                                                                  <a  class="det" href="{{getproducturl($p)}}">View Details </a>
     </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      
                        
               
    			
                     
				@endforeach
        

                        
                    

                
                
            </div>

        </div>
    
    
</section>
            
        </div>
      
    </div>
</section>





@section('scripts')
<script src="/js/jquery-ez-plus.js"></script>

<script>
    
    $(document).ready(function(){
        $('#main_img_0 > img').ezPlus({
            url: '/uploads/images/products/{{$product->thumbnail_img}}', 
            touch: false,
            lensSize : '50',
            zoomWindowWidth : '400',
            zoomWindowHeight :'400',
            borderSize :"0.1",
            zoomWindowPosition :'1',
            zoomLens : 'true',
            containLensZoom : "false",
            lenszoom :'false',
            zoomWindowFadeIn: 'false',
            
            
        });
        
        @foreach($product_images as $key => $value)
            $('#main_img_{{$value->id}} > img').ezPlus({url: '/uploads/images/products/{{$value->img_name}}', touch: false });    
        @endforeach
    });

    function change_img_thumb(id){

      $('#prod_img_0').removeClass('img_active');
      $('#main_img_0').hide();
      
      @foreach($product_images as $key => $value)
        $("#prod_img_{{$value->id}}").removeClass('img_active');
        $('#main_img_{{$value->id}}').hide();
      @endforeach  

      $("#prod_img_"+id).addClass('img_active');
      $('#main_img_'+id).show();
    }

</script>
@endsection

@endsection
