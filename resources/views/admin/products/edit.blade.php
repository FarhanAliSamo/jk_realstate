@extends('admin.template')


@section('styles')

<link rel="stylesheet" href="/select2/css/select2.min.css">

<style type="text/css">
  .btn-file {
      position: relative;
      overflow: hidden;
  }
  .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background: white;
      cursor: inherit;
      display: block;
  }

  .img_upload_featured{
      max-height: 140px;
      max-width: 100%;
  }

  .img_upload{
      max-height: 180px;
      max-width: 100%;
  }

  .img_upload:hover{
      cursor: move;
  }

  .img_box{
      width: 100%;
      text-align: center;
      height: 150px;
      border:1px Solid #a9a9a9;
      line-height: 145px;
  }

  .img_main_box{
      max-width: 200px;
  }

  .sm_txt{
      font-size: 11px;
  }

  .m_top{
      margin-top: 5px;
  }

  .save_btn{
      margin-top: 15px;
      border-radius: 0px;
  }

  .input_txt{
      font-size: 16px;
  }

  .del_btn{
    color: #fff !important;
    width: 20px;
    padding: 1px;
    position: absolute;
    right: 16px;
    top: 22px;
  }

  #industries_drop ul{
    padding: 0px;
    list-style: none;
  }

  #industries_drop ul li{
    padding: 5px;
    border: 1px Solid #ccc;
    font-size: 12px;
    font-weight: bold;
    text-transform: capitalize;
  }

  #industries_drop ul li:hover{
    cursor: pointer;
    background-color: #949292;
    color: #fff;
  }

  .cap_txt{
    text-transform: capitalize;
  }
</style>

@endsection


@section('content')

