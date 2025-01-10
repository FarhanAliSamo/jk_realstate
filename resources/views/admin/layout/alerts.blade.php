

@if(session()->has('success'))
	<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">×</span>
	  </button>
	  <strong><i class="material-icons">check</i>Success!</strong> {{session()->get('success')}}
	</div>
@endif


@if(session()->has('error'))

	<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">×</span>
	  </button>
	  <strong>Error!</strong> {{session()->get('error')}}
	</div>

@endif
  