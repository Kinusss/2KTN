@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Sửa đơn hàng</div>
						<div class="card-body">
							<form action="{{ route('admin.donhang.sua', ['id' => $donhang->id]) }}) }}" method="post" accept-charset="utf-8">
								@csrf
								<div class="mb-3">
									<label class="form-label" for="user_id">Khách hàng</label>
									<input type="text" class="form-control" id="user" name="user_id" value="{{ $donhang->NguoiDung->name }}" disabled required />
								</div>
								<div class="mb-3">
									<label class="form-label" for="dienthoaigiaohang">Điện thoại giao hàng</label>
									<input type="text" class="form-control @error('dienthoaigiaohang') is-invalid @enderror" id="dienthoaigiaohang" name="dienthoaigiaohang" value="{{ $donhang->dienthoaigiaohang }}" required />
									@error('dienthoaigiaohang')
										<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
									@enderror
								</div>
								<div class="mb-3">
									<label class="form-label" for="diachigiaohang">Địa chỉ giao hàng</label>
									<input type="text" class="form-control @error('diachigiaohang') is-invalid @enderror" id="diachigiaohang" name="diachigiaohang" value="{{ $donhang->diachigiaohang }}" required />
									@error('diachigiaohang')
										<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
									@enderror
								</div>
								<div class="mb-3">
									<label class="form-label" for="tinhtrang_id">Tình trạng đơn hàng</label>
									<select class="form-select @error('tinhtrang_id') is-invalid @enderror" id="tinhtrang_id" name="tinhtrang_id" required>
										<option value="">-- Chọn --</option>
										@foreach($tinhtrang as $value)
											<option value="{{ $value->id }}" {{ ($donhang->tinhtrang_id == $value->id) ? 'selected' : '' }}>{{ $value->tinhtrang }}</option>
										@endforeach
									</select>
									@error('tinhtrang_id')
										<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
									@enderror
								</div>
								<div class="mb-3">
									<button type="submit" class="btn btn-primary mb-2"><i class="fas fa-save"></i> Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection