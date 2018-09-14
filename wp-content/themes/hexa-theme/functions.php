<?php
define( 'TEMPLATE_DIRECTORY_URI', get_template_directory_uri() );
//css
function add_style_css() {
	wp_register_style( 'wpb-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' ); //cdn
	wp_enqueue_style( 'wpb-fa' );
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' ); //inside page
	wp_enqueue_style( 'bootstrap' );
	wp_register_style( 'main', get_template_directory_uri() . '/css/main.css' ); //inside page
	wp_enqueue_style( 'main' );
	wp_register_style( 'style', get_template_directory_uri() . '/css/style.css' ); //inside page
	wp_enqueue_style( 'style' );
	wp_register_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' ); //inside page
	wp_enqueue_style( 'responsive' );
	wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.css' ); //inside page
	wp_enqueue_style( 'animate' );
	wp_register_style( 'drop-down-menu', get_template_directory_uri() . '/css/drop-down-menu.css' ); //inside page
	wp_enqueue_style( 'drop-down-menu' );
}
add_action( 'wp_enqueue_scripts', 'add_style_css' );
//js
function add_style_js() {
	wp_register_script( 'jquery01', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', 'jquery', TRUE );
	wp_enqueue_script( 'jquery01' );
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', TRUE );
	wp_enqueue_script( 'bootstrap-js' );
	wp_register_script( 'waypoints1', get_template_directory_uri() . '/js/waypoints.min.js', 'jquery', TRUE );
	wp_enqueue_script( 'waypoints1' );
	wp_register_script( 'counter', get_template_directory_uri() . '/js/counter.js', 'jquery', TRUE );
	wp_enqueue_script( 'counter' );
	wp_register_script( 'carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', TRUE );
	wp_enqueue_script( 'carousel' );
	wp_register_script( 'isotope1', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', TRUE );
	wp_enqueue_script( 'isotope1' );
	wp_register_script( 'search-pop-up', get_template_directory_uri() . '/js/search-pop-up.js', 'jquery', TRUE );
	wp_enqueue_script( 'search-pop-up' );
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', 'jquery', TRUE );
	wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'add_style_js' );
//menu
 register_nav_menus(
        array(
'navgation' => 'main-nav',
        )
);

// Init
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
//feature img
add_theme_support( 'post-thumbnails' );
add_theme_support( 'category-thumbnails' );
add_theme_support( 'html5' );
//hide admin bar
show_admin_bar( false );
//css wp admin
function wpdocs_theme_add_editor_styles() {
	add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );
//logo admin
function login_logo() {
	echo '<style type="text/css">
    .login h1 a {
          background-image: url(' . get_template_directory_uri() . '/images/img-1.jpg);
          background-size:100% 100%;
          height: 200px;
		  width: 200px;
        }
    </style>';
}
add_action( 'login_head', 'login_logo' );

/************ Theme Options************/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

}
//Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
 function wpex_pagination() {
 global $wp_query;
 $prev_arrow = is_rtl() ? '<img height="20px" src="'.get_template_directory_uri().'/img/common/back.gif" alt="back" />' : '<img height="20px" src="'.get_template_directory_uri().'/images/back.png" alt="back" />';
 $next_arrow = is_rtl() ? '<img height="20px" src="'.get_template_directory_uri().'/img/common/next.gif" alt="next" />' : '<img height="20px" src="'.get_template_directory_uri().'/images/next.png" alt="next" />';
$big = 999999999; // need an unlikely integer
$pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
  'prev_text'  => $prev_arrow,
  'next_text'  =>$next_arrow
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<ol class="pager clearfix">';
        foreach ( $pages as $page ) {
                echo "<li>$page</li>";
        }
       echo '</ol>';
        }
 }
}
// popular post
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// search-form
add_action('wp_ajax_timkiem', 'timkiem');
add_action('wp_ajax_nopriv_timkiem', 'timkiem');
function timkiem() {
    global $wpdb;
    $data = array();
    $response = '';
    if(isset($_POST['tikkiem']) && $_POST['tikkiem']){
        $args = array(
            'post_type' => array( 'post','item'  ),
            's' => trim($_POST['tikkiem']),
            'posts_per_page' => -1
        );
    }else{
        $args = array(  'post_type' => post, 'posts_per_page' => -1);
    }
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
        $response .= '<li><a href="'. get_the_permalink($post->ID).'"><span class="price">'.get_the_title($post->ID).'</span></a></li>';
    endforeach;
    echo($response);
    die();
}
//remove WooCommerce form input
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_postcode']);
     unset($fields['billing']['billing_state']);
     unset($fields['billing']['billing_address_2']);
     return $fields;
}

?>
