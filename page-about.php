<?php
/* 
Template Name: ABOUT
*/ 


get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/about.css">

<div class="about-bcg">
	
</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'about' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>
			

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="mailForm"><!-- Begin MailChimp Signup Form -->
		<div id="mc_embed_signup">
		<form action="//discwoman.us10.list-manage.com/subscribe/post?u=4c3a24b58b71e45ba11b28bff&amp;id=d01a60ee6e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		    <div id="mc_embed_signup_scroll">
		<div class="mc-field-group">
			<label for="mce-FNAME" class="hidden"></label>
			<input type="text" value="FIRST NAME" name="FNAME" class="" id="mce-FNAME">
		</div>
		<div class="mc-field-group">
			<label for="mce-LNAME"  class="hidden"></label>
			<input type="text" value="LAST NAME" name="LNAME" class="" id="mce-LNAME">
		</div>
		<div class="mc-field-group">
			<label for="mce-EMAIL"  class="hidden">
		</label>
			<input type="email" value="EMAIL ADDRESS" name="EMAIL" class="required email" id="mce-EMAIL">
		</div>
		
		<div class="mc-field-group">
			<label for="mce-MMERGE3"  class="hidden"> </label>
			<input type="text" value="TALK TO US..." name="MMERGE3" class="" id="mce-MMERGE3">
		</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display:none"></div>
				<div class="response" id="mce-success-response" style="display:none"></div>
			</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
		    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_4c3a24b58b71e45ba11b28bff_d01a60ee6e" tabindex="-1" value=""></div>
		    <div class="clear"><input type="submit" value="SEND" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
		    </div>
		</form>
	</div>

<!--End mc_embed_signup-->

</div>
<?php get_footer(); ?>

<script>

var contactDiv = $('<div>', {
    id: 'contact',
    class:'contactDiv',
    title: 'Contact Us',
    rel: 'external',
    html: '<h1>Contact Us</h1><hr><span>  </span>'
});


contactDiv.appendTo($('.site-main'));

var formAdd = $('.mailForm').appendTo('.contactDiv');

	
	var wHeight = $(window).height();
	$('.about-bcg').css('background-image','url(http://www.new.discwoman.com/wp-content/uploads/2016/01/image1.jpg)');
	 $('.about-bcg').css({'height':wHeight, 'position':'relative','top':'0px','background-position':'center', 'background-size':'cover'});
	 if ($(window).width() < 960) {
		    $('.about-bcg').css({'height':'450px', 'position':'relative','top':'10px'});
	
		}
		else {
		   $('.about-bcg').css({'height':wHeight, 'position':'relative','top':'0px'});
	
		}
	 $(window).resize(function() {
	   	 if ($(window).width() < 960) {
		    $('.about-bcg').css({'height':'450px', 'position':'relative','top':'10px'});
	
		}
		else {
		   $('.about-bcg').css({'height':wHeight, 'position':'relative','top':'0px'});
	
		}


	   });


</script>
