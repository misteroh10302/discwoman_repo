<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pet
 */

?>

<style>.scrollup {
    width: 40px;
    height: auto;
    position: fixed;
    bottom: 50px;
    right: 50px;
    display: none;
    text-indent: -9999px;
    background: url('http://www.new.discwoman.com/wp-content/uploads/2016/01/btt_black.png') no-repeat;
    background-color: transparent;
    content:"Top";

}


</style>

 <a href="#" class="scrollup">Scroll</a>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			 <br>
		@2015 Disc Women <br>
		<cite>
			<strong class="footer-citation">
				
				
			</strong>
			
		</cite>

			</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<a href="https://www.youtube.com/watch?v=VfljRAaySpY

" rel="wp-video-lightbox" class="lightvideo" title="" style="display: none;"></a> 
<?php wp_footer(); ?>

<script type="text/javascript">

jQuery(document).ready(function($) {

if ($.cookie('cookie_name') != '1') {

$("a.lightvideo").trigger('click');

$.cookie('cookie_name', '1', { expires: 1 }); }

});

$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});

</script>
</body>
</html>
