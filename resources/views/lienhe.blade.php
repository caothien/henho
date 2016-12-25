@extends('template')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align : center;">Liên hệ - Góp ý !</h3>
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

					@if (session('sendsuccess'))
						<div class="alert alert-success">
							{{ session('sendsuccess') }}
						</div>
						@endif

					<form role="form" action="{{ url('/lienhe') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Họ và Tên</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" name="ten" class="form-control" placeholder="Họ và tên" value="{{ old('ten') }}">
								<span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"  style="color: red;"></i></span>
							</div> 							
						</div>

						<div class="form-group">
							<label>Số điện thoại</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
								<input type="text" name="sdt" class="form-control" placeholder="Số điện thoại" value="{{ old('sdt') }}">
								<span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"  style="color: red;"></i></span>
							</div> 							
						</div>

						<div class="form-group">
							<label>Email</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input type="email" name="email" class="form-control" placeholder="Emai" value="{{ old('email') }}">
								<span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"  style="color: red;"></i></span>
							</div> 												
						</div>

						<div class="form-group">
							<label>Nội dung</label>
							<textarea name="noidung" class="form-control" rows="5">{{ old('noidung') }}</textarea>
						</div>

						<button type="submit" class="btn btn-default">Submit</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection