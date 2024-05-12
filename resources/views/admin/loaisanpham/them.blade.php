@extends('layouts.app')
@section('content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Thêm loại sản phẩm</div>
						<div class="card-body">
							<form action="{{ route('admin.loaisanpham.them') }}" method="post" accept-charset="utf-8">
								@csrf
								<div class="mb-3">
									<label class="form-label" for="tenloai">Tên loại</label>
										<input type="text" class="form-control  @error('tenloai') is-invalid @enderror" id="tenloai" name="tenloai" value="{{ old('tenloai') }}" required />
										@error('tenloai')
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