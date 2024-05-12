@extends('layouts.app')
@section('content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Thêm hãng sản xuất</div>
						<div class="card-body">
							<form action="{{ route('admin.hangsanxuat.them') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								@csrf
								<div class="mb-3">
									<label class="form-label" for="tenhang">Tên hãng</label>
									<input type="text" class="form-control  @error('tenhang') is-invalid @enderror" id="tenhang" name="tenhang" value="{{ old('tenhang') }}" required />
									@error('tenhang')
										<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
									@enderror
								</div>
								
								<div class="mb-3">
									<label class="form-label" for="hinhanh">Hình ảnh</label>
									<input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" />
									@error('hinhanh')
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