<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Products</span>
      <h3 class="page-title">Edit Product</h3>
    </div>
  </div>
  <!-- End Page Header -->
  <!-- Default Light Table -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Product Details</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                {!! Form::model($product,['route' => ['admin.products.update',$product->id],'class'=>'login_form','id'=>'login_form', 'files' => 'true']) !!}
                  
                  {{csrf_field()}}

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Industry</label>
                      {{-- {{Form::text('ind_name',null,['class' => 'form-control cap_txt', 'placeholder' => 'Select Industry', 'id' => 'industry_id',"autocomplete" => "off"])}}

                      <div id="industries_drop" style="display: none;">
                        <ul>
                          <li>Search category</li>
                        </ul>
                      </div> --}}

                      {{Form::select('industry_id',$industries_arr,$product->industry_id,['class' => 'form-control input input select2','required' => ''])}}

                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Property For <span class="text-danger">*</span></label>

                      <select class="form-control input input "  required name='property_for'>

                        <option value="sale" {{$product->property_for == 'sale' ? 'selected' : ''}}>Sale</option>
                        <option value="rent" {{$product->property_for == 'rent' ? 'selected' : ''}}>Rent</option>
                        
                      </select>

                   
                    </div>
                  </div>

                  {{-- {{Form::hidden('industry_id',null,['class' => 'form-control', 'id' => 'ind_id'])}} --}}

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Title</label>
                      {{Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Please enter product title','required'=>''])}} 
                    </div>
                  </div>
                  

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Price <span class="text-danger">*</span></label>
                      {{Form::number('price',null,['class' => 'form-control', 'placeholder' => 'Price'])}} 
                    </div>
                  </div>

                  
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Size (Square Feet) <span class="text-danger">*</span></label>
                      {{Form::number('size',null,['class' => 'form-control', 'placeholder' => 'Size Square Feet '])}} 
                    </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Beds (No of bedrooms) <span class="text-danger">*</span></label>
                      {{Form::number('bed',null,['class' => 'form-control', 'placeholder' => 'beds'])}} 
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Baths (No of Bathrooms) <span class="text-danger">*</span></label>
                      {{Form::number('bath',null,['class' => 'form-control', 'placeholder' => 'bathrooms'])}} 
                    </div>
                  </div>


                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Location <span class="text-danger">*</span></label>
                      {{Form::text('address',null,['class' => 'form-control', 'placeholder' => 'Location'])}} 
                    </div>
                  </div>
                  
                  
                  
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Meta Title</label>
                      {{Form::text('meta_title',null,['class' => 'form-control', 'placeholder' => 'Meta Title'])}} 
                    </div>
                  </div>
                  
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Meta Description</label>
                      {{Form::textarea('meta_description',null,['class' => 'form-control', 'placeholder' => 'Meta Description','rows' => '2' ])}} 
                    </div>
                  </div>
                  

                  <div class="col-md-3" style="margin-left: -15px;">
                  @for($i=1;$i<2;$i++)
                      <div class="img_box" id="img_box_{{$i}}" @if($i != 1) ondrop="drop(event)" ondragover="allowDrop(event)" @endif>
                          <?php $img_url = ""; ?>
                          @if($product->thumbnail_img != "" and $i == 1) 
                              <?php $img_url = get_thumb_url_200('products',$product->thumbnail_img); ?>
                          @endif

                          @if($img_url != "")
                              <img @if($i != 1) class="img_upload" @else class="img_upload_featured" @endif id='img_upload_{{$i}}' src="{{$img_url}}" @if($i != 1) draggable="true" ondragstart="drag(event)" @endif />
                          @else
                              <img class="img_upload_featured" id='img_upload_{{$i}}' />
                          @endif
                      </div>

                       <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-info btn-file">
                                  Browse… <input type="file" id="imgInp_{{$i}}" name="product_images[{{$i}}]">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                  @endfor
                  </div>
                  
                  <br>
                    <div style="display:none;">     
                      
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Diagram</label> <br>
                          
                          @if($product->diagram != '')
                            <img style="max-width:200px;" src="/uploads/images/{{$product->diagram}}" >
                          @endif
                          <input type='file' name='prod_diagram' >
                        </div>
                      </div>
                     
                    </div>

                  <div class="clearfix"></div>

                  <div class="form-row" >
                    <div class="form-group col-md-6">
                      <label>Description</label>
                      {{Form::textarea('description',null,['class' => 'mceEditor', 'placeholder' => 'Add Product Details here..','required'=>''])}} 
                    </div>
                  </div>
                  
                  <div class="form-row" >
                    <div class="form-group col-md-6">
                      <label>Short Description</label>
                       {{Form::textarea('short_description',null,['class' => 'mceEditor form-control', 'placeholder' => 'Add Short Product Details here..'])}} 
                    </div>
                  </div>
                  

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Keywords</label>
                      {{Form::text('keywords',null,['class' => 'form-control', 'placeholder' => 'keywords','required'=>''])}} 
                    </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Imagetitle</label>
                      {{Form::text('imagetitle',null,['class' => 'form-control', 'placeholder' => 'imagetitle',''=>''])}} 
                    </div>
                  </div>

                <div style="display:none;"> 
                 
                  <div class="form-row" >
                    <div class="form-group col-md-6">
                      <label>Price</label>

                      <div class="row">
                        <div class="col-md-3">{{Form::text('min_price',null,['class' => 'form-control','placeholder' => 'Min'])}}</div>
                        <div style="margin-top: 5px;">-</div>
                        <div class="col-md-3">{{Form::text('max_price',null,['class' => 'form-control','placeholder' => 'Max'])}}</div>

                        <div style="margin-top: 5px;">USD</div>

                        <div class="col-md-3">
                          {{Form::text('price',null,['class' => 'form-control','placeholder' => 'Unit'])}}
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <span style="font-size: 11px;">*eg. 1 - 2 USD /piece</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Min Order</label>
                      <div class="row">
                        <div class="col-md-4">
                          {{Form::text('min_order',null,['class' => 'form-control', 'placeholder' => 'Min Order'])}} 
                        </div>
                        <div class="col-md-3">
                          {{Form::text('min_order_unit',null,['class' => 'form-control', 'placeholder' => 'Unit'])}} 
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <span style="font-size: 11px;">*eg. 100 pieces</span>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Port</label>
                      {{Form::text('port',null,['class' => 'form-control', 'placeholder' => 'Port'])}} 
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Lead Time</label>
                      {{Form::text('lead_time',null,['class' => 'form-control', 'placeholder' => 'Lead Time'])}} 
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Packaging Details</label>
                      {{Form::text('packaging',null,['class' => 'form-control', 'placeholder' => 'Packaging Details'])}} 
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Attributes</label>

                        

                        @foreach($product_attributes as $attr_label => $attr_value)
                          <div class="row" style="margin-top: 5px;">
                            <div class="col-sm-6">
                              {{Form::text('attribute_label[]',$attr_label,['class' => 'form-control', 'placeholder' => 'Label'])}}
                            </div>
                            <div class="col-sm-6">
                              {{Form::text('attribute_value[]',$attr_value,['class' => 'form-control', 'placeholder' => 'value'])}}
                            </div>
                          </div>
                        @endforeach

                        <div id="more_attributes"></div>

                        <div class="row" style="margin-top: 5px;">
                          <div class="col-md-12" > 
                            <button onclick="add_more()" type="button" class="btn btn-info btn-sm" style="float: right;"> <i class="material-icons">add</i> Add More</button></div>
                        </div>
                    </div>
                  </div>
                  
                </div>


                        <div class="row">

                            @for($i=2;$i<6;$i++)
                                <div class="form-group col-md-3 col-sm-6 col-xs-12 img_main_box" @if($i != 2) style="margin-top:7px;" @endif>
                                    <label>@if($i == 2) More Images @endif</label>
                                    <div class="img_box" id="img_box_{{$i}}" ondrop="drop(event)" ondragover="allowDrop(event)">
                                        <?php $img_url = ""; ?>
                                        
                                        @if(isset($product_images[$i]))
                                            <?php $img_url = get_thumb_url_200('products',$product_images[$i]['img_name']); ?>
                                        @endif

                                        @if($img_url != "")
                                            <img @if($i != 1) class="img_upload" @else class="img_upload_featured" @endif id='img_upload_{{$i}}' src="{{$img_url}}" @if($i != 1) draggable="true" ondragstart="drag(event)" @endif />
                                        @else
                                            <img class="img_upload_featured" id='img_upload_{{$i}}' />
                                        @endif
                                    </div>

                                     <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-info btn-file">
                                                Browse… <input type="file" id="imgInp_{{$i}}" name="product_images[{{$i}}]">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>

                                    <div>
                                        <div>
                                            @if(isset($product_images[$i]['id']))
                                                <a id="del_img_{{$i}}" onclick="delete_img({{$i}})" class="btn btn-warning btn-sm del_btn" @if($i == 2) style="top: 32px;" @endif><i class="material-icons">clear</i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <span class="sm_txt">* Drag Images to set order</span> <br>
                            </div>
                        </div>
                        
                        <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Is Featured Product??</label>
                      <input type='checkbox' name='featured' value='1'  {{$product->featured ? 'checked' : ''}} > 
                    </div>
                  </div>

                        <div class="clearfix"></div>
                        
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Is Index</label>
                            {{Form::select('is_index',['1' => 'Yes','0' => 'no'],null,['class' => 'form-control input inptu-sm'])}}
                        </div>
                    </div>
                    
                    

                  <button style="margin-top: 20px;" type="submit" class="btn btn-accent">Update</button>
                {{Form::close()}}
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Default Light Table -->
</div>

@endsection


@section('scripts')


<script type="text/javascript" src="/tinymce/tinymce.min.js"></script>

<script type="text/javascript">

    function add_more(){
        var html = '';
        html += '<div class="row margintop5">';
        html += '<div class="col-md-6"><input class="form-control input input-sm" placeholder="label" name="attr_key[]" type="text"></div>';
        html += '<div class="col-md-6"><input class="form-control input input-sm" placeholder="value" name="attr_value[]" type="text"></div>';
        html += '</div>';

        $('#more_attributes').append(html);
    }

    $(document).ready( function() {
      
      $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
      });

      $('.btn-file :file').on('fileselect', function(event, label) {
          
          var input = $(this).parents('.input-group').find(':text'),
              log = label;
          
          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }
      
      });

      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              
              reader.onload = function (e) {
                  $('#img_upload').attr('src', e.target.result);
              }
              
              reader.readAsDataURL(input.files[0]);
          }
      }

      $("#imgInp").change(function(){
          readURL(this);
      });


      @for($i=1;$i<6;$i++)
        function readURL_{{$i}}(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img_upload_{{$i}}').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp_{{$i}}").change(function(){
            readURL_{{$i}}(this);
        });
      @endfor

    });

    // tinymce.init({ selector:'textarea' });

    tinymce.init({
      mode : "specific_textareas",
      editor_selector : "mceEditor",
      // images_upload_url: '/admin/mce_upload_image',
      file_picker_types: 'image media',
      file_picker_callback: function(callback, value, meta) {
          var input = document.createElement('input');
          input.setAttribute('type', 'file');
          //input.setAttribute('accept', 'image/*');
          
          input.onchange = function() {
              //var file = this.files[0];
              var token = "{{csrf_token()}}";
              var url = '/admin/mce_upload_image';
              //var data_str = $(this).serialize();
              
              var formData = new FormData();

              // add assoc key values, this will be posts values
              formData.append("file", this.files[0],"filetoupload");
              formData.append("_token", token);

              // formData = formData.serialize();
              
              $.ajax({
                  type: 'POST',
                  url: url,
                  data: formData,
                  cache : false,
                  processData: false,
                  contentType: false,
                  success: function(data){
                      callback(data, {alt: 'View File'});
                  },
                  error: function(data){
                    var err = data.responseJSON.errors.file[0];

                    // failure('Error : '+err);
                    tinymce.activeEditor.windowManager.alert('Error : '+err);
                  }
              });
          };
          
          input.click();
        },
      
      width: 600,
      height: 300,
      plugins: [
        'link image',
        'media',
        'code',
        'table'
      ],
      toolbar: [
        'link image',
        'media',
        'table'
      ]

    });
    


    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");

        if(data == data.replace('http','') && ev.target.id == ev.target.id.replace('img_box','') ){
            var temp = document.getElementById(data).src;
            document.getElementById(data).src = document.getElementById(ev.target.id).src;
            document.getElementById(ev.target.id).src = temp;

            var d1 = "#"+data.replace('img_upload','img_box');
            var d2 = "#"+ev.target.id.replace('img_upload','img_box');

            // alert(d1);
            // alert(d2);

            var temp = $(d1).next().next().html();
            $(d1).next().next().html($(d2).next().next().html());
            $(d2).next().next().html(temp);


            var order_old = data.replace('img_upload_','');
            var order_new = ev.target.id.replace('img_upload_','');

            var url = "/admin/product_images_change_order";
            var dataString = "order_old="+order_old+"&order_new="+order_new+"&_token={{csrf_token()}}&product_id={{$product->id}}";

            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function (data) {
                }
            });
        }
    }


    var searchRequest = null;
    var minlength = 1;

    $("#industry_id").keyup(function () {
        var that = this,
        value = $(this).val();

        if (value.length >= minlength ) {
            if (searchRequest != null) 
                searchRequest.abort();
            searchRequest = $.ajax({
                type: "GET",
                url: "/admin/get_industries",
                data: {
                    'search_ind' : value
                },
                dataType: "JSON",
                success: function(data){
                    var html = "<ul>";
                    $.each(data, function(key, item) {
                        html += "<li onclick=\"set_ind("+key+",'"+item+"')\" >"+item+"</li>";
                    });
                    html += "</ul>";

                    document.getElementById('industries_drop').innerHTML = html;
                    document.getElementById('industries_drop').style.display = 'block';
                }
            });
        }
    });


    function set_ind(id,item){
      document.getElementById('industry_id').value = item;
      document.getElementById('ind_id').value = id;

      document.getElementById('industries_drop').innerHTML = "";
      document.getElementById('industries_drop').style.display = "none";
    }

    function delete_img(id){
      var url = "/admin/delete_image/"+id;
      var dataString = "image_id="+id+"&_token={{csrf_token()}}&product_id={{$product->id}}";

      $.ajax({
          type: "POST",
          url: url,
          data: dataString,
          success: function (data) {
            var div_id = "img_upload_"+id;
            document.getElementById(div_id).src = "";

            var div_id = "del_img_"+id;
            document.getElementById(div_id).style.display = "none";
          }
      });
    }

</script>

@endsection