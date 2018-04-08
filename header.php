<!DOCTYPE html>
<html <?php language_attributes( ); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset'); ?>">
	<title>Ed Walker Full Stack Web Developer</title> 
	<meta name="description" content="<?php bloginfo('description'); ?>"> <!-- desciption is tagline -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target="#main-nav" data-offset="0">
<!-- <body> -->
  

<!-- NAVBAR -->
	<div class="container-fluid">
		<!-- <div class="row"> -->
			<!-- <div class="col-xs-12"> -->
				<nav class=class="navbar navbar-fixed-top" id="main-nav">
			  		<div div class="container-fluid text-center" id="navbar-container">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    	<div class="navbar-header">
				      		<button button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false">
				        		<!-- <span class="sr-only">Toggle navigation</span> -->
				        		<span class="icon-bar"></span>
				        		<span class="icon-bar"></span>
				        		<span class="icon-bar"></span>
				      		</button>
				    	</div>
						<div class="collapse navbar-collapse" id="navbar1">
							<?php 
							// menu items - set in dashboard
							wp_nav_menu(array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'nav navbar-nav',
								// add walker dropdown menu
								'walker' => new Walker_Nav_Primary()
								)
							);

							?>
						</div>
				  	</div><!-- /.container-fluid -->
				</nav>
			<!-- </div> -->
		<!-- </div> -->
