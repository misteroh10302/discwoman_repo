<?php
/* 
Template Name: LIVE
*/ 


get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


<div id="updates">



<div class="updates_post container row">
	 <?php query_posts( array ( 'category_name' => 'live', 'posts_per_page' => 12 ,'orderby' => 'title', 'order' => 'DESC'  ) ); ?>

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

				
				<article class="col-md-6 col-sm-6 col-lg-6" id="post-<?php the_ID(); ?>"  

					<?php post_class(); ?>>

					<div class="the_date hidden">
						<span>
							
								[ <?php the_time(); ?> ]
								<span class="entry-date">
									 <?php echo get_the_date(); ?>
									</span>

						
							
						</span>
						
					</div>

					
						<span class="new-wrapper">


						<div class="entry-content img-responsive" 
						style="background: url(<?php echo $src[0]; ?> );  background-size: cover;background-position:right center;width: 66%; ">
						<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail(); ?>
								

								<div class="title-element">

									<h2>
										<?php the_title( ); ?>
									</h2>
									

								</div>
								</a>
								
							<?php endif; ?>

							</span>

					</div><!-- .entry-content -->
					<header class="entry-header">
						

						<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
							
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->


					

					
				</article><!-- #post-## -->

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</div> <!-- update posts -->
	</div> <!-- #updates-->
	</div><!-- .entry-content -->

		</main><!-- #main -->
	</div><!-- #primary -->
<script>
	
	 $(document).ready(function() {
            $ ('article:even').addClass('even');
            $ ('article:odd').addClass('odd');
        });

$.each($("article"), function(index, value){
    var num = index + 1;
    $(value).attr("id", num);
});
</script>

<?php get_footer(); ?>
