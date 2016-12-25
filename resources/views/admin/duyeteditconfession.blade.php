@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
		<h3 class="panel-title">Edit Confession</h3>
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
			<form role="form" action="{{ url('/duyet-edit-confession') }}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{$cfs->id}}">
				<div class="form-group">
					<label>Confession</label>
					<textarea name="content" class="form-control" rows="15">{{$cfs->content}}</textarea>
				</div>

				<div class="form-group">
					<label>Comment</label>
					<input type="text" name="comment" class="form-control" value="{{$cfs->comment}}">
				</div>

				<div class="form-group">
					<label>Duyệt</label>
					<select class="form-control" name="duyet">
						<option value="yes" selected>Yes</option>
						<option value="no">No</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary" style="width: 100%">Submit</button>

			</form>
		</div>
	</div>
</div>

@endsection
