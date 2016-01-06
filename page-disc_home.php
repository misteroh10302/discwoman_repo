<?php

/* 
Template Name: DISC HOME
*/ 

get_header(); ?>

	<div id="" class="content-area">
		<main id="main" class="site-main" role="main">

<style>

article:nth-child(3n+4) .title-element {

	background-color: #333333;
	color:white ;

}

article:nth-child(3n+4) .title-element  h2{
	color:white ;

}



</style>


			
<square>

<div id="updates content">

<div class="updates_post container row">
			<div class="top-carousel desktop-carousel">
				<div id="myCarousel" class="carousel slide">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					  
					 <div class="carousel-inner">
					  <?php $the_query = new WP_Query(array(
						    'category_name' => 'Top_Home', 
						    'posts_per_page' => 1 
					    )); 
					   while ( $the_query->have_posts() ) : 
					   $the_query->the_post();
							$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
					  ?>
					   <div class="item active" style="background:linear-gradient( rgba(239, 176, 176, 0.85), rgba(239, 176, 176, 0.85) ), url(<?php echo $src[0]; ?> );  background-size: cover;background-position:right center; max-width:100%;	 ">
						 	<div class="tag-element"><?php the_category( ' ' ); ?></div>
						 	<div class="more-arrow"><h4>Read Now</h4> &#8594;</div>
									
						    <div class="carousel-caption">
						    	
						    	 <h4><?php the_date();?></h4>
							     <h1><?php the_title();?></h1>
							     <h5><?php the_excerpt();?></h5>
						    </div>

					   </div><!-- item active -->
					  <?php 
					   endwhile; 
					   wp_reset_postdata();
					  ?>

					  <?php 
					   $the_query = new WP_Query(array(
					    'category_name' => 'Top_Home', 
					    'posts_per_page' => 2, 
					    'offset' => 1 
					    )); 
					   while ( $the_query->have_posts() ) : 
					   $the_query->the_post();

						$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );

					  ?>
					   <div class="item "  style="background:linear-gradient( rgba(239, 176, 176, 0.85), rgba(239, 176, 176, 0.85) ), url(<?php echo $src[0]; ?> );  background-size: cover;background-position:right center; ">
					    <div class="tag-element"><?php the_category( ' ' ); ?></div>
					    <div class="more-arrow"> &#8594;</div>
									
						    <div class="carousel-caption">
						    	 <h4><?php the_date();?></h4>
							     <h1><?php the_title();?></h1>
							     <h5><?php the_excerpt();?></h5>
						    </div>
					   </div><!-- item -->
					  <?php 
					   endwhile; 
					   wp_reset_postdata();
					  ?>
					 </div><!-- carousel-inner -->
					
					 <a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
					 <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
					</div><!-- #myCarousel -->



				<script>
				    $('.carousel').carousel({
				        interval: 10000
				    })
				</script>

		</div> <!-- end the carousel -->

	<div id="main-content">
	 <?php query_posts( array ( 'category_name' => 'home', 'posts_per_page' => 15 ,'orderby' => 'tag', 'order' => 'DESC'  ) ); ?>
		<?php if ( have_posts() ) : ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
					?>
				<article class="module front_grid hidden-xs" id="post-<?php the_ID(); ?>"  
					<?php post_class(); ?>>
					<div class="entry-content img-responsive"  
						style="background: url(<?php echo $src[0]; ?> );  background-size: cover;background-position:right center;max-width: 60%; ">
						
						<div <?php post_class(); ?>>


						<span class="new-wrapper">
						<div class="overlay-pink">
							<div class="tag-element"><?php $category = get_the_category();echo $category[1]->cat_name;?></div>

							<?php if ( get_the_post_thumbnail($post_id) != '' ) {

									  echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
									   the_post_thumbnail();
									  echo '</a>';
									  echo '<div class="title-element"><h4 id="the_post_date">';
									  echo  the_date( ); 
									  echo '</h4><h2 id="post_title">';
									  echo the_title( );
									  echo '</h2></div> ';

									} else {

									 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper instagram-image">';
									 echo '<img src="';
									 echo catch_that_image();
									 echo '" alt="" />';
									 echo '</a>';
									 echo '<div class="title-element"><h4 id="posted_on">';
									 echo   human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
									 echo '</h4></div> ';

									}/*
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php the_post_thumbnail(); ?>
											<div class="more-arrow">&#8594;</div
										</a> */
									?>
							</span> <!-- new wrapper -->
						</div>
							<!--<div class="title-element">
										<h4 id="the_post_date"><?php the_date( ); ?></h4>
										<h2 id="post_title"><?php the_title( ); ?></h2>
										<h4 id="posted_on"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></h4>
									</div> -->
						</div>
					</div><!-- .entry-content -->
					<header class="entry-header">
						<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->
				</article><!-- #post-## -->
				<section class="mobile_front_grid visible-xs" id="post-<?php the_ID(); ?>"  
					<?php post_class(); ?>>
					<div class="entry-content img-responsive" 
						style="background: url(<?php echo $src[0]; ?> );  background-size: cover;background-position:right center;max-width: 60%; ">
						<span class="new-wrapper-mobile col-xs-12">
						<div class="overlay-pink">
							<div class="tag-element"><?php the_category( ' ' ); ?></div>
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail(); ?>
									<div class="more-arrow">&#8594;</div>
									<div class="title-element">
										<h4><?php the_date( ); ?></h4>
										<h2><?php the_title( ); ?></h2>
									</div>
								</a>
							<?php endif; ?>
							</span> <!-- new wrapper -->
						</div>
					</div><!-- .entry-content -->
					<header class="entry-header">
						<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->
				</section><!-- #post-## -->
			<?php endwhile; ?>

			<!--<?php the_posts_navigation(); ?>  -->

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</div> <!-- end main content-->

		</div> <!-- update posts -->
	</div> <!-- #updates-->
	</square>


	</div><!-- .entry-content -->

		</main><!-- #main -->
	</div><!-- #primary -->
<script>

$.each($("article"), function(index, value){
    var num = index + 1;
    $(value).attr("id", num);
});

// Function to create the draggable grid for desktop
function grid_desktop() {

		// instantiate counter loop
		for (i = 0; i<100; i++) {

			// for each element add a unique width, height and position

			$.each($(".front_grid"),function(){

				var x = Math.random() + i;
				var y = Math.random() + i*5;
				var z =  300;
				var evenPlace = Math.random() +i;

				$(this).css("position", "absolute");
				$(this).css("left", x);
				$(this).css("top", y);
				$(this).width(z);
				$(this).css("auto");
				$(this).draggable({
					stack: ".module"
				});

			
				
				if ( $(this).attr("id") %2 == true) {

					$(this).css("background-color", "black");
				}else {
					$(this).css("left", "");
					$(this).css("right", evenPlace);
				}

				var min = 0 ;
				var max = 100;
				i += Math.random()*(max+min)-min;



		});

	}	

};

// call the function
grid_desktop();



</script>

<?php get_footer(); ?>

<script>

// make sure that the footer stays underneath the elements that are now placed outside of the normal flow
function footer() {


	var max = 0;
	$('.front_grid').each(function() {
	    max = Math.max(this.id, max);
	});

	// get the bottom position of the last element and append the footer to this
	var footer_bottom = 100+($("#"+max).position().top+$('#'+max).outerHeight(true));

	$(".site-footer").css("top", footer_bottom );
	$(".site-footer").css("position", "relative");
}

footer();
</script>
