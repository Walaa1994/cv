<!doctype html>

<html class="no-js" lang="en-US">

<?php $this->load->view('includes/header');?>



<body>

	<div class="container-fluid">
		<div class="row">
			<div class="header-nav-wrapper">
				
				<div class="primary-nav-wrapper">
					<?php $this->load->view('includes/navigation');?>
					
				</div>
				
			</div>
		</div>
	</div>
	<div class="hero-bg">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
								<h1 class="wp1"><?php echo $pageTitle;?></h1>
							
							</div>
							<?php $this->load->view($subview); ?>
						</div>
						
					</div>
				</div>

	
	
	
	
	
	
</body>

</html>
