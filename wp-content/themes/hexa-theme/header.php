<?php
    $url_post = admin_url('admin-ajax.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>
<?php
          global $page, $paged;
          wp_title( '|', true, 'right' );
          // Add the blog name.
          bloginfo( 'name' );
          // Add the blog description for the home/front page.
           $site_description = get_bloginfo( 'description', 'display' );
           if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";
          ?>
</title>
<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<?php wp_head();?>
<script>
    $(document).ready(function(){
        $("#tim_kiem").keyup(function(){
           //alert($(this).val());
            var tikkiem = $(this).val();
            $.ajax({
                type : 'POST',
                data : {'action' : 'timkiem', 'tikkiem' : tikkiem},
                url : "<?=$url_post;?>",
                success : function (resp){
                    //alert(resp);
                    $(".search-result").html(resp);
                }
            });
        });
    });
</script>
</head>
<body  <?php body_class(); ?>>
	<!--======= WRAP =========-->
<div id="wrap">

  <!--======= HEADER =========-->
  <header>
      <nav>

      <!--======= Close nav =========-->
        <div class="nav-close">
          	<a href="#"><i class="ion-ios-close-outline"></i></a>
          </div>


        <div class="navgation">
        <a href="#."><i class="fa fa-bars" aria-hidden="true"></i></a>
          <div class="open-navigation">
            <div class="navi-in animated flipInY">
              <!--======= LOGO =========-->
<?php

// vars
$logo = get_field('logo', 'option');	//var_dump($logo); die();
if( $logo ): ?>
		 <a href="<?php echo home_url();?>" class="logo"><img src="<?php echo $logo['logo-img']['url']; ?>" alt="<?php echo $logo['logo-txt']; ?>" />
		 <span><?php echo $logo['logo-txt']; ?></span>
         <hr>
<?php endif; ?>
              </a>
              <!--======= NAV LINKS =========-->
			  <?php wp_nav_menu( array(
				 'theme_location' => 'navgation', // tên location cần hiển thị
				 'container' => 'ul', // thẻ nav chua menu
				 'container_class' => 'main-nav', //main-nav: class của the nav
				 'menu_class' => 'nav-links' // clearifx: class của ul bên trong
			) ); ?>
              <!--<ul class="nav-links">
                <li><a href="portfolio.html">PORTFOLIO</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li class="active"><a href="services.html">SERVICES</a></li>
                <li><a href="blog.html">BLOG</a></li>
                <li><a href="contact.html">CONTACT</a></li>

                <!--======= Drop Down =========-->
                <!--<li class="drop-menu"> <a href="#." class="title collapsed" data-toggle="collapse" data-target="#drop-down"> DROPDOWN </a>
                  <div class="collapse" id="drop-down">
                    <div class="well">
                      <ul>
                        <li><a href="services.html">SERVICES</a></li>
                        <li><a href="blog.html">BLOG</a></li>
                        <li><a href="contact.html">CONTACT</a></li>
                      </ul>
                    </div>
                  </div>
                </li>-->
              </ul>-->
              <!--======= Address =========-->
              <p class="ads">123 Abc Town, San Francisco</p>
            </div>
          </div>
        </div>

        <!--======= NAV FILTERS =========-->
        <div class="navgation"> <a href="#."><i class="fa fa-th-large" aria-hidden="true"></i></a>
          <div class="open-navigation">
            <div class="navi-in animated flipInY">
              <!--======= LOGO =========-->
              <a href="index.html" class="logo"> <img src="<?php echo $logo['logo-img']['url']; ?>" alt="<?php echo $logo['logo-txt']; ?>" /> <span>PORTFOLIO</span>
              <hr>
              </a>
              <!--======= NAV LINKS =========-->
              <ul class="nav-links filter">
                <li><a class="active" href="#." data-filter="*">ALL</a></li>
                <li><a href="#" data-filter=".brand">BRANDING</a></li>
                <li><a href="#" data-filter=".web">WEB DESIGN</a></li>
                <li><a href="#" data-filter=".photo">PHOTOGRAPHY</a></li>
                <li><a href="#" data-filter=".product">PRODUCT DESIGN</a></li>
              </ul>
              <!--======= Address =========-->
              <p class="ads">123 Abc Town, San Francisco</p>
            </div>
          </div>
        </div>

        <!--======= SOCIAL ICONS =========-->
        <div class="navgation share"> <a href="#."><i class="fa fa-heart" aria-hidden="true"></i></a>
          <div class="open-navigation">
            <div class="navi-in animated flipInY">
              <ul class="social_icons">
			  <?php
// vars
$links = get_field('social-links', 'option');
if( $links ): ?>
                <li class="facebook"><a href="<?php echo $links['h-fb']; ?>"><i class="fa fa-facebook"></i> </a></li>
                <li class="twitter"><a href="<?php echo $links['h-twitter']; ?>"><i class="fa fa-twitter"></i> </a></li>
                <li class="instagram"><a href="<?php echo $links['h-instagram']; ?>"><i class="fa fa-instagram"></i> </a></li>
                <li class="googleplus"><a href="<?php echo $links['h-gg']; ?>"><i class="fa fa-google-plus"></i> </a></li>
                <li class="linkedin"><a href="<?php echo $links['h-in']; ?>"><i class="fa fa-linkedin"></i> </a></li>
<?php endif; ?>
              </ul>
            </div>
          </div>
        </div>

        <!--======= SEARCH ICON =========-->
        <a href="" class="open-search header-open-search"><i class="fa fa-search" aria-hidden="true"></i></a> </nav>
    </header>
