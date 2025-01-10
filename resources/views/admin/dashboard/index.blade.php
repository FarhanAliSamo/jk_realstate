@extends('admin.template')

@section('styles')
  <style type="text/css">
    .un_read{
      background-color: #f1f1f1
    }

    label{
      margin-top: 5px;
      margin-top: 5px;
    }
  </style>
@endsection


@section('content')

<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <h3 class="page-title">Website Basic Details</h3>
    </div>
  </div>

  @include('admin.layout.alerts')

  <div class="container-fluid bg-white" style="margin-top: 10px;padding: 20px;">
      <div class="row">
          <div class="col-md-6">
            {{Form::model($basic_details,['route' => 'admin.save_basic_details', 'files' => 'true'])}}
                {{csrf_field()}}

                <label>Company Name</label>
                {!! Form::text('company_name',null,['class' => 'form-control input input-sm']) !!}
                
                <label>Logo</label><br>
                @if($basic_details->logo != "")
                  <img src="{{get_thumb_url_200('logo',"/".$basic_details->logo,1)}}" style="margin-bottom: 20px;" >
                @endif
                <br>
                {!! Form::file('logo',null,['class' => 'form-control input input-sm']) !!}
                
                <br><br>
 
                <label>Logo (Grey Scale)</label><br>
                @if($basic_details->logo_grey != "")
                  <img src="{{get_thumb_url_200('logo',"/".$basic_details->logo_grey,1)}}" style="margin-bottom: 20px;" >
                @endif
                <br>
                {!! Form::file('logo_grey',null,['class' => 'form-control input input-sm']) !!}

                <br><br>
                
         

                <label>Email : </label>
                {!! Form::text('email',null,['class' => 'form-control input input-sm']) !!}

                <label>Phone Number : </label>
                {!! Form::text('phone_number',null,['class' => 'form-control input input-sm']) !!}
                <label>Phone Number2 : </label>
                {!! Form::text('phone_number2',null,['class' => 'form-control input input-sm']) !!}

                <label>Address : </label>
                {!! Form::text('address',null,['class' => 'form-control input input-sm']) !!}
          
                <label>Facebook : </label>
                {!! Form::text('facebook_url',null,['class' => 'form-control input input-sm']) !!}

                <label>Twitter : </label>
                {!! Form::text('twitter_url',null,['class' => 'form-control input input-sm']) !!}

                <label>Linkedin : </label>
                {!! Form::text('linkedin_url',null,['class' => 'form-control input input-sm']) !!}
                
                <label>Instagram : </label>
                {!! Form::text('instagram_url',null,['class' => 'form-control input input-sm']) !!}
                
                <label>Whatsapps : </label>
                {!! Form::text('whatsapp',null,['class' => 'form-control input input-sm']) !!}
                
                <!-- <label>wechat: </label>-->
                <!--{!! Form::text('wechat',null,['class' => 'form-control input input-sm']) !!}-->
                
                <label>Youtube : </label>
                {!! Form::text('youtube',null,['class' => 'form-control input input-sm']) !!}
                
                <div style="display:none">
                    
                <label>Theme Color 1 : </label>
                {!! Form::text('theme_color1',null,['class' => 'form-control input input-sm']) !!}

                <label>Themen Color 2 : </label>
                {!! Form::text('theme_color2',null,['class' => 'form-control input input-sm']) !!}
               
                </div>
                
                <label>Featured Banner</label><br>
                @if($basic_details->featured_banner != "")
                  <img src="{{get_thumb_url_400('banners',"/".$basic_details->featured_banner,1)}}" style="margin-bottom: 20px;max-width:200px" >
                @endif

                {!! Form::file('featured_banner',null,['class' => 'form-control input input-sm']) !!}

                     </br>
                <label>Is Index</label>
                {{Form::select('is_index',['1' => 'Yes','0' => 'no'],$basic_details->is_index,['class' => 'form-control input inptu-sm'])}}


                <br><br>

                <button class="btn btn-primary btn-sm">Update</button>
            {{Form::close()}}
          </div>
      </div>
  </div>

</div>


@endsection