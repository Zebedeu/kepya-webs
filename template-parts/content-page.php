<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>


<?php
    /* translators: %s: Name of current post */
    the_content( sprintf(
        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kepya' ),
        get_the_title()
    ) );

    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kepya' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'kepya' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
?>


