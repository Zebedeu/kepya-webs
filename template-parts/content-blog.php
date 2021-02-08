<?php
   /**
    * The template part for displaying single posts
    *
    * @package WordPress
    * @subpackage Twenty_Sixteen
    * @since Twenty Sixteen 1.0
    */
   ?>
<div class="">
   <div class="row">
      <div class="col-md-12 data-section terms-prg">
            <?php 
                if(pll_current_language() == 'en'){
                    echo do_shortcode('[sc name="EN Blog Page Title"]');
                }else{
                    echo do_shortcode('[sc name="PT Blog Page Title"]');
                }
            ?>
      </div>
   </div>
   <div class="row">
      <!-- Latest Posts -->
      <main class="posts-listing col-lg-8">
         <div class="row">
            <?php
                /* translators: %s: Name of current post */
                the_content( sprintf(
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
                    get_the_title()
                ) );

                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
            ?>
         </div>
      </main>
      <aside class="col-lg-4 kp-sidebar">
         <?php get_sidebar(); ?>
      </aside>
   </div>
</div>