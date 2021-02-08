<?php
/**
 * Template Name: Home Page
 * @package WordPress
 */

get_header(); ?>
    <div>
        <?php if ( have_posts() ) : ?>

            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content-home', get_post_format() );

            // End the loop.
            endwhile;

        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>  
    </div>        
<?php get_footer(); ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#accordion i").click(function(){            
            //slide up all the link lists
            jQuery("#accordion ul ul").slideUp(200);
            //slide down the link list below the h3 clicked - only if its closed
            if(!jQuery(this).next().is(":visible"))
            {
                jQuery(this).next().slideDown(200);
            }
        })
    })
    jQuery(document).ready(function(){
        jQuery(".home-tab").each(function(){
            if(jQuery(this).hasClass("disabled")){
                jQuery(this).removeAttr("href");
            }
        });
    });
</script>