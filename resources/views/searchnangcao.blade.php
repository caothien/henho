@extends('template')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tìm kiếm nâng cao !</h3>
			</div>
			<div class="panel-body">
				@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
				@endif

				<form role="form" action="{{ url('/search-truong') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label>Sinh viên trường</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
							<select class="form-control" name="truong">
								@foreach($truongs as $key => $value)
								@if (old('truong') == $key+1)
								<option value="{{ $key+1 }}" selected>{{ $value->ten_truong }}</option>
								@else
								<option value="{{ $key+1 }}">{{ $value->ten_truong }}</option>
								@endif
								@endforeach 
							</select>
						</div> 							
					</div>

					<button type="submit" class="btn btn-default">Submit</button>					
				</form>

				<hr style="border: solid 1px red;">

				<form role="form" action="{{ url('/search-quequan') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label>Quê quán</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
							<select class="form-control" name="quequan">
								@foreach($quequans as $key => $value)
								@if (old('quequan') == $key+1)
								<option value="{{ $key+1 }}" selected>{{ $value->ten_quequan }}</option>
								@else
								<option value="{{ $key+1 }}">{{ $value->ten_quequan }}</option>
								@endif
								@endforeach 
							</select>
						</div> 							
					</div>

					<button type="submit" class="btn btn-default">Submit</button>					
				</form>

				<hr style="border: solid 1px red;">

				<form role="form" action="{{ url('/search-namsinh') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label>Năm sinh</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
							<select class="form-control" name="namsinh">
								@for($a=1990; $a<=2000; $a++)
								@if (old('namsinh') == $a)
								<option value="{{ $a }}" selected>{{ $a }}</option>
								@else
								<option value="{{ $a }}">{{ $a }}</option>
								@endif
								@endfor
							</select>
						</div> 							
					</div>

					<button type="submit" class="btn btn-default">Submit</button>					
				</form>

				<hr style="border: solid 1px red;">
			</div>
		</div>
	</div>
</div>
@endsection