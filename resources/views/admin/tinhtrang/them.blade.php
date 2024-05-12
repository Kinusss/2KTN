@extends('layouts.app')
@section('content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Thêm tình trạng</div>
						<div class="card-body">
							<form action="{{ route('admin.tinhtrang.them') }}" method="post" accept-charset="utf-8">
								@csrf
								<div class="mb-3">
									<label class="form-label" for="tinhtrang">Tình trạng</label>
									<input type="text" class="form-control  @error('tinhtrang') is-invalid @enderror" id="tinhtrang" name="tinhtrang" value="{{ old('tinhtrang') }}" required />
									@error('tinhtrang')
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