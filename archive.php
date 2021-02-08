<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<section class="features">
    <div class="container">    	
		<main id="main" class="site-main" role="main">

            <div class="">
               <div class="row">
                  <div class="col-md-12 data-section terms-prg">
                        <?php 
                            the_archive_title( '<h2>', '</h2>' );
                        ?>
                  </div>
               </div>
               <div class="row">
                  <!-- Latest Posts -->
                  <main class="posts-listing col-lg-8">
                     <div class="row">
                        <?php if(is_author()){ ?>
                                <?php
                                    $author = get_the_author_meta('ID');                                        
                                    echo do_shortcode('[ajax_load_more repeater="template_8" author="'.$author.'" post_type="post" posts_per_page="4" label="Load More" transition="masonry" masonry_selector=".grid-item" masonry_animation="slide-up"]');
                                ?>
                        <?php } ?>
                        <?php if(is_category()){ ?>
                            <?php
                                $cat = get_category( get_query_var( 'cat' ) );
                                $category = $cat->slug; 
                            ?>
                            <?php                                
                                echo do_shortcode('[ajax_load_more repeater="template_8" category="'.$category.'" post_type="post" posts_per_page="4" label="Load More" transition="masonry" masonry_selector=".grid-item" masonry_animation="slide-up"]');
                            ?>
                        <?php } ?>  
                        <?php if(is_tag()){ ?>
                            <?php
                                $tag = get_query_var('tag');                                    
                                echo do_shortcode('[ajax_load_more repeater="template_8" tag="'.$tag.'" post_type="post" posts_per_page="4" label="Load More" transition="masonry" masonry_selector=".grid-item" masonry_animation="slide-up"]');
                            ?>
                        <?php } ?>
                     </div>
                  </main>
                  <aside class="col-lg-4 kp-sidebar">
                     <?php get_sidebar(); ?>
                  </aside>
               </div>
            </div>
		</main><!-- .site-main -->    	
    </div>
</section>
<?php get_footer(); ?>
