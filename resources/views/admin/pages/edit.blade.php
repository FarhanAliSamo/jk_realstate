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
      <h3 class="page-title">Page ({{ucwords(str_replace('-',' ',$data['meta']->page))}})</h3>
    </div>
  </div>
  <!-- End Page Header -->
  <!-- Default Light Table -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-small mb-4">
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">

            {!! Form::model($data['meta'],['route' => ['admin.pages.update',$data['meta']->page],'class'=>'form']) !!}
              <div class="row mt20">
                <div class="col-12 col-md-12">
                  <label>Meta Title</label>
                    {{Form::textarea("title",null,['class' => 'form-control input','required'=>''])}}
                </div>
              </div>

              <div class="row mt20">
                <div class="col-12 col-md-12">
                  <label>Meta Description</label>
                    {{Form::textarea("description",null,['class' => 'form-control input','required'=>''])}}
                </div>
              </div>

              <div class="row mt20">
                <div class="col-12 col-md-12">
                  <label>Meta Keyword</label>
                    {{Form::textarea("keyword",null,['class' => 'form-control input'])}}
                </div>
              </div>

              <div class="row mt20">
                <div class="col-12 col-md-12">
                  <label>Page Content</label>
                    {{Form::textarea("content",null,['class' => 'form-control input mceEditor'])}}
                </div>
              </div>
              <br>
              <div class="row mt20">
                <div class="col-6 col-md-6" >
                  <label>Organization Schema</label>
                    {{Form::textarea("page_schema",null,['class' => 'form-control input'])}}
                </div>
              </div>

              <br>
              <button class="btn btn-primary btn-sm">Update</button>

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