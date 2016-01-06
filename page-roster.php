<?php
/* 
Template Name: ROSTER
*/ 
get_header(); ?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
	<div id="updates">
	<div class="updates_post container">
	 <?php query_posts( array ( 'category_name' => 'roster', 'posts_per_page' => -1 ) ); ?>
	<?php 
	global $more;    // Declare global $more (before the loop).
	$more = 1;       // Set (inside the loop) to display all content, including text below more.
	the_content();
	?>
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article class="col-lg-12" id="post-<?php the_ID(); ?>"  

					<?php post_class(); ?>>
						<div class="roster-content img-responsive" >
							<?php the_content();?>	
						</div><!-- .entry-content -->

				</article><!-- #post-## -->

			<?php endwhile; ?>
		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</div> <!-- update posts -->
		</div> <!-- #updates-->
		

	</main><!-- #main -->
	</div><!-- #primary -->
<script>
	
	 $(document).ready(function() {
            $ ('article:even').addClass('black');
            $ ('article:odd').addClass('pink');
        });

	$.each($("article"), function(index, value){
	    var num = index + 1;
	    var imgHeight = $(this).find('.image-col');
	    var textHeight = $('.text-col').outerHeight();
	    var theImgsrc = imgHeight.find('a').attr("href");

	    $(value).attr("id", num);
	     $(this).find('img').css('display',"none");
	   
	    imgHeight.css({'background-image':'url(' +theImgsrc +')', 'background-position':'center', 'background-size':'cover'});
   			 imgHeight.height(textHeight); 

	   $(window).resize(function() {
	   	imgHeight.height(textHeight); 
	   	 if ($(window).width() < 768) {
		    imgHeight.height('400px'); 
		}
		else {
		   imgHeight.height(textHeight); 
		}


	   });
	   

			    	
	});



	
</script>

<?php get_footer(); ?>
