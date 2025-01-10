@extends('admin.template')

@section('styles')

<style type="text/css">
  .mb-0 tr td{
    vertical-align: middle;
  }
</style>

@endsection

@section('content')
<div class="container">
    <h2>Edit Review</h2>
    <form method="POST" action="{{ route('reviews.update', $review->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="client_name">Client Name</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $review->client_name }}" required>
        </div>
        <div class="form-group">
            <label for="review_text">Review Text</label>
            <textarea class="form-control" id="review_text" name="review_text" rows="4" required>{{ $review->review_text }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Client Image (optional)</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        @if ($review->image_path)
        <div class="form-group">
            <label>Current Image</label>
            <img src="{{ asset($review->image_path) }}" alt="Client Image" class="img-thumbnail" width="150">
        </div>
        @endif
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection