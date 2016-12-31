@extends('template')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title" style = "text-align: center;"> Svdn Confessions</h3>
			</div>
			<div class="panel-body">
				<p style="color: blue">-- <i>Confession số {{$stt}}</i> -- &nbsp;  &nbsp; {{ date('H:i:s d/m/Y', strtotime($confession->created_at)) }}</p>
				<p>{{$confession->content}}</p>
				<p>## admin ##</p>
				<p>{{$confession->comment}}</p>
				<hr style="background-color: red; height: 1px;">
				<div class="fb-like" data-href="http://henhosinhvien.com/confession/{{$confession->id}}" data-width="400" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>

				<div class="fb-comments" data-href="http://henhosinhvien.com/confession/{{$confession->id}}" data-width="100%" data-numposts="10"></div>
			</div>
		</div>

	</div>

	@endsection