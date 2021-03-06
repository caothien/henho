@extends('template')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2></h2>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-8">

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
						@if (session('tinh_sai'))
						<div class="alert alert-success">
							{{ session('tinh_sai') }}
						</div>
						@endif

						<img class="img-responsive img-thumbnail" src="{{URL::asset('images/confessions.jpg')}}" alt="confession logo" >

						<h3></h3>

						<p><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> &nbsp; &nbsp; Bạn có những điều thầm kín muốn thổ lộ, những tâm sự không biết chia sẻ cùng ai hay những trải nghiệm khó quên trong cuộc đời sinh viên ?</p>

						<p><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> &nbsp; &nbsp; Bạn muốn tìm một nơi để trút bầu tâm sự mà không muốn mọi người biết mình là ai ?</p>

						<p><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> &nbsp; &nbsp; Hãy gửi những điều đó đến với Svdn Confessions --- Luôn luôn lắng nghe --- lâu lâu mới hiểu ^_^</p>

						<p><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> &nbsp; &nbsp; Làm ơn không spam, không quảng cáo các kiểu... Hãy viết thật độc đáo, ý nghĩa và không sử dụng những từ ngữ phản cảm !</p>

						<p><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> &nbsp; &nbsp; Nghiêm cấm các bài viết mang tính đả kích, nói xấu, xúc phạm người khác, các bài viết liên quan đến chính trị, tôn giáo, ngôn ngữ thô tục... và đặc biệt là bài viết phải giữ được sự trong sáng của tiếng Việt. Hạn chế dùng ngôn ngữ teen @@</p>

						<p><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> &nbsp; &nbsp; Xin cảm ơn !!!</p>	

						<hr>

						<form role="form" action="{{ url('/send-confession') }}" method="post">
							{{ csrf_field() }}

							<div class="form-group">
								<label>Confession</label>
								<textarea name="confession" class="form-control" rows="15">{{ old('confession') }}</textarea>
								<input type="hidden" name="comment" value="no">
							</div>
							<div class="form-group">
								<label>Câu hỏi IQ</label>
								<?php $a = rand(0, 30); $b = rand(0, 30); ?>
								<input type="hidden" name="a" value="{{$a}}">
								<input type="hidden" name="b" value="{{$b}}">
								<input type="text" class="form-control" name="tong" placeholder="Tổng của {{$a}} và {{$b}}">
							</div>

							<button type="submit" class="btn btn-primary" style="width: 100%">Submit</button>

						</form>


					</div>
					<div class="col-md-4">
						<div class="table-responsive">
							<table class="table table-condensed table-hover ">
								<div class="row">
									<tr>
										<th class="col-md-6">Confessions</th>
										<th class="col-md-6">Thả thính</th>
									</tr>
								</div>
								@foreach($cfs as $key => $value)							
								<tr>
									<td>Confession số {{$key + 1}}</td>
									<td><a href="{!! url('confession') !!}/{!! $value->id !!}/{!! $key + 1 !!}" class="btn btn-primary">Xem !</a></td>
								</tr>
								@endforeach
							</table>
						</div>
						<div style="text-align: center;">
							{{ $cfs->links() }}
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>

</div>

@endsection