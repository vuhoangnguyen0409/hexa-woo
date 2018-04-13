<?php
/**
 * The template for displaying search results pages
 */
get_header();
?>
<?php
if ( have_posts() ):
	while ( have_posts() ): the_post();
?>
<!--======= CONTENT =========-->
<div class="container">
	<?php
		get_search_form();
</div>
<?php get_footer(); ?>
