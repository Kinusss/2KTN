@extends('layouts.frontend')

@section('title', $baiviet->tieude)

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
	<div class="main-content w-100 float-left blog-detail"> 
		<div class="container">
			<div class="row">
				<div class="products-grid col-xl-8 col-lg-8 order-lg-2 blog-details">
					<div class="row">
					<div class="ttblog col-sm-12 col-xs-12 float-left">
	<div class="item">
		
		<div class="blog-content-wrap">
		<div class="blog_inner">
			<h4 class="blog-title my-4" style="text-transform: uppercase;">{{ $baiviet->tieude }}</h4>

			<div class="post-info d-flex">
			<span class="author d-flex"><i class="material-icons">perm_identity</i><span>{{ $baiviet->NguoiDung->name }}</span></span>
			<span class="date d-flex"><i class='material-icons'>date_range</i><span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $baiviet->created_at)->format('d/m/Y') }}</span></span>
			<span class="article d-flex"><i class='material-icons'>folder</i><span>{{ $baiviet->ChuDe->tenchude }}</span></span>
			</div>
			<p style="text-align:justify" class="fw-bold">{{ $baiviet->tomtat }}</p>
			<div class="blog-desc">{!! $baiviet->noidung !!}</p>
				<div class="d-flex flex-wrap justify-content-between pt-2 pb-4 mb-1">
				<div class="mt-3 me-3">
				<a class="btn-tag mb-2" href="#">#{{ $baiviet->ChuDe->tenchude_slug }}</a>
				</div>
				<div class="mt-3">
				<span class="d-inline-block align-middle text-muted fs-sm me-3 mt-1 mb-2">Chia sẻ:</span>
				<a class="btn-social bs-facebook me-2 mb-2" href="#facebook"><i class="ci-facebook"></i></a>
				<a class="btn-social bs-twitter me-2 mb-2" href="#twitter"><i class="ci-twitter"></i></a>
				<a class="btn-social bs-pinterest me-2 mb-2" href="#pinterest"><i class="ci-pinterest"></i></a>
				</div>			
			</div>
			
		</div>
		</div>
	</div>
	</div>
	</div>
			<div class="post-comment-area pt-90 scroll-area col-sm-12 col-xs-12">
				<div class="post-comment-area pt-90 scroll-area col-sm-12 col-xs-12">
						 <h4 class="post-title">{{ $baiviet->BinhLuanBaiViet->count() }} Comment{{ $baiviet->BinhLuanBaiViet->count() != 1 ? 's' : '' }}</h4>
							@foreach($baiviet->BinhLuanBaiViet as $value)
								<div class="post-comment-container">
									<div class="single-post-comment float-left w-100">
										<div class="single-post-image float-left">
											<img class="rounded-circle" src="{{ asset('public/Customer/img/author.jpg') }}" width="50" />
										</div>
										<div class="single-post-content">
											<div class="single-post-info float-left">
												<a href="#">{{ $value->NguoiDung->name }}</a>
												<span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y') }}</span>
												<p>{{ $value->noidungbinhluan }}</p>
											</div>
											<button type="button" class="float-right btn-primary btn">reply</button>
										</div>
									</div>
								</div>
							@endforeach
				</div>
							
			</div>				
							
						<form action="#" class="post-comment-form col-sm-12">
                            <h4 class="post-title">Để lại bình luận</h4>
							                           <label for="post-text">Bình luận</label>
                            <textarea name="post-comment" id="post-text" cols="30" rows="10" class="w-100"></textarea>
                            @guest
								<div class="invalid-feedback">Bạn phải đăng nhập để chia sẻ bình luận.</div>
							@else
								<div class="invalid-feedback">Nội dung bình luận không được bỏ trống.</div>
							@endguest
                           
							<button type="submit" class="default-btn btn-primary btn">Đăng bình luận</button>
                        </form>
					 </div>
				</div>
				<div class="sidebar col-xl-4 col-lg-4  order-lg-1">
    <div class="sidebar-blog left-sidebar w-100 float-left">
        <div class="title">
            <a data-toggle="collapse" href="#sidebar-blog" aria-expanded="false" aria-controls="sidebar-blog" class="d-lg-none block-toggler">Recent Posts</a>
        </div>
        <h2 class="h4 text-center pb-4">Bài viết cùng chuyên mục</h2>
        <div id="sidebar-blog" class="">
            <div class="ttblog w-100 float-left">
			@php
						function layhinhdau($strNoiDung)
						{
							$first_img = '';
							ob_start();
							ob_end_clean();
							$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strNoiDung, $matches);
							if(empty($output))
								return asset('public\Customer\img\noimage.png');
							else
								return str_replace('&amp;', '&', $matches[1][0]);
						}
					@endphp
                <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 20},&quot;900&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 30}}}">
                    @foreach($baivietcungchuyemuc as $value)
                        <article class="blog-entry">
                            <a class="blog-entry-thumb mb-3" href="{{ route('frontend.baiviet.chitiet', ['tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
                                <img src="{{ layhinhdau($value->noidung) }}" alt="{{ $value->tieude }}" class="img-fluid">
                            </a>
                           <div class="blog-entry-meta">
							<div class="d-flex align-items-center fs-sm mb-2">
								<a class="blog-entry-meta-link" href="#user">Bởi:{{ $value->NguoiDung->name }}</a>&nbsp;
								<span class="blog-entry-meta-divider"></span>
							
								<a class="blog-entry-meta-link" href="#date">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y') }}</a>
							</div>
							<h3 class="h6 blog-entry-title mb-3">
								<a href="{{ route('frontend.baiviet.chitiet', ['tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
									{{ $value->tieude }}
								</a>
							</h3>
						</div>

                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

			</div>
		</div>
	</div>		
@endsection