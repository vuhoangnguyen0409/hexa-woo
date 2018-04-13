<?php
/*
Template Name: Archives
*/
get_header(); ?>

  <!--======= CONTENT =========-->
  <div class="content">
    <div class="container"> 
      
      <!--======= BLOG =========-->
      <div class="row blog">
        <div class="col-sm-9"> 
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
                  <span>JUN</span><?php the_date('m', '<span>', '</span>'); ?> </div>
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
wp_reset_query();  ?>


         
        </div>
        
        <!--======= SIDE BAR =========-->
        <div class="col-sm-3">
          <div class="side-bar"> 
            <!--======= CATEGORIES =========-->
            <div class="cate">
              <h5>Categories</h5>
              <hr>
              <ul>
                <li><a href="#.">Photography <span>(25)</span></a></li>
                <li><a href="#.">Design <span>(12)</span></a></li>
                <li><a href="#.">music <span>(18)</span></a></li>
                <li><a href="#.">fashion <span>(35)</span></a></li>
                <li><a href="#.">photoshop <span>(24)</span></a></li>
                <li><a href="#.">articles <span>(15)</span></a></li>
                <li><a href="#.">video <span>(05)</span></a></li>
              </ul>
            </div>
            
            <!--======= PAPULAR POST =========-->
            <div class="papu-post margin-t-40">
              <h5>Popular Post</h5>
              <hr>
              <ul>
                <li class="media">
                  <div class="media-left"> <a href="#"> <img class="media-object" src="images\img-1.jpg" alt=""></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#.">Lorem ipsum dolor sit amet, consectetur </a> <span>Feb 27, 2017</span> </div>
                </li>
                <li class="media">
                  <div class="media-left"> <a href="#"> <img class="media-object" src="images\img-2.jpg" alt=""></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#.">Lorem ipsum dolor sit amet, consectetur </a> <span>April 12, 2017</span> </div>
                </li>
                <li class="media">
                  <div class="media-left"> <a href="#"> <img class="media-object" src="images\img-3.jpg" alt=""></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#.">Lorem ipsum dolor sit amet, consectetur </a> <span>May 19, 2017</span> </div>
                </li>
                <li class="media">
                  <div class="media-left"> <a href="#"> <img class="media-object" src="images\img-4.jpg" alt=""></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#.">Lorem ipsum dolor sit amet, consectetur </a> <span>Jun 05, 207</span> </div>
                </li>
              </ul>
            </div>
            
            <!--======= ARCHIVES =========-->
            <div class="cate margin-t-40">
              <h5>Archives</h5>
              <hr>
              <ul>
                <li><a href="#.">FEBRUARY 2017 <span>(10)</span></a></li>
                <li><a href="#.">March  2017 <span>(13)</span></a></li>
                <li><a href="#.">APRIL  2017 <span>(12)</span></a></li>
                <li><a href="#.">MAY  2017 <span>(05)</span></a></li>
              </ul>
            </div>
            
            <!--======= TAGS =========-->
            <div class="tags margin-t-40">
              <h5>TAGS</h5>
              <hr>
              <ul>
                <li><a href="#.">Amazing </a></li>
                <li><a href="#.">Envato </a></li>
                <li><a href="#.">Themes </a></li>
                <li><a href="#.">Clean </a></li>
                <li><a href="#.">Responsiveness </a></li>
                <li><a href="#.">SEO </a></li>
                <li><a href="#.">Mobile </a></li>
                <li><a href="#.">IOS </a></li>
                <li><a href="#.">Flat </a></li>
                <li><a href="#.">Design </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <!--======= RIGHTS =========-->
     
    </div>
  </div>
<?php get_footer(); ?>