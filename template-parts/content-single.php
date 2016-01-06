<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pet
 */

?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/scss/single.css">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta ">

			<?php
				global $post;
				$categories = get_the_category();
				$category = $categories[0];
				$cat_ID = $category->cat_ID;
				$cat_name =  get_cat_name($cat_ID );
				$myposts = get_posts("numberposts=2&category=$cat_ID");
				?>


				<h6><?php echo $cat_name?></h6>


			<small id="theTimestamp">

				<div><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></div>

			 	
			</small>
			
		</div><!-- .entry-meta -->
		<?php the_title( '<h1 class="entry-title ">', '</h1>' ); ?>

		<small><div id="theAuth"><?php the_author(); ?> </div></small>
		

		
	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pet' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->

<script>


		$( "article" ).ready(function() {
		  var findImg = $(this).find('img:first');
		  var headerInfo = $(this).find('header');

		  console.log(findImg);
		  if (findImg = true) {
		  	
		  	$(this).find('.entry-header').insertAfter($(this).find('img:first'));
		  }

		});




</script>

