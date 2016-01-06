<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pet
 */

get_header(); ?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

	<style>

			.carousel .item {
		    width: 100%; /*slider width*/
		    max-height: 600px; /*slider height*/
		}
		.carousel .item img {
		    width: 100%; /*img width*/
		}
		/*add some makeup*/
		.carousel .carousel-control {
		    background: none;
		    border: none;
		    top: 50%;
		}
		/*full width container*/
		@media (max-width: 767px) {
		    .block {
		        margin-left: -20px;
		        margin-right: -20px;
		    }
		}



	</style>

		<section class="block">
	    <div id="myCarousel" class="carousel slide">
	        <div class="carousel-inner">
	            <div class="active item">
	                <img src="http://pet.cool/wp-content/uploads/2015/08/DROOL_TERRIBLE_RECORDS_EXTENDED_ALBUM_INSTILLATION_VIDEO_CLIP_LAUNCH_05_25_15-e1439913618682.jpg" alt="Slide1" />
	            </div>
	            <div class="item">
	                <img src="http://pet.cool/wp-content/uploads/2015/08/DROOL_TERRIBLE_RECORDS_EXTENDED_ALBUM_INSTILLATION_VIDEO_CLIP_LAUNCH_05_25_15-e1439913618682.jpg" alt="Slide2" />
	            </div>
	            <div class="item">
	                <img src="http://pet.cool/wp-content/uploads/2015/08/DROOL_TERRIBLE_RECORDS_EXTENDED_ALBUM_INSTILLATION_VIDEO_CLIP_LAUNCH_05_25_15-e1439913618682.jpg" alt="Slide3" />
	            </div>
	        </div>
	        <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
	 		<a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>

		    </div>
		</section>



<div id="updates">

<div class="updates_post">
	 <?php query_posts( array ( 'category_name' => 'home', 'posts_per_page' => 12 ) ); ?>

		<?php if ( have_posts() ) : ?>


			<?php if ( is_home() && ! is_front_page() ) : ?>

				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>


				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

						<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
							
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->

					<div class="entry-content img-responsive">
						<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail(); ?>
								</a>
							<?php endif; ?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php pet_entry_footer(); ?>
					</footer><!-- .entry-footer -->
					<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
</div><!-- #secondary -->
				</article><!-- #post-## -->

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</div> <!-- update posts -->
</div> <!-- #updates-->

		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_footer(); ?>
