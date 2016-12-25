@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Thông tin thành viên</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" action="{{ url('/duyet-member') }}" method="post">
					{{ csrf_field() }}

					<input type="hidden" name="id" value="{{$member->id}}">

					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<img class="img-responsive img-thumbnail" src="{{URL::asset($member->avatar)}}" alt="avatar">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Họ tên</label>
						<div class="col-sm-10">
							<input class="form-control" value="{{$member->ten}}" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Giới tính</label>
						<div class="col-sm-10">
							<input class="form-control" value="{{$member->gioitinh}}" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Tình trạng</label>
						<div class="col-sm-10">
							<input class="form-control" value="{{$member->tinhtrang}}" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Mong muốn</label>
						<div class="col-sm-10">
							<input class="form-control" value="{{$member->mongmuon}}" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Số điện thoại</label>
						<div class="col-sm-10">
							<input class="form-control" value="{{$member->sdt}}" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Năm sinh</label>
						<div class="col-sm-10">
							<input class="form-control" value="{{$member->namsinh}}" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Trường</label>
						<div class="col-sm-10">
							<input class="form-control" value="{{$member->ten_truong}}" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Quê quán</label>
						<div class="col-sm-10">
							<input class="form-control" value="{{$member->ten_quequan}}" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Facebook</label>
						<div class="col-sm-10">
							<a href="{{$member->facebook}}"><button type="button" class="btn btn-primary form-control">Xem ngay</button></a>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Giới thiệu</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="7" disabled="">{{$member->gioithieu}}</textarea>
						</div>
					</div>

					<div class="form-group">
							<label class="col-sm-2 control-label">Ngày tham gia</label>
							<div class="col-sm-10">
								<input class="form-control" value="{{ date('d-m-Y', strtotime($member->created_at)) }}" disabled>
							</div>
						</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Xóa tài khoản</label>
						<div class="col-sm-10">
							<a href="{{ url('delete-member')}}/{{$member->id}}"><button type="button" class="btn btn-primary form-control"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Duyệt</label>
						<div class="col-sm-10">
							<select class="form-control" name="duyet">
								<option value="yes" selected>Yes</option>
								<option value="no">No</option>
							</select>
						</div>					
					</div>

					<button type="submit" class="btn btn-primary" style="width: 100%">Submit</button>

				</form>

				<hr>
			</div>
		</div>
	</div>
</div>
@endsection