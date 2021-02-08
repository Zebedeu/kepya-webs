<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri();?>/css/404.css' type='text/css' media='all' />
<section class="features">
    <div class="container">
        <h1>Opps!</h1>
        <p class="zoom-area">Oops! That page can’t be found.</p>
        <section class="error-container">
            <span>4</span>
            <span><span class="screen-reader-text">0</span></span>
            <span>4</span>
        </section>
        <div class="link-container">
            <a target="_blank" href="#"><button type="submit" class="button main_btn">Back To Home</button></a>            
        </div>
    </div>
</section>
<?php get_footer(); ?>
