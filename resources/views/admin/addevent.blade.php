@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Add Event</h3>			
		</div>
		<div class="panel-body">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<form role="form" action="{{ url('/add-event') }}" method="post">
				{{ csrf_field() }}

				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control" >
				</div>

				<div class="form-group">
					<label>Content</label>
					<textarea name="content" class="form-control" rows="15"></textarea>
					<input type="hidden" name="comment" value="no">
				</div>

				<button type="submit" class="btn btn-primary" style="width: 100%">Submit</button>

			</form>
		</div>
	</div>
</div>
@endsection
