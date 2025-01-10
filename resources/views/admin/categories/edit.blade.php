@extends('admin.template')

@section('styles')

<style type="text/css">
  .mb-0 tr td{
    vertical-align: middle;
  }
</style>

@endsection

@section('content')

<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-8 col-sm-8 text-center text-sm-left mb-0">
      <h3 class="page-title">Property Type | Edit</h3>
    </div>
  </div>
  <!-- End Page Header -->
  <!-- Default Light Table -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-small mb-4">
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">

            {{Form::model($category,['route' => ['admin.categories.update',$category->id],'files' => 'true'])}}
              
              <label>Parent</label>
              {{Form::select('parent_id',$parent_ids_arr,null,['class' => 'form-control input'])}}

              <label>Name</label>
              {{Form::text('name',null,['class' => 'form-control input'])}}

              <label>Featured Image</label><br>

              @if($category->featured_image != "")
                <img src="{{get_thumb_url_200('categories',"/".$category->featured_image,1)}}" style="margin-bottom: 20px;" >
              @endif


              <br>
              {!! Form::file('featured_image',null,['class' => 'form-control input input-sm']) !!}
              
              <br><br>
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
              
              <div class="form-row" >
                    <div class="form-group col-md-6">
                      <label>Short Description</label>
                      {{Form::textarea('short_description',null,['class' => 'mceEditor', 'placeholder' => 'Add Short_Product Details here..'])}} 
                    </div>
              </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>SEO Content</label>
                      {{Form::textarea('seo_content',null,['class' => 'form-control mceEditor', 'placeholder' => 'SEO Content'])}} 
                    </div>
                </div>      
                  
                        <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Is Featured Category??</label>
                        {{Form::select('fea_cat',['0' => 'no','1' => 'Yes'],null,['class' => 'form-control input inptu-sm'])}}
                    </div>
                </div>
                
              
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Is Index</label>
                        {{Form::select('is_index',['0' => 'no','1' => 'Yes'],null,['class' => 'form-control input inptu-sm'])}}
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Have Childs Category??</label>
                        {{Form::select('have_childs',['0' => 'no','1' => 'Yes'],null,['class' => 'form-control input inptu-sm'])}}
                    </div>
                </div>

              <br><br>
              <button class="btn btn-primary btn-sm">Update</button>

            {{Form::close()}}

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
<script>
    $(function(){

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
                
    });    
</script>
@endsection