<?php

/* 
Template Name: HOME
*/ 

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			


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


				<article id="post-<?php the_ID(); ?>" 

					<?php post_class(); ?>>

					<div class="the_date">
						<span>
							
								[ <?php the_time(); ?> ]
								<span class="entry-date">
									 <?php echo get_the_date(); ?></span>

						
							
						</span>
						
					</div>

					

						<div class="entry-content img-responsive">
						<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail(); ?>
								</a>
							<?php endif; ?>

					</div><!-- .entry-content -->
					<header class="entry-header">
						<h2>
						<?php the_title( ); ?>
						</h2>

						<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
							
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->

			<div class="the_excerpt">
				
				 <?php the_excerpt(); ?> 
			</div>
				

					

					
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


<?php get_footer(); ?>
