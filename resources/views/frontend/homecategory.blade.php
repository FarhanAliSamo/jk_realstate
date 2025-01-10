
@foreach($home_category as $key => $hvalue)

@if($loop->iteration == 1)

<div class="row">    
    <div class="col-md-6 col-xs-12 col-sm-6">
        <div class="main-cat-image">
           <a href="/product-category/{{$hvalue->slug}}"> <img src="/uploads/images/categories/{{$hvalue->featured_image}}" class="img-responsive"></a>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 col-sm-6">
        
        <h2><a href="/product-category/{{$hvalue->slug}}">{{$hvalue->name}}</a></h2>
        
        <p>{!! $hvalue->short_description !!}</p>
        
        <div class="bt-cat">
            <a href="/product-category/{{$hvalue->slug}}">View More <img class="Ar-b" src="/images/Arrow 8.png" class="img-responsive"></a>
            
        </div>
        
    </div>
</div>

@elseif($loop->iteration == 2)

<div class="row">    
    
    <div class="col-md-6 col-xs-12 col-sm-6">
        
        <h2><a href="/product-category/{{$hvalue->slug}}">@if($hvalue->id == 9) Battery Charger & Industrial Power Module @else {{$hvalue->name}} @endif</a></h2>
        
        <p>{!! $hvalue->short_description !!}</p>
        <div class="bt-cat">
            <a href="/product-category/{{$hvalue->slug}}">View More<img class="Ar-b" src="/images/Arrow 8.png" class="img-responsive"></a>
            
        </div>
        
    </div>
    <div class="col-md-6 col-xs-12 col-sm-6">
        <div class="main-cat-image">
         <a href="/product-category/{{$hvalue->slug}}"> <img src="/uploads/images/categories/{{$hvalue->featured_image}}" class="img-responsive"></a>
        </div>
    </div>
    
</div>

@elseif($loop->iteration == 3)

<div class="row">    

    <div class="col-md-6 col-xs-12 col-sm-6">
        <div class="main-cat-image">
            <a href="/product-category/{{$hvalue->slug}}"> <img src="/uploads/images/categories/{{$hvalue->featured_image}}" class="img-responsive"></a>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 col-sm-6">
        
        <h2><a href="/product-category/{{$hvalue->slug}}">{{$hvalue->name}}</a></h2>
        
        <p>{!! $hvalue->short_description !!}</p>
        
          <div class="bt-cat">
            <a href="/product-category/{{$hvalue->slug}}">View More<img class="Ar-b" src="/images/Arrow 8.png" class="img-responsive"></a>
            
        </div>
        
    </div>
    
</div>


@elseif($loop->iteration == 4)

<div class="row">    
    
    <div class="col-md-6 col-xs-12 col-sm-6">
        
        <h2><a href="/product-category/{{$hvalue->slug}}">{{$hvalue->name}}</a></h2>
        
        <p>{!! $hvalue->short_description !!}</p>
        
          <div class="bt-cat">
            <a href="/product-category/{{$hvalue->slug}}">View More<img class="Ar-b" src="/images/Arrow 8.png" class="img-responsive"></a>
            
        </div>
        
    </div>
    <div class="col-md-6 col-xs-12 col-sm-6">
        <div class="main-cat-image">
          <a href="/product-category/{{$hvalue->slug}}"> <img src="/uploads/images/categories/{{$hvalue->featured_image}}" class="img-responsive"></a>
        </div>
    </div>
    
</div>

@elseif($loop->iteration == 5)

<div class="row">    
   
    <div class="col-md-6 col-xs-12 col-sm-6">
        <div class="main-cat-image">
           <a href="/product-category/{{$hvalue->slug}}"> <img src="/uploads/images/categories/{{$hvalue->featured_image}}" class="img-responsive"></a>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 col-sm-6">
        
        <h2><a href="/product-category/{{$hvalue->slug}}">{{$hvalue->name}}</a></h2>
        
        <p>{!! $hvalue->short_description !!}</p>
        
          <div class="bt-cat">
            <a href="/product-category/{{$hvalue->slug}}">View More<img class="Ar-b" src="/images/Arrow 8.png" class="img-responsive"></a>
            
        </div>
        
    </div>
    
</div>

@endif


@endforeach

<div class="row ">    
   
    <div class="col-md-12 col-xs-12 col-sm-12">
      <div class="line-p">
          
      </div>
          <div class="bt-cat-l">
            <a href="/products">All Products<img class="Ar-b" src="/images/Arrow 8.png" class="img-responsive"></a>
            
        </div>
        
    </div>
    
</div>