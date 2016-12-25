@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Hộp thư đến</h3>			
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<div class="table-responsive">
					<table class="table table-hover ">
						<tr>
							<th>Họ tên</th>		
							<th>Sdt</th>					
							<th>Email</th>
							<th>Nội dung</th>
							<th>Ngày đăng</th>
							<th>Xóa</th>
						</tr>
						@foreach($lienhes as $value)							
						<tr>
							<td>{{$value->ten}}</td>
							<td>{{$value->sdt}}</td>
							<td>{{$value->email}}</td>							
							<td>{{$value->noidung}}</td>
							<td>{{ date('H:i:s d/m/Y', strtotime($value->created_at)) }}</td>
							<td><a href="{{ url('delete-lienhe')}}/{{$value->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
						</tr>
						@endforeach				
					</table>
				</div>
			</table>

			<div style="text-align: center;">
				{{ $lienhes->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
