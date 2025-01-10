@extends('admin.template')

@section('styles')

<style type="text/css">
  .mb-0 tr td{
    vertical-align: middle;
  }

  .mt20{
    margin-top: 20px;
  }

  .m10{
    padding: 10px;
  }
</style>

@endsection

@section('content')

<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-8 col-sm-8 text-center text-sm-left mb-0">
      <h3 class="page-title">Add | Content</h3>
    </div>
  </div>
  <!-- End Page Header -->
  <!-- Default Light Table -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-small mb-4">
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">

            {{Form::open(['route' => 'admin.save_content', 'files' => 'true'])}}
              
              <div class="row">
                <div class="col-md-6 m10">              
                  <label>Company Images</label><br>
                  @if(isset($seo_content['company_image1']['content']))
                    <img style="max-width: 100px;margin-bottom: 20px;" src="/uploads/images/{{$seo_content['company_image1']['content']}}" style="margin-bottom: 20px;" >
                    
                    <input type="file" name="content[company_image1]" >

                  @else
                    <input type="file" name="content[company_image1]" >
                  @endif

                  <br>
                  @if(isset($seo_content['company_image2']['content']))
                    <img style="max-width: 100px;margin-bottom: 20px;" src="/uploads/images/{{$seo_content['company_image2']['content']}}" style="margin-bottom: 20px;" >
                    
                    <input type="file" name="content[company_image2]" >

                  @else
                    <input type="file" name="content[company_image2]" >
                  @endif

                  <br>
                  @if(isset($seo_content['company_image3']['content']))
                    <img style="max-width: 100px;margin-bottom: 20px;" src="/uploads/images/{{$seo_content['company_image3']['content']}}" style="margin-bottom: 20px;" >
                    
                    <input type="file" name="content[company_image3]" >

                  @else
                    <input type="file" name="content[company_image3]" >
                  @endif
                </div>

                <div class="col-md-6 m10">
                  <label>About Us</label>
                  @if(isset($seo_content['about_us']['content']))
                    {{Form::textarea("content[about_us]",$seo_content['about_us']['content'],['class' => 'form-control input mceEditor'])}}
                  @else
                    {{Form::textarea("content[about_us]",null,['class' => 'form-control input mceEditor'])}}
                  @endif
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-md-12 m10">
                  <label>Products Background</label> <br>
                  @if(isset($seo_content['products_bg_image']['content']))
                    <img style="max-width: 100px;margin-bottom: 20px;" src="/uploads/images/{{$seo_content['products_bg_image']['content']}}" style="margin-bottom: 20px;" >
                    
                    <input type="file" name="content[products_bg_image]" >

                  @else
                    <input type="file" name="content[products_bg_image]" >
                  @endif
                </div>
              </div>

              <br>
              <label>Seo Content</label>
              <div class="row">

                @if(isset($seo_content['home_content1']['content']))
                  <div class="col-md-6 m10">{{Form::textarea("content[home_content1]",$seo_content['home_content1']['content'],['class' => 'form-control input mceEditor'])}}</div>
                @else
                  <div class="col-md-6 m10">{{Form::textarea("content[home_content1]",null,['class' => 'form-control input mceEditor'])}}</div>
                @endif

                @if(isset($seo_content['home_content2']['content']))
                  <div class="col-md-6 m10">{{Form::textarea("content[home_content2]",$seo_content['home_content2']['content'],['class' => 'form-control input mceEditor'])}}</div>
                @else
                  <div class="col-md-6 m10">{{Form::textarea("content[home_content2]",null,['class' => 'form-control input mceEditor'])}}</div>
                @endif
              </div>

              <div class="row mt20">

                @if(isset($seo_content['home_content3']['content']))
                  <div class="col-md-6 m10">{{Form::textarea("content[home_content3]",$seo_content['home_content3']['content'],['class' => 'form-control input mceEditor'])}}</div>
                @else
                  <div class="col-md-6 m10">{{Form::textarea("content[home_content3]",null,['class' => 'form-control input mceEditor'])}}</div>
                @endif

                @if(isset($seo_content['home_content4']['content']))
                  <div class="col-md-6 m10">{{Form::textarea("content[home_content4]",$seo_content['home_content4']['content'],['class' => 'form-control input mceEditor'])}}</div>
                @else
                  <div class="col-md-6 m10">{{Form::textarea("content[home_content4]",null,['class' => 'form-control input mceEditor'])}}</div>
                @endif
              </div>


              <div class="row mt20">
                <div class="col-md-6 m10">
                  <label>Footer About Us</label>
                  @if(isset($seo_content['footer_about_us']['content']))
                    {{Form::textarea("content[footer_about_us]",$seo_content['footer_about_us']['content'],['class' => 'form-control input mceEditor'])}}
                  @else
                    {{Form::textarea("content[footer_about_us]",null,['class' => 'form-control input mceEditor'])}}
                  @endif
                </div>
              </div>

              <br>
              
              <div class="row mt20">
                <div class="col-md-6 m10">
                  <label>Header Scripts/Tags</label>
                  @if(isset($seo_content['template_header_tags']['content']))
                    {{Form::textarea("content[template_header_tags]",$seo_content['template_header_tags']['content'],['class' => 'form-control input','style'=>'resize:none;'])}}
                  @else
                    {{Form::textarea("content[template_header_tags]",null,['class' => 'form-control input','style'=>'resize:none;'])}}
                  @endif
                </div>
                <div class="col-md-6 m10">
                  <label>Footer Scripts/Tags</label>
                  @if(isset($seo_content['template_footer_tags']['content']))
                    {{Form::textarea("content[template_footer_tags]",$seo_content['template_footer_tags']['content'],['class' => 'form-control input','style'=>'resize:none;'])}}
                  @else
                    {{Form::textarea("content[template_footer_tags]",null,['class' => 'form-control input','style'=>'resize:none;'])}}
                  @endif
                </div>                
              </div>
                <br>                 
              <button class="btn btn-primary btn-sm">Save</button>

            {{Form::close()}}

          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Default Light Table -->
</div>



@section('scripts')

<script type="text/javascript" src="/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
  
      tinymce.init({
      mode : "specific_textareas",
      editor_selector : "mceEditor",
      // images_upload_url: '/member/mce_upload_image',
      file_picker_types: 'image media',
      relative_urls: false,
      file_picker_callback: function(callback, value, meta) {
          var input = document.createElement('input');
          input.setAttribute('type', 'file');
          //input.setAttribute('accept', 'image/*');
          
          input.onchange = function() {
              //var file = this.files[0];
              var token = "{{csrf_token()}}";
              var url = '/member/mce_upload_image';
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
      
      width: 480,
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
    

</script>

@endsection

@endsection