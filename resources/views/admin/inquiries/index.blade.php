@extends('admin.template')

@section('styles')

<style type="text/css">
  .mb-0 tr td{
    font-size: 12px;
    padding: 10px 10px 10px 10px;
    border-bottom:solid 1px #ccc;
    vertical-align: middle;
  }
  
  .bg-light th {
    font-size: 12px;
    padding: 5px 0px;
}

td.scrollbar {
    max-width: 200px;
    height: 137px !important;
    overflow-x: hidden;
    display: inline-block;
}

.scrollbar-package::-webkit-scrollbar-thumb,
.scrollbar-package::-webkit-scrollbar-track,
.scrollbar::-webkit-scrollbar-thumb,
.scrollbar::-webkit-scrollbar-track {
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
	border-radius: 10px
}
.scrollbar::-webkit-scrollbar-track {
	background-color: #f5f5f5
}
.scrollbar::-webkit-scrollbar {
	width: 12px;
	background-color: #f5f5f5
}
.scrollbar::-webkit-scrollbar-thumb {
   background-color: #f6c920;
}
.scrollbar-package::-webkit-scrollbar-track {
	background-color: #f5f5f5
}
.scrollbar-package::-webkit-scrollbar {
	width: 7px;
	background-color: #f5f5f5;
	padding: 0 0 0 20px
}
.scrollbar-package::-webkit-scrollbar-thumb {
	background-color: #0000005c;
}

</style>

@endsection

@section('content')

<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-8 col-sm-8 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Inquiry</span>
      <h3 class="page-title">All</h3>
    </div>
    
   
  </div>
  <!-- End Page Header -->
  <!-- Default Light Table -->
  <div class="row">
    <div class="col-lg-12s">
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
                      <th scope="col" class="border-0">Email</th>
                      <th scope="col" class="border-0">Phone #</th>
                      <th scope="col" class="border-0">Message</th>
                      <th scope="col" class="border-0">User_ip</th>
                      <th scope="col" class="border-0">Page_url</th>
                      <th scope="col" class="border-0">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($inquiry as $key => $inqu)
                        <tr>
                          <td>{{$inqu->id}}</td>
                          <td>{{$inqu->name}}</td>
                          <td>{{$inqu->email}}</td>
                          <td>{{$inqu->phone_no}}</td>
                          <td class="scrollbar-package scrollbar">{{$inqu->message}}</td>
                          <td>{{$inqu->user_ip}}</td>
                          <td>{{$inqu->page_url}}</td>
                          <td>{{$inqu->created_at->format('d-m-Y H:i:s')}}</td>
                          
                          <td>
                            <a class='btn btn-primary btn-sm' href="{{route('admin.inquiries.delete',[$inqu->id])}}" >Delete</a>
                          </td>
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