@extends('template')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Thông tin thành viên</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal">

						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<img class="img-responsive img-thumbnail" src="{{URL::asset($profile->avatar)}}" alt="avatar">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Họ tên</label>
							<div class="col-sm-10">
								<input class="form-control" value="{{$profile->ten}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Giới tính</label>
							<div class="col-sm-10">
								<input class="form-control" value="{{$profile->gioitinh}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tình trạng</label>
							<div class="col-sm-10">
								<input class="form-control" value="{{$profile->tinhtrang}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Mong muốn</label>
							<div class="col-sm-10">
								<input class="form-control" value="{{$profile->mongmuon}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Số điện thoại</label>
							<div class="col-sm-10">
								<input class="form-control" value="{{$profile->sdt}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Năm sinh</label>
							<div class="col-sm-10">
								<input class="form-control" value="{{$profile->namsinh}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Trường</label>
							<div class="col-sm-10">
								<input class="form-control" value="{{$profile->ten_truong}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Quê quán</label>
							<div class="col-sm-10">
								<input class="form-control" value="{{$profile->ten_quequan}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Facebook</label>
							<div class="col-sm-10">
								<a href="{{$profile->facebook}}"><button type="button" class="btn btn-primary form-control">Xem ngay</button></a>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Giới thiệu</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="7" disabled="">{{$profile->gioithieu}}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Ngày tham gia</label>
							<div class="col-sm-10">
								<input class="form-control" value="{{ date('d-m-Y', strtotime($profile->created_at)) }}" disabled>
							</div>
						</div>

					</form>

					<hr>

					<div class="fb-like" data-href="http://henhosinhvien.com/profile/{{$profile->id}}" data-width="400" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>

					<div class="fb-comments" data-href="http://henhosinhvien/profile/{{$profile->id}}" data-width="100%" data-numposts="10"></div>
			</div>
		</div>
	</div>
</div>
@endsection