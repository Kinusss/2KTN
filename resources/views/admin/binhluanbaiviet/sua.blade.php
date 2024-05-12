@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Sửa bình luận bài viết</div>
						<div class="card-body">
							<form action="{{ route('admin.binhluanbaiviet.sua', ['id' => $binhluanbaiviet->id]) }}" method="post" accept-charset="utf-8">
								@csrf
								<div class="mb-3">
									<label class="form-label" for="baiviet_id">Bài viết</label>
									<select class="form-select @error('baiviet_id') is-invalid @enderror" id="baiviet_id" name="baiviet_id" required>
										<option value="">-- Chọn --</option>
										@foreach($baiviet as $value)
											<option value="{{ $value->id }}" {{ ($binhluanbaiviet->baiviet_id == $value->id) ? 'selected' : '' }}>{{ $value->tieude }}</option>
										@endforeach
									</select>
									@error('baiviet_id')
										<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
									@enderror
								</div>
								<div class="mb-3">
									<label class="form-label" for="noidungbinhluan">Nội dung bình luận</label>
									<textarea class="form-control" id="noidungbinhluan" name="noidungbinhluan" required>{{ $binhluanbaiviet->noidungbinhluan }}</textarea>
									@error('noidungbinhluan')
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