<?php
/**
 * Template Name: About
 **/
get_header();
?>
<?php
if ( have_posts() ):
	while ( have_posts() ): the_post();
?>
<!--======= CONTENT =========-->
<div class="inside-header">
	<div class="container">
		<?php the_title(); ?>
	</div>
</div>
<div class="content">

	<div class="container">
		<div class="desc">
			<?php the_content(); ?> </div>
		<!--======= WHO WE ARE =========-->
		<div class="who-we">
			<ul>
				<li class="col-md-6 wo-we">
					<!--======= SLIDE 1 =========-->
					<div class="who-slide">
						<?php
$images = get_field('about-slider');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if( $images ): ?>
						<?php foreach( $images as $image ): ?>
						<div class="slider"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
						</div>
						<?php endforeach; ?>
						<?php endif; ?>

					</div>
				</li>

				<!--======= SKILLS =========-->
				<li class="col-md-6">
					<div class="skills">
						<!--======= SKILLS BAR =========-->
						<div class="progress-bars">
							<?php
							// check if the repeater field has rows of data
							if ( have_rows( 'about-percent' ) ):
								// loop through the rows of data
								while ( have_rows( 'about-percent' ) ): the_row();
							?>
							<!--======= BRANDING =========-->
							<p>BRANDING </p>
							<div class="progress" data-percent="<?php the_sub_field('branding');?>">
								<div class="progress-bar">
									<span class="progress-bar-tooltip">
										<?php the_sub_field('branding');?>
									</span>
								</div>
							</div>

							<!--======= DESIGN =========-->
							<p>DESIGN</p>
							<div class="progress" data-percent="<?php the_sub_field('design');?>">
								<div class="progress-bar progress-bar-primary">
									<span class="progress-bar-tooltip">
										<?php the_sub_field('design');?>
									</span>
								</div>
							</div>

							<!--======= DEVELOPING =========-->
							<p>DEVELOPING</p>
							<div class="progress" data-percent="<?php the_sub_field('developing');?>">
								<div class="progress-bar progress-bar-primary">
									<span class="progress-bar-tooltip">
										<?php the_sub_field('developing');?>
									</span>
								</div>
							</div>

							<!--======= MARKETING =========-->
							<p>MARKETING</p>
							<div class="progress" data-percent="<?php the_sub_field('marketing');?>">
								<div class="progress-bar progress-bar-primary">
									<span class="progress-bar-tooltip">
										<?php the_sub_field('marketing');?>
									</span>
								</div>
							</div>
							<?php
							endwhile;
							else :
								// no rows found
								endif;
							?>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<!--======= COUNERS =========-->
		<div id="counters">
			<ul>
				<?php
				// check if the repeater field has rows of data
				if ( have_rows( 'about-number' ) ):
					// loop through the rows of data
					while ( have_rows( 'about-number' ) ): the_row();
				?>
				<!--======= HAPPY CLIENTS =========-->
				<li class="col-sm-3"> <i class="fa fa-briefcase"></i>
					<span class="count1">
						<?php the_sub_field('projects');?>
					</span>
					<h6>PROJECTS</h6>
				</li>

				<!--======= PROJECTS FINISHED =========-->
				<li class="col-sm-3"> <i class="fa fa-clock-o"></i>
					<span class="count2">
						<?php the_sub_field('hours');?>
					</span>
					<h6>HOURS WORK</h6>
				</li>

				<!--======= EXPRIENCE =========-->
				<li class="col-sm-3"> <i class="fa fa-send"></i>
					<span class="count3">
						<?php the_sub_field('mail');?>
					</span>
					<h6>E-MAIL</h6>
				</li>

				<!--======= COFFEE =========-->
				<li class="col-sm-3"><i class="fa fa-star"></i>
					<span class="count4">
						<?php the_sub_field('completed');?>
					</span>
					<h6>COMPLETED</h6>
				</li>
				<?php
				endwhile;
				else :
					// no rows found
					endif;
				?>
			</ul>
		</div>

		<!--======= THE TEAM MEMBERS =========-->
		<section class="team">
			<!--======= TITTLE =========-->
			<h4 class="tittle">MEET THE TEAM </h4>
			<!--======= TEAM ROW =========-->
			<ul class="row">
				<?php
				// check if the repeater team
				if ( have_rows( 'team' ) )://repeater
					// loop team
					while ( have_rows( 'team' ) ): the_row();
				// vars
				$teamMember = get_sub_field( 'team-member' );//group
				//var_dump($teamMember['member-img01']);
				//var_dump($teamMember); die();
						if ( $teamMember ):?>
				<li class="col-sm-4">
					<div class="team-member">
						<!--======= IMAGE =========-->

						<img class="img-responsive" src="<?php echo $teamMember['member-img01']['url']; ?>" alt=""/>
						<!--======= TEAM HOVER =========-->
						<div class="team-over">
							<h4><?php echo $teamMember['member-name']; ?></h4>
							<span>
								<?php echo $teamMember['member-job']; ?>
							</span>
							<p>
								<?php echo $teamMember['member-detail']; ?>
							</p>
							<!--======= SOCIAL ICON =========-->

							<ul class="social_icons">
								<li class="facebook"> <a href="<?php echo $teamMember['member-fb']; ?>"><i class="fa fa-facebook"></i> </a>
								</li>
								<li class="twitter">
									<a href="<?php echo $teamMember['member-twitter']; ?>"><i class="fa fa-twitter"></i> </a>
								</li>
								<li class="linkedin">
									<a href="<?php echo $teamMember['member-lin']; ?>"><i class="fa fa-linkedin"></i> </a>
								</li>
								<li class="googleplus">
									<a href="<?php echo $teamMember['member-ggplus']; ?>"><i class="fa fa-google-plus"></i> </a>
								</li>

							</ul>
						</div>
					</div>
				</li>
					<?php endif; //group
    			endwhile;
				else :
				// no rows found
				endif;//repeate
?>

			</ul>
		</section>

		<!--======= TESTIMONIAL =========-->
		<section class="testimonial">
			<!--======= TITTLE =========-->
			<h4 class="tittle">CUSTOMERS LOVE HEXA</h4>
			<div class="testi">

				<!--======= TESTI SLIDER =========-->
				<div class="testi-slide">
					<?php
					if( have_rows('testi-slide') ):// repeater
					 	// loop through the rows of data
					    while ( have_rows('testi-slide') ) : the_row();
					        // display a sub field value
					        	$testi_item = get_sub_field( 'testi-slide-item' );//group
											if ( $testi_item )://group?>
											<div class="slide">
												<div class="testimonial-author">
													<figure class="featured-thumbnail"> <img alt="Hexa" src="<?php echo $testi_item['testi-img']['url']; ?>"> <span class="quote"></span> </figure>
												</div>
												<p><?php echo $testi_item['testi-content']; ?></p>
												<h6><?php echo $testi_item['testi-title']; ?></h6>
											</div>
											<?php endif; //group
							endwhile;
					else :
					// no rows found
					endif;//repeate
				?>
				</div>
			</div>
		</section>

		<!--======= THE CLIENTS  WE  WORK =========-->
		<section class="clients">
			<!--======= TITTLE =========-->
			<h4 class="tittle">OUR HAPPY CLIENTS</h4>
			<?php
			$images = get_field('clients');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			if( $images ): ?>
			    <ul>
			        <?php foreach( $images as $image ): ?>
			            <li><a href="#">
			            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
			            </li>
			        <?php endforeach; ?>
			    </ul>
			<?php endif; ?>
		</section>
	</div>
</div>

<?php
endwhile;//post
endif;
wp_reset_query();
?>
<?php get_footer(); ?>
