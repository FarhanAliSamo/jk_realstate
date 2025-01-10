@extends('admin.template')

@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-12 text-center text-sm-left mb-0">
            <h3 class="page-title">{{ $page_title }}</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-small mb-4">
                <div class="card-body">
                    <form action="{{ route('admin.robots.update') }}" method="POST">
                         @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="content">Robots.txt Content</label>
                        <textarea name="content"  class="form-control" rows="10">{{ html_entity_decode($robotsContent) }}</textarea>




                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->
</div>

@endsection

@section('scripts')


@endsection
