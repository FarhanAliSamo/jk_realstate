@extends('admin.template')

@section('styles')

<style type="text/css">
  .mb-0 tr td{
    vertical-align: middle;
  }



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

  .img_upload{
      max-height: 180px;
      max-width: 270px;
  }

  .img_box{
    width: 100%;
    text-align: center;
    height: 180px;
    line-height: 180px;
    border: 1px Solid #a9a9a9;
  }

  .img_main_box{
      max-width: 400px;
      float: left;
  }

  .mt20{
    margin-top: 20px;
  }


</style>

@endsection

@section('content')



<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-8 col-sm-8 text-center text-sm-left mb-0">
      <h3 class="page-title">Banners</h3>
    </div>
  </div>
  <!-- End Page Header -->
  <!-- Default Light Table -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-small mb-4">
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">

            {{Form::open(['route' => 'admin.upload_banners','files' => 'true'])}}
              @for($i=1;$i<4;$i++)

                <div class="row">

                  <div class="form-group col-md-3 col-sm-6 col-xs-12 img_main_box @if($i != 1) m_top @endif" @if($i == 7) style="margin-left: -15px;" @else style="" @endif>
                      <div class="img_box">
                        @if(isset($slider_images[$i]))
                          <img class="img_upload" id='img_upload_{{$i}}' src="/uploads/images/banners/{{$slider_images[$i]['banner_path']}}" />
                        @else
                          <img class="img_upload" id='img_upload_{{$i}}'  />
                        @endif
                      </div>
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-info btn-file">
                                  Browse… <input type="file" id="imgInp_{{$i}}" name="banner_images[{{$i}}]" class="file_btn" accept="image/x-png,image/gif,image/jpeg" value="{{old('project_title')}}" >
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                  </div>

                  <div class="col-md-6">
                    @if(isset($slider_images[$i]))
                      {!!Form::text("txt_line1[$i]",$slider_images[$i]['txt_line1'],['class' => 'form-control input input-sm','placeholder' => 'Text Line 1 (optional)'])!!}
                      {!!Form::text("txt_line2[$i]",$slider_images[$i]['txt_line2'],['class' => 'form-control input input-sm mt20','placeholder' => 'Text Line 2 (optional)'])!!}
                      {!!Form::text("txt_line3[$i]",$slider_images[$i]['txt_line3'],['class' => 'form-control input input-sm mt20','placeholder' => 'Text Line 3 (optional)'])!!}
                    @else
                      {!!Form::text("txt_line1[$i]",null,['class' => 'form-control input input-sm','placeholder' => 'Text Line 1 (optional)'])!!}
                      {!!Form::text("txt_line2[$i]",null,['class' => 'form-control input input-sm mt20','placeholder' => 'Text Line 2 (optional)'])!!}
                       {!!Form::text("txt_line3[$i]",null,['class' => 'form-control input input-sm mt20','placeholder' => 'Text Line 3 (optional)'])!!}
                    @endif
                  </div>

                </div>

                <div class="clearfix"></div>
              @endfor

              <div class="form-group" style="margin-left: 20px;float: right;">
                <button class="btn btn-primary">Upload</button>
              </div>

            {{Form::close()}}

          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Default Light Table -->
</div>



@section('scripts')

<script type="text/javascript">
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

</script>

@endsection


@endsection