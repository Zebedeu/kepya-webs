<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="">
    <div id="nav-icon" class="menu-button visible-xs">
        <span class="burger-icon"></span>
    </div>
</div>
    <div class="main_header">
        <div class="container custom-container">
            <div class="row paddy50">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="Freshmart">
                            <?php 
                                $custom_logo_id = get_theme_mod( 'custom_logo' );
                                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                
                                if ( has_custom_logo() ) {
                                echo '<img class="img-responsive" src="' . esc_url( $logo[0]) . '" alt="' . get_bloginfo( 'name' ) . '">';
                                } 
                            ?>                            
                        </a>
                    </div>
                </div>
                <div class="col-md-10 paddy0">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 cus_width">
                            <ul class="topnav" id="myTopnav">
                                
                                <?php 
                                    if(pll_current_language() == 'pt'){
                                        echo do_shortcode('[sc name="PT Header Phone section"]');

                                    }else{
                                        echo do_shortcode('[sc name="EN Header Phone section"]');

                                    }
                                ?>

                                <?php 
                                    echo rarus_polylang_languages();
                                ?>
                                
                            </ul>
                            <a href="javascript:void(0);" class="icon" onclick="menuright()">
                               <i class="fa fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="menu-content overlay">                     
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <?php
                                wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'kpprimarymenu',
                                ) );
                            ?>
                        <?php endif; ?>       
                    </div>                  
                </div>
            </div>
        </div>
    </div> 
</section>