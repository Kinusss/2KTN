@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Sửa hãng sản xuất</div>
						<div class="card-body">
							<form action="{{ route('admin.hangsanxuat.sua', ['id' => $hangsanxuat->id]) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								@csrf
								<div class="mb-3">
									<label class="form-label" for="tenhang">Tên hãng</label>
									<input type="text" class="form-control @error('tenhang') is-invalid @enderror" id="tenhang" name="tenhang" value="{{ $hangsanxuat->tenhang }}" value="{{ old('tenhang') }}" required />
									@error('tenhang')
										<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
									@enderror
								</div>
								
								<div class="mb-3">
									<label class="form-label" for="hinhanh">Hình ảnh</label>
									@if(!empty($hangsanxuat->hinhanh))
										<img class="d-block rounded img-thumbnail" src="{{ env('APP_URL') . '/storage/app/' . $hangsanxuat->hinhanh . '?t=' . time() }}" width="100" />
										<span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
									@endif
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
