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
         <?php the_title( '<h2>', '</h2>' ); ?>
      </div>
   </div>
   <div class="row">
      <!-- Latest Posts -->
      <main class="posts-listing col-lg-8">
         <div class="row">
            <!-- post -->
            <div class="post col-md-12">
               <div class="post-thumbnail"><?php twentysixteen_post_thumbnail(); ?></div>
               <div class="post-details">
                  <div class="post-footer d-flex align-items-center">
                     <?php /*<a href="#" class="author d-flex align-items-center flex-wrap">
                        <div class="avatar">
                           <?php if($avatar = get_avatar_url(get_the_author_meta('ID'), array("size"=>50))): ?>
                                <img src="<?php echo $avatar; ?>" alt="<?php the_author(); ?>" class="img-fluid">
                           <?php else: ?>
                                <img src="<?php echo get_template_directory_uri();?>/images/no-image-avtar.jpg">
                            <?php endif; ?> 
                        </div>
                        <div class="title"><span><?php the_author(); ?></span></div>
                     </a>*/?>
                     <div class="date"><i class="fa fa-clock-o"></i> <?php the_time("F d, Y"); ?></div>                     
                  </div>
               </div>
               <div class="post-body">
                  <?php
                     the_content();
                     
                     wp_link_pages(
                         array(
                             'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', ' kepya-webs' ) . '</span>',
                             'after'       => '</div>',
                             'link_before' => '<span>',
                             'link_after'  => '</span>',
                             'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', ' kepya-webs' ) . ' </span>%',
                             'separator'   => '<span class="screen-reader-text">, </span>',
                         )
                     );
                     
                     if ( '' !== get_the_author_meta( 'description' ) ) {
                         get_template_part( 'template-parts/biography' );
                     }
                     ?>
               </div>
               <div class="posts-nav kp-post-nav justify-content-between align-items-stretch flex-column flex-md-row">
                  <?php
                     if ( is_singular( 'attachment' ) ) {
                         // Parent post navigation.
                         the_post_navigation(
                             array(
                                 'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', ' kepya-webs' ),
                             )
                         );
                     } elseif ( is_singular( 'post' ) ) {
                         $next_post = get_next_post();
                         $previous_post = get_previous_post();
                         // Previous/next post navigation.
                         the_post_navigation(
                             array(
                                 'next_text' => '
                                     <div class="kp-blor-next-box">
                                         <div class="kp-blog-pre-arrow">'. __( 'Next', ' kepya-webs' ) .'<i class="fa fa-long-arrow-right" aria-hidden="true"></i></div>'.
                                         '<div class="kp-blog-box-next">
                                         <span>'. get_the_post_thumbnail($next_post->ID,array(81,40)).'</span>
                                         <p>%title</p></div></div>',
                     
                     
                                 'prev_text' => '
                                     <div class="kp-blor-pre-box">
                                     <div class="kp-blog-pre-arrow">
                                         <i class="fa fa-long-arrow-left" aria-hidden="true"></i>'. __( 'Previous', ' kepya-webs' ). '</div>'.
                                     '<div class="kp-blog-box-pre">
                                     <span>'. get_the_post_thumbnail($previous_post->ID,array(81,40)).'</span>' .
                                     '<p>%title</p></div></div>',
                             )
                         );
                     }
                     
                     ?>
               </div>
               <div class="add-comment">
                  <?php
                     // If comments are open or we have at least one comment, load up the comment template.
                     if ( comments_open() || get_comments_number() ) {
                         comments_template();
                     }
                     ?>
               </div>
            </div>
         </div>
      </main>
      <aside class="col-lg-4 kp-sidebar">
         <?php get_sidebar(); ?>
      </aside>
   </div>
</div>