<?php
/**
 * Template Name: Home
 **/
get_header(); ?>
    <!--======= PORTFOLIO =========-->
    <div class="portfolio">
		<div class="home-intro">
        <div class="container">
          <?php if ( have_posts() ):
   while ( have_posts() ) :the_post();?>
  <?php the_content(); ?>
 <?php
endwhile;
endif;
wp_reset_query();  ?>
          <div class=""><a href="<?php echo home_url( "/" ); ?>porfolio/">Discover Us</a></div>
        </div>
      </div>
      <div class="container-fluid">
        <ul class="row items">

          <!-- Portfolio Item -->
			<?php $args = array(
			'posts_per_page'   => -1,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'post_type'        => 'item',
			'post_status'      => 'publish',
			'suppress_filters' => true
		);
			query_posts( $args );

if ( have_posts() ):
   while ( have_posts() ) :
        the_post();
		//alt
		$thumbnail_id = get_post_thumbnail_id( $post->ID );
		$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
			?>
			<?php $terms = get_the_terms($post->ID, 'item_category') ;
			//echo '<pre>'; print_r($terms); echo '</pre>';
				$cat = '';
			   if( !empty($terms) ) :
				foreach($terms as $row )
					$cat .= $row->slug.' ';
			   endif;
			   //echo $cat;
			   //var_dump($terms);
			   //die();
			   ?>
			<a href="<?php the_permalink();?>"></a>
	 <li class="item col-md-3 no-padding <?php echo $cat; ?>">
            <!-- Image -->
            <img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="">
            <!-- Hover Section -->
            <div class="hover-sec">
              <!-- Hover Link -->
              <a href="<?php the_permalink(); ?>" class="hover-in"> <span class="name"><?php the_post_thumbnail_caption(); ?></span>
              <hr>
              <span class="cat"><?php echo $alt; ?></span> </a> </div>
          </li>
	<?php
 endwhile;
endif;
wp_reset_query();  ?>
        </ul>
        <div class="row items ">
        	<?php
        		$args = array(
        			'post_type' => 'product',
        			'posts_per_page' => 12
        			);
        		$loop = new WP_Query( $args );
        		if ( $loop->have_posts() ) {
        			while ( $loop->have_posts() ) : $loop->the_post();

              $terms  = get_the_terms( $product->ID, 'product_cat' );
              //echo '<pre>'; print_r($terms); echo '</pre>';
              $cats = '';
              if( !empty($terms) ) :
         				foreach($terms as $row )
         					$cats .= $row->slug.' ';
     			    endif;
        				?> <div class="item col-md-3 no-padding <?php echo $cats; ?>"> <?php
                wc_get_template_part( 'content', 'product' );
                ?> </div></div> <?php
        			endwhile;
        		} else {
        			echo __( 'No products found' );
        		}
        		wp_reset_postdata();
        	?>
        </div><!--/.products-->
      </div>
    </div>
<?php get_footer(); ?>
