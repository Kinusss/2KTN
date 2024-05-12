@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="container">
			<div class="page-title">
				<h3>Hãng Sản Xuất
					<a href="{{ route('admin.hangsanxuat.xuat') }}" class="btn btn-success float-end"><i class="fas fa-file-export"></i> Xuất ra Excel</a>
					<a href="#nhap" class="btn btn-warning float-end me-1" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fas fa-file-import"></i> Nhập từ Excel</a>
					<a href="{{ route('admin.hangsanxuat.them') }}" class="btn btn-nm btn-outline-success float-end me-1"><i class="fas fa-plus"></i> Thêm Mới</a>
				</h3>
			</div>
			<div class="box box-primary">
				<div class="box-body">
					<table width="100%" class="table table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>#</th>
								<th>Hình ảnh</th>
								<th>Tên hãng sản xuất</th>
								<th>Tên hãng sản xuất không dấu</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($hangsanxuat as $value)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td><img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh . '?t=' . time() }}" width="100" class="img-thumbnail" /></td>
									<td>{{ $value->tenhang }}</td>
									<td>{{ $value->tenhang_slug }}</td>
									<td class="text-end">
										<a href="{{ route('admin.hangsanxuat.sua', ['id' => $value->id]) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
										<a href="{{ route('admin.hangsanxuat.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa hãng sản xuất &quot;{{ $value->tenhang }}&quot; không?');" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<form action="{{ route('admin.hangsanxuat.nhap') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true"><div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-0">
						<label for="file_excel" class="form-label">Chọn tập tin Excel</label>
						<input type="file" class="form-control" id="file_excel" name="file_excel" required />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-light fa-times"></i> Hủy bỏ</button>
					<button type="submit" class="btn btn-danger"><i class="fa-light fa-upload"></i> Nhập dữ liệu</button>
				</div>
				</div>
			</div>
		</div>
	</form>
@endsection