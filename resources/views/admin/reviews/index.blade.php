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
    <h2>Client Reviews</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('reviews.create') }}" class="btn btn-primary mb-3">Add Review</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Client Name</th>
                <th>Review Text</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->client_name }}</td>
                <td>{{ $review->review_text }}</td>
                <td>
                    @if ($review->image_path)
                    <img src="{{ asset($review->image_path) }}" alt="Client Image" class="img-thumbnail" width="100">
                    @else
                    No Image
                    @endif
                </td>
                <td>
                    <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection