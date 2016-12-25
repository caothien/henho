@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Confessions</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<div class="table-responsive">
					<table class="table table-hover ">
						<tr>
							<th>Id</th>
							<th>Nội dung</th>
							<th>Bình luận</th>
							<th>Ngày đăng</th>
							<th>Duyệt</th>
							<th>Sửa</th>
							<th>Xóa</th>							
						</tr>
						@foreach($cfs as $value)							
						<tr>
							<td>{{$value->id}}</td>
							<td>{{$value->content}}</td>
							<td>{{$value->comment}}</td>
							<td>{{$value->created_at}}</td>
							<td>{{$value->duyet}}</td>
							<td><a href="{{ url('edit-confession')}}/{{$value->id}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
							<td><a href="{{ url('delete-confession')}}/{{$value->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
						</tr>
						@endforeach				
					</table>
				</div>
			</table>

			<div style="text-align: center;">
				{{ $cfs->links() }}
			</div>

		</div>
	</div>
</div>	
@endsection
