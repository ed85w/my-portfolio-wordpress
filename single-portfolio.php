
<?php 
	global $i; 
	$projNo = $i+1;
?>

<!-- get featured image (background)-->
<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>


<!-- get featured image 2 (project picture) -->
<?php $projectPic = kdmfi_get_featured_image_src( 'featured-image-2', 'full' ); ?>

<!-- Alternating layouts for project portfolio -->
<?php if($i%2 == 0): ?>

  <div class="row">
    <!-- opaque background image without affecting content of div -->
    <div class="project" id="project<?php echo $projNo ?>" style="background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('<?php echo $background['0'];?>')">
      <div class=" col-sm-7 col-md-7 ">
        <a href="<?php echo get_post_meta( $post->ID, '_project_link_value_key', true ) ?>" target="_blank">
          <img src="<?php echo $projectPic; ?>" class="portfolio-img">
        </a>
      </div>  
      <div class="col-sm-5 col-md-5 project-text">
        <a href="<?php echo get_post_meta( $post->ID, '_project_link_value_key', true ) ?>" target="_blank"><h2><?php the_title(); ?></h2></a>
        <?php the_content(); ?>
      </div>        
    </div>
  </div>

<?php else: ?>

  <div class="row">
    <!-- opaque background image without affecting content of div -->
    <div class="project" id="project<?php echo $projNo ?>" style="background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('<?php echo $background['0'];?>')">
      <div class="col-sm-7 col-md-7 col-md-push-5">
        <a href="<?php echo get_post_meta( $post->ID, '_project_link_value_key', true ) ?>" target="_blank">
          <img src="<?php echo $projectPic; ?>" class="portfolio-img">
        </a>
      </div> 
      <div class="col-sm-5 col-md-5 col-md-pull-7 project-text">        
        <a href="<?php echo get_post_meta( $post->ID, '_project_link_value_key', true ) ?>" target="_blank"><h2><?php the_title(); ?></h2></a>
        <?php the_content(); ?>
      </div>
    </div>
  </div>

<?php endif; ?>