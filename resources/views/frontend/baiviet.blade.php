@extends('layouts.frontend')

@section('title',  $title)

@section('content')
	<nav aria-label="breadcrumb" class="w-100 float-left">
		<ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('public/Customer/img/banner/parallax.jpg') }}" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
			<li class="breadcrumb-item">
				<a class="text-nowrap" href="{{ route('frontend.home') }}"><i class="ci-home"></i>Trang chủ</a>
			</li>
			<li class="breadcrumb-item">
				<a class="text-nowrap" href="{{ route('frontend.baiviet') }}"><i class="ci-page"></i>Tin tức</a>
			</li>
		</ol>
	</nav>

	<div class="container pb-5 mb-2 mb-md-4">
		<div class="pt-3 mt-md-3">
			
			<div class="masonry-grid" data-columns="3">			
				@php
					function LayHinhDau($strNoiDung)
					{
						$first_img = '';
						ob_start();
						ob_end_clean();
						$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strNoiDung, $matches);
						if(empty($output))
							return asset('public\Customer\img\noimage.png ');
						else
							return str_replace('&amp;', '&', $matches[1][0]);
					}
				@endphp
				<div class="container pb-5 mb-2 mb-md-4">
					<div class="pt-3 mt-md-3">
						<div class="row">
						@foreach($baiviet as $value)
						<div class="col-lg-4 col-md-6 mb-4">
							<div class="main-content w-100 float-left blog-column"> 
								<div class="container">
									<div class="row">
										<div class="products-grid col-xl-12 col-lg-12 order-lg-2">
											<div class="row">
											<div class="ttblog col-lg-12 col-sm-12 col-xs-12 float-left">
												<div class="item">
													<div class="ttblog_image_holder">
														<a href="{{ route('frontend.baiviet.chitiet', ['tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
															<img src="{{ LayHinhDau($value->noidung) }}">							</a>
															<span class="blogicons">
																<a title="Nhấn vào để xem ảnh đầy đủ" href="{{ LayHinhDau($value->noidung) }}" data-lightbox="example-set" class="icon zoom"><i class="material-icons">search</i></a> 
															</span>
														</div>
													<div class="blog-content-wrap">
													<div class="blog_inner">
														<h4 class="blog-title"><a href="{{ route('frontend.baiviet.chitiet', ['tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
																{{$value->tieude}}</a>
														</h4>
														<div class="post-info d-flex justify-content-center">
														<span class="author d-flex"><i class="material-icons">perm_identity</i><span>{{ $value->NguoiDung->name }}</span></span>
														<span class="date d-flex"><i class="material-icons">date_range</i><span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y') }}</span></span>
														<span class="article d-flex"><i class="material-icons">folder</i><span>{{ $value->ChuDe->tenchude }}</span></span>
														</div>
														<div class="blog-desc">{{ $value->tomtat }} </div>
														<div class="read-more text-capitalize">
															<a title="Click to view Read More" class="readmore btn-primary btn btn"<a href="{{ route('frontend.baiviet.chitiet', ['tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
																Đọc thêm </a>
														</div>
													</div>
													</div>
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
					</div>
					
				</div>
				{{ $baiviet->links('vendor.pagination.frontend') }}
			</div>
		</div>
	</div>	
@endsection