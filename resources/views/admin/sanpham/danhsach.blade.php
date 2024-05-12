@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="container">
			<div class="page-title">
				<h3>Sản Phẩm
					<a href="{{ route('admin.sanpham.xuat') }}" class="btn btn-success float-end"><i class="fas fa-file-export"></i> Xuất ra Excel</a>
					<a href="#nhap" class="btn btn-warning float-end me-1" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fas fa-file-import"></i> Nhập từ Excel</a>
					<a href="{{ route('admin.sanpham.them') }}" class="btn btn-nm btn-outline-success float-end me-1"><i class="fas fa-plus"></i> Thêm Mới</a>
				</h3>
			</div>
			<div class="box box-primary">
				<div class="box-body">
				{{$sanpham->links()}}
					<table width="100%" class="table table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>#</th>
								<th>Hình ảnh</th>
								<th>Loại sản phẩm</th>
								<th>HSX</th>
								<th>Tên sản phẩm</th>
								<th>SL</th>
								<th>Đơn giá</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($sanpham as $value)
								<tr>
									<td>{{ $loop->index + $sanpham->firstItem() }}</td>
									<td><img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" width="80" class="img-thumbnail" /></td>
									<td>{{ $value->LoaiSanPham->tenloai }}</td>
									<td>{{ $value->HangSanXuat->tenhang }}</td>
									<td>{{ $value->tensanpham }}</td>
									<td class="text-end">{{ $value->soluong }}</td>
									<td class="text-end">{{ number_format($value->dongia) }}</td>
									<td class="text-end">
										<a href="{{ route('admin.sanpham.sua', ['id' => $value->id]) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
										<a href="{{ route('admin.sanpham.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm &quot;{{ $value->tensanpham }}&quot; không?');" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				{{$sanpham->links()}}
				</div>
			</div>
		</div>
	</div>
	<form action="{{ route('admin.sanpham.nhap') }}" method="post" enctype="multipart/form-data">
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