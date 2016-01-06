<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pet
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>


		<?php endwhile; // End of the loop. ?>

		<!-- start the see others loop -->

		<div class="see_more row">

			<?php
				global $post;
				$categories = get_the_category();
				$category = $categories[0];
				$cat_ID = $category->cat_ID;
				$cat_name =  get_cat_name($cat_ID );



				$myposts = get_posts("numberposts=2&category=$cat_ID");
				?>


				<h2>More <?php echo $cat_name?></h2>


				<?php foreach($myposts as $post) :?>

				<div class="col-xs-6 col-more">

					<a href="<?php the_permalink(); ?>">

						<div class="see_more_img">
							<?php the_post_thumbnail("full"); ?>
						</div>
					
					</a>
					
				</div>

				
			<?php endforeach; ?>
			

		</div> <!-- see more -->



		</main><!-- #main -->
	</div><!-- #primary -->

<script>

	//add id values to the bottom see more elements */
	$.each($(".col-more"), function(index, value){
	    var num = index + 1;
	    $(value).attr("id", num);
	});


</script>


<?php get_footer(); ?>

