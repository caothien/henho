@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Confessions</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover ">
					<div class="row">
						<tr>
							<th class="col-md-1">Id</th>
							<th class="col-md-6">Nội dung</th>
							<th class="col-md-1">Bình luận</th>
							<th class="col-md-1">Ngày đăng</th>
							<th class="col-md-1">Duyệt</th>
							<th class="col-md-1">Sửa</th>
							<th class="col-md-1">Xóa</th>							
						</tr>
					</div>
					@foreach($cfs as $value)
						<div class="row">							
							<tr>
								<td class="col-md-1">{{$value->id}}</td>
								<td class="col-md-6">{{$value->content}}</td>
								<td class="col-md-1">{{$value->comment}}</td>
								<td class="col-md-1">{{$value->created_at}}</td>
								<td class="col-md-1">{{$value->duyet}}</td>
								<td class="col-md-1"><a href="{{ url('edit-confession')}}/{{$value->id}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
								<td class="col-md-1"><a href="{{ url('delete-confession')}}/{{$value->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
							</tr>
						</div>
					@endforeach				
				</table>
			</div>

			<div style="text-align: center;">
				{{ $cfs->links() }}
			</div>

		</div>
	</div>
</div>	
@endsection
