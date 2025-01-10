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
      <span class="text-uppercase page-subtitle">Blog Comments</span>
      <h3 class="page-title">All</h3>
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
                      
                      <th scope="col" class="border-0">Name</th>
                      <th scope="col" class="border-0">Date</th>
                      <th scope="col" class="border-0">Message</th>
                      <th scope="col" class="border-0">Page Url</th>
                      <th scope="col" class="border-0">User IP</th>
                      <th scope="col" class="border-0">Approved</th>
                      <th scope="col" class="border-0">options</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                      @foreach($blogscomments as $key => $value)
                      
                        <tr>
                            
                          <td>{{$loop->iteration}}</td>
                          <td>{{$value->bname}}</td>
                          <td>{{$value->created_at->format('d-m-Y H:i:s')}}</td>
                          <td>{{$value->bmessage}}</td>
                          <td>{{$value->page_url}}</td>
                          <td>{{$value->user_ip}}</td>
                          <td>{{Form::select('is_approved',['0' => 'No','1' => 'Yes'],$value->is_approved,['class' => 'form-control input inptu-sm target','data-id'=>$value->id])}}</td>
                          <td>
                             
                              <a href="javascript:" onclick='delete_product({{$value->id}})' class="btn btn-info btn-sm">Delete</a>
                          <br>
                            <a style="margin-top: 10px;" target="_blank" class="btn btn-info btn-sm" href="{{route('admin.blogcomments.edit',$value->id)}}">Edit</a></td>
                        </tr>
                      @endforeach
                      
                  </tbody>
                </table>
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


<script>
    function delete_product(id){
        
        var ch = confirm("Are you Sure?");
        
        if (ch == true) {
            var url = "/admin/blogcomments/delete/"+id;
            document.location.href = url;
        }
        
    }
</script>


<script>
    $(".target").change(function() {
        var newValue = $(this).val();
        var rowId = $(this).data('id');
        console.log(newValue);
        console.log(rowId);
            var dataString = 'id=' +  rowId  + '&value=' + newValue + '&_token={{csrf_token()}}'; 
            console.log(dataString);        
            $.ajax({
 
                type:'POST',
                data:dataString,
                url:"{{route('admin.blogcomments.update')}}",
                
                success: function(response){
                    console.log('Value Updated');
                },
                error: function(jqXhr) {
    
                }
                                
            });
            return false;

    });
</script>

@endsection