<!DOCTYPE html>
<html lang="en">
<head>

<title>our application</title>
<meta name="description" content="">
<meta name="author" content="">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link  href="<?php echo base_url();?>/assets/static/css/bootstrap.min.css" rel="stylesheet">

<link  href="<?php echo base_url();?>/assets/static/css/animate.css" rel="stylesheet">
<link  href="<?php echo base_url();?>/assets/static/css/font-awesome.min.css" rel="stylesheet">
<link  href="<?php echo base_url();?>/assets/static/css/owl.theme.css" rel="stylesheet">
<link  href="<?php echo base_url();?>/assets/static/css/owl.carousel.css" rel="stylesheet">

<!-- Main css -->
<link href="<?php echo base_url();?>/assets/static/css/style.css" rel="stylesheet">
<!-- Main css -->


<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>

</head>
<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

<!-- =========================
     PRE LOADER       
============================== -->
<div class="preloader">

	<div class="sk-rotating-plane"></div>

</div>

<!-- =========================
     NAVIGATION LINKS     
============================== -->
<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">

		<!-- navbar header -->
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Jobs Web Applicatoin</a>
		</div>


		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#intro" class="smoothScroll">Register</a></li>
				<li><a href="#overview" class="smoothScroll">About us</a></li>
				<li><a href="#speakers" class="smoothScroll">Photos</a></li>
				<li><a href="#contact" class="smoothScroll">Contact</a></li>
				<li><a href="http://localhost/cv/index.php/User/login" class="smoothScroll">Sign in</a></li>
			</ul>

		</div>

	</div>
</div>

<!-- =========================
    INTRO SECTION   
============================== -->
<section id="intro" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				
				<h1 class="wow fadeInUp" data-wow-delay="1.6s">Our Application</h1>
				<a href="<?php echo base_url();?>index.php/User" class="btn btn-lg btn-danger smoothScroll wow fadeInUp" data-wow-delay="2.3s">REGISTER NOW</a>
			</div>


		</div>
	</div>
</section>

<!-- =========================
    OVERVIEW SECTION   
============================== -->
<section id="overview" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">
				<h3>Features of our application</h3>
				<p>1- Analyze CVs and match them with appropriate job</p>
				<p>2- Study user behavior via Facebook</p>
				<p>3- Find the right job</p>
				<p>4- Find the right employee</p>
			</div>		
			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.9s">
				<img src="<?php echo base_url();?>/assets/static/images/overview-img.jpg" class="img-responsive" alt="Overview">
			</div>

		</div>
	</div>
</section>

<section id="speakers" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12 wow bounceIn">
				<div class="section-title">
					<h2>Photos</h2>
					
				</div>
			</div>

			<div id="owl-speakers" class="owl-carousel">

				<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
					<div class="speakers-wrapper">
						<img src="<?php echo base_url();?>/assets/static/images/speakers-img1.jpg" class="img-responsive" alt="speakers">
							
					</div>
				</div>

				<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
					<div class="speakers-wrapper">
						<img src="<?php echo base_url();?>/assets/static/images/speakers-img2.jpg" class="img-responsive" alt="speakers">
							<div class="speakers-thumb">
								
							</div>
					</div>
				</div>

				<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
					<div class="speakers-wrapper">
						<img src="<?php echo base_url();?>/assets/static/images/speakers-img3.jpg" class="img-responsive" alt="speakers">
							<div class="speakers-thumb">
								
							</div>
					</div>
				</div>

				<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
					<div class="speakers-wrapper">
						<img src="<?php echo base_url();?>/assets/static/images/speakers-img4.jpg" class="img-responsive" alt="speakers">
							<div class="speakers-thumb">
								
							</div>
					</div>
				</div>

				<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
					<div class="speakers-wrapper">
						<img src="<?php echo base_url();?>/assets/static/images/speakers-img5.jpg" class="img-responsive" alt="speakers">
							<div class="speakers-thumb">
							</div>
					</div>
				</div>
				
			</div>

		</div>
	</div>
</section>
<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-offset-1 col-md-5 col-sm-6" data-wow-delay="0.6s">
				<div class="contact_des">
					
					
				</div>
			</div>

			<div class="wow fadeInUp col-md-5 col-sm-6" data-wow-delay="0.9s">
				<div class="contact_detail">
					<div class="section-title">
						<h2>Keep in touch</h2>
					</div>
					
					<p>Phone number : 756746363</p>
					<p>Mobile Phone : 83764534</p>
					<p>Address : Damascus-Syria</p>

				</div>
			</div>

		</div>
	</div>
</section>

<!-- Back top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- =========================
     SCRIPTS   
============================== -->

<script type="text/javascript" src="<?php echo base_url();?>/assets/static/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/static/js/jquery.parallax.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/static/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/static/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/static/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/static/js/custom.js"></script>

</body>
</html>