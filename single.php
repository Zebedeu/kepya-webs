<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<section class="features">
    <div class="container">
        <div id="primary" class="container content-area">

        	<main id="main" class="site-main" role="main">
        		<?php
        		// Start the loop.
        		while ( have_posts() ) :
        			the_post();

        			// Include the single post content template.
        			get_template_part( 'template-parts/content', 'single' );

        			
        			// End of the loop.
        		endwhile;
        		?>
        	</main><!-- .site-main -->        	

        </div><!-- .content-area -->
    </div>
</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
