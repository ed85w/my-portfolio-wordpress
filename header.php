<!DOCTYPE html>
<html <?php language_attributes( ); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset'); ?>">
	<title>Ed Walker Full Stack Web Developer</title> 
	<meta name="description" content="<?php bloginfo('description'); ?>"> <!-- desciption is tagline -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target="#main-nav" data-offset="75">
  
  <!-- navbar -->

  <div class="container-fluid" >
    <nav class="navbar navbar-fixed-top" id=main-nav>
      <div class="container-fluid text-center" id="navbar-container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar1"> 
          <ul class="nav navbar-nav">
              <li><a href="#home">HOME</a></li>
              <li><a href="#about">ABOUT ME</a></li>
              <li><a href="#portfolio">PORTFOLIO</a></li>              
              <li><a href="#contact">CONTACT</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>