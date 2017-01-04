@extends('template')

@section('content')
	<script type="text/javascript">
		function isNumberKey(evt){
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if(charCode == 59 || charCode == 46)
        return true;
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
       return true;
    }
	</script>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Chúc bạn sớm tìm được một nữa - ahihi !</h3>
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
					@if (session('tinh_sai'))
						<div class="alert alert-success">
							{{ session('tinh_sai') }}
						</div>
						@endif

					<form role="form" action="{{ url('/dangki') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Tên hoặc nick name</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" name="ten" class="form-control" placeholder="Tên hoặc nick name" value="{{ old('ten') }}">
								<span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"  style="color: red;"></i></span>
							</div> 							
						</div>

						<div class="form-group">
							<label>Giới tính</label>
							<div class="input-group">
								<label class="radio-inline">
									<input type="radio" name="gioitinh" value="Nam" @if(old('gioitinh') ==  'Nam') checked="checked" @endif> Nam
								</label>
								<label class="radio-inline">
									<input type="radio" name="gioitinh" value="Nữ" @if(old('gioitinh') ==  'Nữ') checked="checked" @endif> Nữ
								</label>								
							</div> 							
						</div>

						<div class="form-group">
							<label>Tình trạng hôn nhân</label>
							<div class="input-group">
								<span class="input-group-addon"><i class=" glyphicon glyphicon-heart"></i></span>
								<input type="text" name="tinhtrang" class="form-control" placeholder="Tình trạng hôn nhân" value="{{ old('tinhtrang') }}">
								<span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"  style="color: red;"></i></span>
							</div> 							
						</div>

						<div class="form-group">
							<label>Lý do đăng ký</label>
							<div class="input-group">
								<span class="input-group-addon"><i class=" glyphicon glyphicon-record"></i></span>
								<input type="text" name="mongmuon" class="form-control" placeholder="Mong muốn" value="{{ old('mongmuon') }}">
								<span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"  style="color: red;"></i></span>
							</div> 							
						</div>

						<div class="form-group">
							<label>Số điện thoại</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
								<input type="text" name="sdt" class="form-control" placeholder="Số điện thoại" value="{{ old('sdt') }}" onkeypress=" return isNumberKey(event)">
								<span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"  style="color: red;"></i></span>
							</div> 							
						</div>

						<div class="form-group">
							<label>Facebook</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input type="text" name="facebook" class="form-control" placeholder="Nhập link facebook" value="{{ old('facebook') }}">
								<span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"  style="color: red;"></i></span>
							</div> 
							<i><p class="help-block" style="color: red"> Vào trang cá nhân => copy đường dẫn URL trên trình duyệt.</p></i>						
						</div>

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

						<div class="form-group">
							<label>Giới thiệu</label>
							<textarea name="gioithieu" class="form-control" rows="7">{{ old('gioithieu') }}</textarea>
						</div>

						<div class="form-group">
							<label>Avatar</label>
							<input type="file" name="avatar">
							<p class="help-block" style="color: red">Chú ý: Chọn ảnh có dung lượng dưới 1Mb</p>
						</div>

						<div class="form-group">
							<label>Câu hỏi IQ</label>
							<?php $a = rand(0, 30); $b = rand(0, 30); ?>
							<input type="hidden" name="a" value="{{$a}}">
							<input type="hidden" name="b" value="{{$b}}">
							<input type="text" class="form-control" name="tong" placeholder="Tổng của {{$a}} và {{$b}}">
						</div>

						<button type="submit" class="btn btn-default">Submit</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection