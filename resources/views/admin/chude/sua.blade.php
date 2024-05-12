@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Sửa chủ đề</div>
						<div class="card-body">
							<form action="{{ route('admin.chude.sua', ['id' => $chude->id]) }}" method="post" accept-charset="utf-8">
								@csrf
								<div class="mb-3">
									<label class="form-label" for="tenchude">Tên chủ đề</label>
									<input type="text" class="form-control @error('tenchude') is-invalid @enderror" id="tenchude" name="tenchude" value="{{ $chude->tenchude }}" required />
									@error('tenchude')
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