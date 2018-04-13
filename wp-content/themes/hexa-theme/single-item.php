<?php get_header(); ?>
<!--======= PORTFOLIO SINGLE =========-->
<div class="portfolio-single">
	<div class="content">
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<ul>
			<!--======= IMAGE =========-->
			<li class="col-md-8 no-padding"> <img class="img-responsive showImg" src="<?php the_post_thumbnail_url( $size ); ?> " alt=""> </li>

			<!--======= INFO =========-->
			<li class="col-md-4 no-padding">
				<div class="project-info">
					<h5><?php the_title(); ?></h5>
					<p><?php the_content(); ?></p>
					<br>
					<br>
					<p><?php the_excerpt(); ?></p>
					<div class="item-more">
						<?php
							$images = get_field('item-gallery');
							$size = 'full'; // (thumbnail, medium, large, full or custom size)
							if( $images ): ?>
							    <ul>
							        <?php foreach( $images as $image ): ?>
							            <li><a href="#" class="more-img">
							            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
							            </a></li>
							        <?php endforeach; ?>
							    </ul>
							<?php endif; ?>
					</div>
					<a href="#" class="btn btn-1 btn-more">More</a> </div>
			</li>
		</ul>
		<?php endwhile; wp_reset_postdata();?>
		<?php endif; ?>
				<!-- related item -->
          <?php $terms = get_the_terms(get_the_ID(), 'item_category') ;
       if( !empty($terms) ) :
          $term_id = $terms[0]->term_id;
       endif;
	   $posts_array = get_posts(
			array(
				'posts_per_page' => 3,
				'post_type' => 'item',
				'post__not_in'  => array(get_the_id()),
				'tax_query' => array(
					array(
						'taxonomy' => 'item_category',
						'field' => 'term_id',
						'terms' => $term_id,

					)
				)
			)
		);
       ?>
		<div class="row">
			<!-- end custom related loop, isa -->
			<?php
			 foreach ( $posts_array as $post ) : setup_postdata( $post );?>
				<div class="col-sm-4"> <a href="<?php the_permalink(); ?>"><img class="img-responsive" src=" <?php the_post_thumbnail_url(); ?> "> </a></div>
			 <?php endforeach; ?>
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>
