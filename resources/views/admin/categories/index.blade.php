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
      <h3 class="page-title">Property Type</h3>
    </div>
    <div class="col-4 col-sm-4" style="margin-top: 10px;">
      <a href="/admin/categories/add" class="btn btn-success btn-sm" style="float: right;">Add New<i class="material-icons">add</i></a>
    </div>
  </div>
  <!-- End Page Header -->
  <!-- Default Light Table -->

  @include('admin.layout.alerts')

  <div class="row">
    <div class="col-lg-12">
      <div class="card card-small mb-4">
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">

            <div class="row">
              <div class="col">
                <table class="table mb-0">
                  <thead class="bg-light">
                    <tr>
                      <th scope="col" class="border-0">#</th>
                      <th scope="col" class="border-0">Parent Name</th>
                      <th scope="col" class="border-0">Type</th>
                      <th scope="col" class="border-0">Featured Image</th>
                      <th scope="col" class="border-0">Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $key => $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>

                          @if($value->parent_id == 0)
                            -
                          @else
                            @if(isset($industry_arr[$value->parent_id]))
                              {{$industry_arr[$value->parent_id]}}
                            @else
                              N/A
                            @endif
                          @endif
                        </td>
                        <td>{{$value->name}}</td>
                        <td>
                            <img style="max-width: 100px;" src="{{get_thumb_url_200('categories',"/".$value->featured_image,1)}}" ></td>
                        <td>
                          <a href="/admin/categories/edit/{{$value->id}}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="javascript:" onclick='delete_product({{$value->id}})' class="btn btn-info btn-sm">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    {{$categories->appends($_GET)->links()}}
                </div>
            </div>


          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Default Light Table -->
</div>


<script>
    function delete_product(id){
        
        var ch = confirm("Are you Sure?");
        
        if (ch == true) {
            var url = "/admin/categories/delete/"+id;
            document.location.href = url;
        }
        
    }
</script>

@endsection