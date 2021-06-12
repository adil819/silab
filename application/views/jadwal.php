<?php $this->load->helper('url'); ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="<?php echo base_url()?>assets/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>SILAB</title>

	<!--
			Google Font
			============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">

	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/linearicons.css">
	<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/nice-select.css">
	<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<header id="header">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="index.php"><img src="<?php echo base_url().'assets/' ?>img/logo.png" alt="" title="" /></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="<?=base_url()?>index.php/home/index">Home</a></li>
						<li class="menu-active"><a href="<?=base_url()?>index.php/home/jadwal/">Jadwal</a></li>
						<li><a href="<?=base_url()?>index.php/home/courses/">Berita dan Pengumuman</a></li>
						<li><a href="">Inventaris</a>
						<li><a href="<?=base_url()?>index.php/home/rekrutmen/">Rekrutmen dan lain-lain</a>
							<!-- <ul>
								<li><a href="elements">Elements</a></li>
							</ul>
						</li>
						<li class="menu-has-children"><a href="">Blog</a>
							<ul>
								<li><a href="blog_home">Blog Home</a></li>
								<li><a href="blog_single">Blog Details</a></li>
							</ul>
						</li>
						<li><a href="contact">Contact</a></li>
					</ul> -->
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header>
	<!-- End Header Area -->

<?php $this->load->view($main_view); ?>

	<!-- ####################### Start Scroll to Top Area ####################### -->
	<div id="back-top">
		<a title="Go to Top" href="#"></a>
	</div>
	<!-- ####################### End Scroll to Top Area ####################### -->

	<script src="<?php echo base_url().'assets/' ?>js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="<?php echo base_url().'assets/' ?>js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="<?php echo base_url().'assets/' ?>js/easing.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/hoverIntent.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/superfish.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/jquery.ajaxchimp.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/owl-carousel-thumb.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/jquery.sticky.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/jquery.nice-select.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/parallax.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/waypoints.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/wow.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/jquery.counterup.min.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/mail-script.js"></script>
	<script src="<?php echo base_url().'assets/' ?>js/main.js"></script>
</body>

</html>
