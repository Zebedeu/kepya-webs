<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<section class="features">

	<?php
	// Start the loop.
	while ( have_posts() ) :
		the_post();

		// Include the page content template.
		get_template_part( 'template-parts/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		// End of the loop.
	endwhile;
	?>

</section><!-- .content-area -->
<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri();?>/js/jquery-1.12.4.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/script.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/scripts.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/accordian.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/ion.rangeSlider.min.js"></script>
<script>
$(document).ready(function($) {
	$('.menu').responsiveMenu({
		breakpoint: '1200'
	});
});
</script>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#accordion i").click(function(){
		//slide up all the link lists
		$("#accordion ul ul").slideUp(200);
		//slide down the link list below the h3 clicked - only if its closed
		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown(200);
		}
	})
})

$(".js-range-slider").ionRangeSlider({
    skin: "square",
    step: 50,
    type: "double",
    grid: false,
    min: 0,
    max: 1000,
    from: 0,
    to: 800,
    prefix: "$"
});

function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}
</script>