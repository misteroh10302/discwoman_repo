<?php

/* 
Template Name: Events
*/ 

get_header(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/news.js"></script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/events.css">
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<div id="updates">
<div class="updates_post container row">

	<?php $q = new WP_Query( array('category_name' => 'events','posts_per_page' => 15, 'paged'=>$paged, 'order' => 'DESC' ));

	if( $q->have_posts() ) {
	    while( $q->have_posts() ) {
	        $q->the_post();
	        $current_month = get_the_date('F');
	        if( $q->current_post === 0 ) { 

	            echo "<span class='mainDate'>";
	                the_date( 'F Y' );
	                echo "</span>";

	        }else{ 

	            $f = $q->current_post - 1;       
	            $old_date =   mysql2date( 'F', $q->posts[$f]->post_date ); 

	            if($current_month != $old_date) {

	                echo "<span class='mainDate'>";
	                the_date( 'F Y' );
	                echo "</span>";

	            }
	        }



	        ?>

	        <?php if ( has_post_thumbnail() ) : ?>

	      	<div class='mainItems '>
			<a class="postSrc" href="<?php the_permalink(); ?>">
	      		
	      	<?php

	        echo '<div class="tag-element">';
	        
	        echo 'EVENTS</div>';
	        the_post_thumbnail();
	        echo '<div class="more-arrow">&#8594;</div>';
	        echo '<div class="title-element"><h4 id="the_post_date">';
		  	echo  the_time('l j F Y'); 
		  	echo '</h4><h2 id="post_title">';
		  	echo the_title( );
		 	echo '</h2></div> ';
	        echo '</a></div>';

	        ?>
	        <?php endif; ?>
	        <?php

	    }

	}

	?>		

</div>	


		</div> <!-- update posts -->
	</div> <!-- #updates-->
	</div><!-- .entry-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<script>

// Set the backgroung image to the thumbnail and affix the title element to the bottom
$( ".mainItems" ).each(function() {
	var src = $(this).find('img').attr('src');
	$(this).find('img').css({'opacity':'0', 'max-height':'200px','min-height':'200px'});
	var url = $(this).find("a:first").attr("href");
	$(this).wrap('<a href="'+url+'"></a>'); 
	$(this).css({'background-image':'url('+src+')', 'background-repeat':'no-repeat', 'background-position': 'center',
    'background-size':'cover', 'min-height': '300px'});
    var affix = $(this);
});

//When the title date of the month is not at the top of the page make the padding on the top bigger
$(".mainDate").each(function(index){
	if (index > 0){
		console.log($(this).height());
		var newHeight = $(this).height();
		$(this).css('margin-top', newHeight + 24 + "px" );
	}

});


</script>
<?php get_footer(); ?>
