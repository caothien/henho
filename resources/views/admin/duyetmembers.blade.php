@extends('layouts.app')

@section('content')
	<div class="row">
		@foreach($thanhviens as $key => $value)
		@if($key < 4)
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="khung_profile">
				<div class="hovereffect">
					<img class="img-responsive img-thumbnail img-circle" src="{{$value->avatar}}" alt="avatar">
					<div class="overlay">
						<h2>{{$value->ten}}</h2>
						<a class="info" href="{!! url('duyet-member') !!}/{!! $value->id !!}">Xem thông tin</a>
					</div>
				</div>	
				<div class="quequan_namsinh">	
					<p><strong>{{$value->namsinh}}</strong></p>
					<h3><strong>{{$value->ten_quequan}}</strong></h3>
				</div>
			</div>
		</div>
		@endif
		@endforeach 
	</div>

	<div class="row">
		@foreach($thanhviens as $key => $value)
		@if($key > 3 && $key < 8)
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="khung_profile">
				<div class="hovereffect">
					<img class="img-responsive img-thumbnail img-circle" src="{{$value->avatar}}" alt="avatar">
					<div class="overlay">
						<h2>{{$value->ten}}</h2>
						<a class="info" href="{!! url('member') !!}/{!! $value->id !!}">Xem thông tin</a>
					</div>
				</div>	
				<div class="quequan_namsinh">	
					<p><strong>{{$value->namsinh}}</strong></p>
					<h3><strong>{{$value->ten_quequan}}</strong></h3>
				</div>
			</div>
		</div>
		@endif
		@endforeach 
	</div>

	<div class="row">
		@foreach($thanhviens as $key => $value)
		@if($key > 7 && $key < 12)
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="khung_profile">
				<div class="hovereffect">
					<img class="img-responsive img-thumbnail img-circle" src="{{$value->avatar}}" alt="avatar">
					<div class="overlay">
						<h2>{{$value->ten}}</h2>
						<a class="info" href="{!! url('duyet-member') !!}/{!! $value->id !!}">Xem thông tin</a>
					</div>
				</div>	
				<div class="quequan_namsinh">	
					<p><strong>{{$value->namsinh}}</strong></p>
					<h3><strong>{{$value->ten_quequan}}</strong></h3>
				</div>
			</div>
		</div>
		@endif
		@endforeach 
	</div>

	<div class="row">
		@foreach($thanhviens as $key => $value)
		@if($key > 11 && $key < 16)
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="khung_profile">
				<div class="hovereffect">
					<img class="img-responsive img-thumbnail img-circle" src="{{$value->avatar}}" alt="avatar">
					<div class="overlay">
						<h2>{{$value->ten}}</h2>
						<a class="info" href="{!! url('duyet-member') !!}/{!! $value->id !!}">Xem thông tin</a>
					</div>
				</div>	
				<div class="quequan_namsinh">	
					<p><strong>{{$value->namsinh}}</strong></p>
					<h3><strong>{{$value->ten_quequan}}</strong></h3>
				</div>
			</div>
		</div>
		@endif
		@endforeach 
	</div>

	<div style="text-align: center;">
		{{ $thanhviens->links() }}
	</div>

@endsection