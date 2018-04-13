<!--======= SIDE BAR =========-->
<?php setPostViews(get_the_ID()); ?>
<div class="col-sm-3">
  <div class="side-bar">
    <!--======= CATEGORIES =========-->
    <div class="cate">
      <h5>Categories</h5>
      <hr>
      <ul>
        <?php wp_list_categories('orderby=name&title_li=&show_count=1'); ?>
      </ul>
    </div>

    <!--======= PAPULAR POST =========-->
    <div class="papu-post margin-t-40">
      <h5>Popular Post</h5>
      <hr>
      <ul>
      <?php
        $args = array(
         'posts_per_page'  => 4,
         'orderby'      => 'meta_value_num',
         'meta_key'     => 'post_views_count',
         'order'        => 'DESC',
         'post_type' => 'post',
         'post_status'  => 'publish'
        );
        $myposts = new WP_Query( $args );
if ($myposts->have_posts()) {
  while ($myposts->have_posts()) {
    $myposts->the_post(); ?>
    <li class="media">
      <div class="media-left"> <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail() ?></a> </div>
      <div class="media-body"> <a class="media-heading" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php the_date(); ?></span>
      </div>
    </li>
    <?php
  }
}
      ?>
    </ul>
    </div>

    <!--======= TAGS =========-->
    <div class="tags margin-t-40">
      <h5>TAGS</h5>
      <hr>
      <?php
      $terms = get_terms( 'item_category' );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
echo '<ul>';
foreach ( $terms as $term ) {
 echo '<li style="margin: 3px;"><a href="#.">' . $term->name . ' </a></li>';

}
echo '</ul>';
}
      ?>
    </div>
  </div>
</div>
