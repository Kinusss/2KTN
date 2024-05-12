@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="container">
			<div class="page-title">
				<h3>Người Dùng
					<a href="{{ route('admin.nguoidung.them') }}" class="btn btn-nm btn-outline-success float-end"><i class="fas fa-plus"></i> Thêm Mới</a>
				</h3>
			</div>
			<div class="box box-primary">
				<div class="box-body">
					<table width="100%" class="table table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>#</th>
								<th>Họ và tên</th>
								<th>Tên đăng nhập</th>
								<th>Email</th>
								<th>Số điện thoại</th>
								<th>Quyền hạn</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($nguoidung as $value)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $value->name }}</td>
									<td>{{ $value->username }}</td>
									<td>{{ $value->email }}</td>
									<td>{{ $value->phone }}</td>
									<td>{{ $value->role }}</td>
									<td class="text-end">
										<a href="{{ route('admin.nguoidung.sua', ['id' => $value->id]) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
										<a href="{{ route('admin.nguoidung.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản &quot;{{ $value->name }}&quot; không?');" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
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