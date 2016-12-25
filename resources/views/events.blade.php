@extends('template')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Thông báo</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-hover ">
						@foreach($events as $value)							
						<tr>
							<td class="col-md-6"><strong style="color: green;">{{$value->title}}</strong></td>
							<td class="col-md-4">{{ date('H:i:s d/m/Y', strtotime($value->created_at)) }}</td>
							<td class="col-md-2"><a href="{!! url('thongbao') !!}/{!! $value->id !!}"><button class="btn btn-primary">Click !</button></a></td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>

	</div>

	@endsection