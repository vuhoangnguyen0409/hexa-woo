<?php
get_header();
?>
<?php
if ( have_posts() ):
	while ( have_posts() ): the_post();?>
	<!--======= CONTENT =========-->
	<div class="inside-header">
		<div class="container">
			<?php the_title(); ?>
		</div>
	</div>
	<div class="content">
		<div class="container">
			<p class="single-img"><?php the_post_thumbnail() ?></p>
			<?php the_content();?>
		</div>
	</div>
<?php
	endwhile;//post
	endif;
?>
<?php get_footer(); ?>
