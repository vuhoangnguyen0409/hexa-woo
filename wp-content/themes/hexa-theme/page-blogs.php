<?php
get_header();
?>
<!--======= CONTENT =========-->
<div class="content">
	<div class="container">
		<!--======= BLOG =========-->
		<div class="row blog">
			<div class="col-sm-9">
				<!--======= POST 1 =========-->
				<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	 $args = array(
		 'orderby' => 'date',
		 'post_type'        => 'post',
		 'post_status'      => 'publish',
		 'posts_per_page'   => 3,
		 'paged'=>$paged
		  );
	  query_posts($args);
	 ?>
	<?php if ( have_posts() ):
   while ( have_posts() ) :the_post();
  $thumbnail_id = get_post_thumbnail_id( $post->ID );
  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>

	 <!--======= POST 1 =========-->
          <article>
            <!--======= IMAGE =========-->
            <img src="<?php the_post_thumbnail_url( $size ); ?> " class="img-responsive" alt="<?php echo $alt; ?>">
            <div class="blog-info">
              <div class="post-tittle">
                <div class="date-post">
                  <?php the_date('d', '<h4>', '</h4>'); ?>
                  <span><?php echo get_the_date('M'); ?></span>
 </div>
                <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                <ul>
                  <li> <?php the_author(); ?> </li>
                  <li> <i class="fa fa-heart-o"></i> LIKES </li>
                  <li> <i class="fa fa-comments-o"></i> COMMENT </li>
                </ul>
              </div>
              <p><?php the_excerpt(); ?></p>
              <a href="<?php the_permalink(); ?>" class="btn btn-1">read more</a> </div>
          </article>
<?php
endwhile;
endif;
wpex_pagination();
			?>
			</div>
			<?php include('blog-side.php');?>
		</div>

		<!--======= RIGHTS =========-->

	</div>
</div>
<?php get_footer();?>
