@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Edit Event</h3>
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
			<form role="form" action="{{ url('/edit-event') }}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{$event->id}}">

				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control" value="{{$event->title}}">
				</div>

				<div class="form-group">
					<label>Content</label>
					<textarea name="content" class="form-control" rows="15">{{$event->content}}</textarea>
				</div>

				<button type="submit" class="btn btn-primary" style="width: 100%">Submit</button>

			</form>
		</div>
	</div>
</div>

@endsection
