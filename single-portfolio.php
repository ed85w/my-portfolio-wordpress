
<?php 
	global $i; 
	$projNo = $i+1;
?>
		<div class="project" id="project<?php echo $projNo ?>">
        	<div class=" col-sm-7 col-md-7 ">
          		<a href="https://ed85w.github.io/Stream1Project/" target="_blank">
            		<img src="img/project1.png" class="portfolio-img">
          		</a>
    		</div>  
        	<div class="col-sm-5 col-md-5 project-text">
          		<!-- <a href="https://ed85w.github.io/Stream1Project/" target="_blank"> -->
          			<?php echo $post->ID ?>
          			<?php echo get_post_meta( $post->ID, '_project_link_value_key', true ) ?>
          			<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
          			<h2><?php the_title(); ?></h2>

          			
          			<h1><?php echo $i ?></h1>
      			<!-- </a> -->
          		<h4>A website for a fictional cover band. Created in Angular.js.<br>Hosted on GitHub</h4>
        	</div>        
      	</div>

