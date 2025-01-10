@extends('admin.template')

@section('styles')

<style type="text/css">
  .mb-0 tr td{
    vertical-align: middle;
  }
  
svg.w-5.h-5 {
    width: 30px;
}
</style>

@endsection

@section('content')

<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-8 col-sm-8 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Properties</span>
      <h3 class="page-title">All Properties</h3>
    </div>
    <div class="col-4 col-sm-4" style="margin-top: 10px;">
      <a href="/admin/products/add" class="btn btn-success btn-sm" style="float: right;">Add New<i class="material-icons">add</i></a>
    </div>
    
    
    <div class='col-4 col-sm-4'>
        <form action='/admin/products' method='GET'>
            <div style='margin:10px 5px;'>Search Property</div>
            <input name='keyword' value='{{request()->keyword}}' type='text' class='form-control input input-sm' style='margin-bottom:10px;' placeholder='Property Title'>
            
            <button class='btn btn-primary btn-sm'>Search</button>
        </form>
    </div>
  </div>
  
  <!-- End Page Header -->
  <!-- Default Light Table -->
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
                      <th scope="col" class="border-0">Property Name</th>
                      <th scope="col" class="border-0">Thumbnail</th>
                      <th scope="col" class="border-0">Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($products) == 0)
                      <tr>
                        <td colspan="4">
                          No Products Found. <a href="/admin/products/add" class="btn btn-info bt-sm">Add New<i class="material-icons">add</i></a>
                        </td>
                      </tr>
                    @else
                      @foreach($products as $key => $product)
                        <tr>
                          <?php
                            $i = $loop->iteration;

                            if(isset($_GET['page'])){
                              $p = $_GET['page'];
                              $i = $i+($p-1)*$limit;
                            }
                          ?>
                          <td>{{$i}}</td>
                          <td>{{$product->name}}</td>
                          <td>
                            @if($product->thumbnail_img != "")
                              <img style="max-width: 100px;" src="{{get_thumb_url_100('products',$product->thumbnail_img)}}" >
                            @endif
                          </td>
                          <td>
                            <a target="_blank" class="btn btn-info btn-sm" href="{{route('product.show',[$product->slug,$product->id])}}/">view</a>
                            <a href="/admin/products/edit/{{$product->id}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:" onclick='delete_product({{$product->id}})' class="btn btn-info btn-sm">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    {{$products->appends($_GET)->links()}}
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
            var url = "/admin/products/delete/"+id;
            document.location.href = url;
        }
        
    }
</script>

@endsection