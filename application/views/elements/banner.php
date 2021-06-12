	<section class="home-banner-area relative">
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-center">
				<div class="banner-content col-lg-8 col-md-12">
					<h1 class="wow fadeIn" data-wow-duration="4s">Sistem Informasi Laboratorium <br> USU</h1>
					<p class="text-white">
					<?php if(NULL !== $this->session->userdata('logged_in')){ 
						echo 'Selamat Datang ' .$this->session->userdata('name');
						} ?>
					</p>

<!-- <div class="input-wrap">
	<form action="<?=base_url()?>index.php/home/telusur" class="form-box d-flex justify-content-between" method="GET">
		<input type="text" placeholder="Cari Praktikan" class="form-control" name="key">
		<button type="submit" class="btn search-btn">Cari</button>
	</form>
</div> -->

					
					<!-- <h4 class="text-white">Top courses</h4>

					<div class="courses pt-20">
						<a href="#" data-wow-duration="1s" data-wow-delay=".3s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Ruby
							on Rails</a>
						<a href="#" data-wow-duration="1s" data-wow-delay=".6s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Python</a>
						<a href="#" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Marketing</a>
						<a href="#" data-wow-duration="1s" data-wow-delay="1.2s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">UI/UX
							Design
						</a>
						<a href="#" data-wow-duration="1s" data-wow-delay="1.5s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Android</a>
						<a href="#" data-wow-duration="1s" data-wow-delay="1.8s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Data
							Science
						</a>
						<a href="#" data-wow-duration="1s" data-wow-delay="2.1s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Cryptocurrency</a>
					</div> -->
				</div>
			</div>
		</div>
		<div class="rocket-img">
			<img src="<?php echo base_url()?>assets/img/rocket.png" alt="">
		</div>
	</section>
	