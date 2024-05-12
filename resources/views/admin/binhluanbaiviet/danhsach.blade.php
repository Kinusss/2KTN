@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="container">
			<div class="page-title">
				<h3>Bình luận bài viết
					<a href="{{ route('admin.binhluanbaiviet.them') }}" class="btn btn-nm btn-outline-success float-end"><i class="fas fa-plus"></i> Thêm Mới</a>
				</h3>
			</div>
			<div class="box box-primary">
				<div class="box-body">
					<table width="100%" class="table table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="20%">Người đăng</th>
								<th width="55%">Thông tin bình luận</th>
								<th width="20%" colspan="4" class="text-center">Hành động</th>
							</tr>
						</thead>
						<tbody>
							@foreach($binhluanbaiviet as $value)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $value->NguoiDung->name }}</td>
									<td style="text-align:justify">
										<span class="d-block fw-bold text-primary"><a href="{{ route('admin.binhluanbaiviet.sua', ['id' => $value->id]) }}">{{ $value->BaiViet->tieude }}</a></span>
										<span class="d-block small">
											Ngày đăng: <strong>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</strong>
											<br />Nội dung bình luận: <strong>{{ $value->noidungbinhluan }}</strong>
										</span>
									</td>
									<td class="text-center" title="Trạng thái kiểm duyệt">
										<a href="{{ route('admin.binhluanbaiviet.kiemduyet', ['id' => $value->id]) }}">
											@if($value->kiemduyet == 1)
												<i class="fas fa-check-circle"></i>
											@else
												<i class="fas fa-times-circle text-danger"></i>
											@endif
										</a>
									</td>
									<td class="text-center" title="Trạng thái hiển thị">
										<a href="{{ route('admin.binhluanbaiviet.kichhoat', ['id' => $value->id]) }}">
											@if($value->kichhoat == 1)
												<i class="fas fa-eye"></i>
											@else
												<i class="fas fa-eye-slash text-danger"></i>
											@endif
										</a>
									</td>
									<td class="text-center">
										<a href="{{ route('admin.binhluanbaiviet.sua', ['id' => $value->id]) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
										<a href="{{ route('admin.binhluanbaiviet.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận của bài viết &quot;{{ $value->BaiViet->tieude }}&quot; không?');" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
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