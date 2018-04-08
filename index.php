<?php get_header(); ?>

<?php query_posts( 'post_type=page&order=ASC' ); ?>

<?php if( have_posts() ):

	while ( have_posts() ): the_post(); ?>

		<?php the_title(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
