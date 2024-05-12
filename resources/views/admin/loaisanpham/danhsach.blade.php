@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="container">
			<div class="page-title">
				<h3>Loại Sản Phẩm
					<a href="{{ route('admin.loaisanpham.them') }}" class="btn btn-nm btn-outline-success float-end"><i class="fas fa-plus"></i> Thêm Mới</a>
				</h3>
			</div>
			<div class="box box-primary">
				<div class="box-body">
					<table width="100%" class="table table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>#</th>
								<th>Tên loại</th>
								<th>Tên loại không dấu</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($loaisanpham as $value)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $value->tenloai }}</td>
									<td>{{ $value->tenloai_slug }}</td>
									<td class="text-end">
										<a href="{{ route('admin.loaisanpham.sua', ['id' => $value->id]) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
										<a href="{{ route('admin.loaisanpham.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa mục &quot;{{ $value->tenloai }}&quot; không?');" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection