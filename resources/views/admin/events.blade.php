@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Events</h3>			
		</div>
		<div class="panel-body">
			@if (session('addeventsuccess'))
			<div class="alert alert-success">
				{{ session('addeventsuccess') }}
			</div>
			@endif
			<a href="{{ url('add-event')}}"><button style="float: right;" type="button" class="btn btn-primary "><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></a>
			<table class="table table-hover">
				<div class="table-responsive">
					<table class="table table-hover ">
						<tr>
							<th>Id</th>		
							<th>Title</th>					
							<th>Content</th>
							<th>Date Created</th>
							<th>Sửa</th>
							<th>Xóa</th>
						</tr>
						@foreach($events as $value)							
						<tr>
							<td>{{$value->id}}</td>
							<td>{{$value->title}}</td>
							<td>{{$value->content}}</td>							
							<td>{{ date('H:i:s d/m/Y', strtotime($value->created_at)) }}</td>
							<td><a href="{{ url('edit-event')}}/{{$value->id}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
							<td><a href="{{ url('delete-event')}}/{{$value->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
						</tr>
						@endforeach				
					</table>
				</div>
			</table>

			<div style="text-align: center;">
				{{ $events->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
