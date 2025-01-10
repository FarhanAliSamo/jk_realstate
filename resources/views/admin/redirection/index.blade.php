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
      <span class="text-uppercase page-subtitle">Redirections</span>
      <h3 class="page-title">All</h3>
    </div>
    
    <div class="col-4 col-sm-4" style="margin-top: 10px;">
      <a href="{{route('admin.redirection.add')}}" class="btn btn-success btn-sm" style="float: right;">Add New<i class="material-icons">add</i></a>
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
                      <th scope="col" class="border-0">From</th>
                      <th scope="col" class="border-0">To</th>
                      <th scope="col" class="border-0">Status</th>
                      <th scope="col" class="border-0">Options</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($data['redirections'] as $key => $value)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$value->url}}</td>
                          <td>{{$value->redirection_url}}</td>
                          <td>@if($value->status == 1) Enabled @else Disabled @endif</td>
                          <td>{{$value->created_at->format('d-m-Y H:i:s')}}</td>
                          <td>
                            <a target="_blank" class="btn btn-info btn-sm" href="{{route('admin.redirection.edit',[$value->id])}}/">Edit</a>
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