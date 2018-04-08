<?php 

/*
	Template Name: Landing Page
*/


get_header(); ?>

<?php if( have_posts() ):

	while ( have_posts() ): the_post(); ?>

	<!-- get featured image url -->
	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>



  <div class="container-fluid">
  	<!-- use featured image as background image -->
	<div class="col-md-12 text-center" id="home" style="background-image:  url('<?php echo $backgroundImg[0]; ?>')">
      <h1><?php the_content(); ?></h1>
      <h1 id="blur-line">FULL STACK WEB DEVELOPER</h1>
    </div>
  </div>

  	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
