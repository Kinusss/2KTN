@extends('layouts.frontend')

@section('title', 'Liên hệ')

@section('content')

	<nav aria-label="breadcrumb" class="w-100 float-left">
  <ol class="breadcrumb parallax justify-content-center" data-source-url="public/Customer/img/banner/parallax.jpg" style="background-image: url(&quot;public/Customer/img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('frontend.lienhe') }}">Liên hệ</a></li>
  </ol>
</nav>
    	<div class="main-content w-100 float-left"> 
		<div class="container">
			<div class="row">
		
		<!--Google map-->
<div id="map-container-google-1" class="z-depth-1-half map-container col-sm-12 mb-50" style="height: 500px">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.4039287068335!2d105.42805157429888!3d10.389457766213733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a72e9d35988f7%3A0x7dac16c79e25948!2zNjkgVHLhuqduIEjGsG5nIMSQ4bqhbywgUC4gTeG7uSBCw6xuaCwgVGjDoG5oIHBo4buRIExvbmcgWHV5w6puLCBBbiBHaWFuZyA4ODAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2sua!4v1698653118323!5m2!1sen!2sua" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>

</div>

<!--Google Maps-->
				<div class="contact-form-area col-sm-7">
				<div class="contact-form-inner">
					<h4 class="text-capitalize">Để lại lời nhắn</h4>
					<form id="contact-form" method="post">
                    <div class="row">
                        <div class="col-md-12">
							<label for="name" class="float-left">Họ<span class="required">*</span></label>
                            <input type="text" name="name" id="name" class="float-right" required>
                        </div>
                        <div class="col-md-12">
							<label for="last_name" class="float-left">Tên<span class="required">*</span></label>
                            <input type="text" name="last_name" id="last_name" class="float-right" required>
                        </div>
                        <div class="col-md-12">
 							<label for="email" class="float-left">Email<span class="required">*</span></label>
                            <input type="text" name="email" id="email" class="float-right" required>
                        </div>
                        <div class="col-md-12">
 							<label for="subject" class="float-left">Chủ đề<span class="required">*</span></label>
                            <input type="text" name="subject" id="subject" class="float-right" required>
                        </div>
						<div class="col-md-12">
							<label for="message" class="float-left">Nội dung tin nhắn</label>
							<textarea name="message" id="message" class="float-right"></textarea>
                        </div>
                    </div>
					<button class="btn btn-primary mt-4" type="submit">Gởi tin nhắn</button>
                    <p class="form-messege"></p>
                </form>
				</div>
				</div>
				<div class="contact-address col-sm-5">
				<div class="contact-inner float-left w-100">
                <div class="contact-information">
									<h4 class="text-capitalize">Liên hệ</h4>

                    <p>Đến cới chúng tôi bạn sẽ bước vào một thế giới chứa đựng sự tinh tế, thời thượng và sự sang trọng từ các sản phẩm mà chúng tôi mang đến cho bạn.</p>
                    <div class="contact-wrapper">
                        <div class="contact-list">
                           <i class="material-icons">place</i>
                            <span>Địa chỉ :  69 Trần Hưng Đạo, Long Xuyên, An Giang</span>
                        </div>
                        <div class="contact-list">
                           <i class="material-icons">call</i>
                            <span>+84 0123 456 888</span>
                        </div>
                        <div class="contact-list">
                          <i class="material-icons">email</i>
                            <span>demo.store@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="working-time">
                    <h5>Giờ làm việc</h5>
                    <div>
					<ul class="list-unstyled fs-sm text-muted mb-0">
								<li>Thứ 2 - Thứ 6: 08:00 AM - 05:00 PM</li>
								<li class="mb-0">Thứ 7 - Chủ Nhật: 10:00 AM - 21:00 PM</li>
							</ul>
					</div>
                </div>
				</div>
				</div>
			</div>
		</div>
		</div>
@endsection