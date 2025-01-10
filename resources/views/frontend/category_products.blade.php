{{-- @extends('frontend.template')


@section('content')
<div class="left">
	<div class="bannermain innerbanner">
		<div class="banner_overlay"></div>
		
	 <img src="@if($industry->featured_banner != "") {{config('app.url')}}uploads/images/categories/{{$industry->featured_banner}}  @else {{get_thumb_url_400('banners',"/".$basic_details->featured_banner,1)}} @endif">

		<div class="innercaption">
			<div class="container">
				<h2>{{$industry->name}}</h2>
			</div>
		</div>
	</div>

	<section class="bread-crum">
        
        <div class="container">
        
            <div class="bread_crumb">
	            <a href="/">Home</a> > 
	            <a href="/products">Products</a> >
	            <span>{{$industry->name}} ({{$category_products->total()}})</span>
	            
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
                            @foreach($all_industries as $key => $ind)
                                <ul class="category-list clearfix">
                                    <li>
                                        <a class="{{ request()->segment(2) === $ind->slug ? 'current' : '' }}" 
                                        href="/product-category/{{$ind->slug}}">
                                        <i class="fas fa-long-arrow-right"></i>{{$ind->name}}
                                        </a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

	            <div class="col-md-8 col-sm-12 our-product">
	                

				
						<div class="col-xs-12">
    <div id="btnContainer">
  <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
  <button class="btn custum-style" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
  
</div>
        	<div id="products-box" class="" >
							
                        @foreach($category_products as $key => $p)	
                        
                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
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
							
					
					</div>
					
					
					
					

					<div class="row xxp">
						<div class="col-xs-12">
							<ul class="pagination">
								{{$category_products->links()}}
    				        </ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	
	<div class="clear"> </div>

@endsection
</div>



 --}}








@extends('frontend.template')

  
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
 
    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">

            
                <div class="row g-0 gx-5 align-items-center">
                    <div class="col-lg-6 py-4">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h2 class="mb-3">Property Type :<span class="text-primary">
                                {{$industry->name}} </span> </h2>
                                
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
            

 
                <div class="tab-content">

                    <div id="both" class="tab-pane fade show p-0 active">
                        <div class="row g-4">

                            @foreach ($category_products as $key => $p)
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
                            @foreach ($category_products as $key => $p)
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

                            @foreach ($category_products as $key => $p)
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
                
           

            <div class="row xxp">
                <div class="col-xs-12">
                    <ul class="pagination ">
                        {{ $category_products->links() }}
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Property List End -->
@endsection
