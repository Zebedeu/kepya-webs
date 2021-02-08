<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://developer.wordpress.org/plugins/}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'kepya_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * Create your own kepya_setup() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 */
	function kepya_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/kepya
		 * If you're building a theme based on Twenty Sixteen, use a find and replace
		 * to change 'kepya' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'kepya' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 *
		 *  @since Twenty Sixteen 1.2
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 240,
				'width'       => 240,
				'flex-height' => true,
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'kepya' ),
				'social'  => __( 'Social Links Menu', 'kepya' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://wordpress.org/support/article/post-formats/
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			)
		);

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', kepya_fonts_url() ) );

		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Dark Gray', 'kepya' ),
					'slug'  => 'dark-gray',
					'color' => '#1a1a1a',
				),
				array(
					'name'  => __( 'Medium Gray', 'kepya' ),
					'slug'  => 'medium-gray',
					'color' => '#686868',
				),
				array(
					'name'  => __( 'Light Gray', 'kepya' ),
					'slug'  => 'light-gray',
					'color' => '#e5e5e5',
				),
				array(
					'name'  => __( 'White', 'kepya' ),
					'slug'  => 'white',
					'color' => '#fff',
				),
				array(
					'name'  => __( 'Blue Gray', 'kepya' ),
					'slug'  => 'blue-gray',
					'color' => '#4d545c',
				),
				array(
					'name'  => __( 'Bright Blue', 'kepya' ),
					'slug'  => 'bright-blue',
					'color' => '#007acc',
				),
				array(
					'name'  => __( 'Light Blue', 'kepya' ),
					'slug'  => 'light-blue',
					'color' => '#9adffd',
				),
				array(
					'name'  => __( 'Dark Brown', 'kepya' ),
					'slug'  => 'dark-brown',
					'color' => '#402b30',
				),
				array(
					'name'  => __( 'Medium Brown', 'kepya' ),
					'slug'  => 'medium-brown',
					'color' => '#774e24',
				),
				array(
					'name'  => __( 'Dark Red', 'kepya' ),
					'slug'  => 'dark-red',
					'color' => '#640c1f',
				),
				array(
					'name'  => __( 'Bright Red', 'kepya' ),
					'slug'  => 'bright-red',
					'color' => '#ff675f',
				),
				array(
					'name'  => __( 'Yellow', 'kepya' ),
					'slug'  => 'yellow',
					'color' => '#ffef8e',
				),
			)
		);

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // kepya_setup
add_action( 'after_setup_theme', 'kepya_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function kepya_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kepya_content_width', 840 );
}
add_action( 'after_setup_theme', 'kepya_content_width', 0 );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Sixteen 1.6
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function kepya_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'kepya-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'kepya_resource_hints', 10, 2 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function kepya_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'kepya' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'kepya' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 1', 'kepya' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Appears at the footer first section on posts and pages.', 'kepya' ),
			'before_widget' => '<div class="footer-data">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 2', 'kepya' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears at the footer second section on posts and pages.', 'kepya' ),
		)
	);

    register_sidebar(
        array(
            'name'          => __( 'Header Top Nav', 'kepya' ),
            'id'            => 'sidebar-4',
            'description'   => __( 'Appears at the header with phone number , login & register link', 'kepya' ),
        )
    );
}
add_action( 'widgets_init', 'kepya_widgets_init' );

if ( ! function_exists( 'kepya_fonts_url' ) ) :
	/**
	 * Register Google fonts for Twenty Sixteen.
	 *
	 * Create your own kepya_fonts_url() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function kepya_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Merriweather, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'kepya' ) ) {
			$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
		}

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Montserrat, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'kepya' ) ) {
			$fonts[] = 'Montserrat:400,700';
		}

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'kepya' ) ) {
			$fonts[] = 'Inconsolata:400';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family'  => urlencode( implode( '|', $fonts ) ),
					'subset'  => urlencode( $subsets ),
					'display' => urlencode( 'fallback' ),
				),
				'https://fonts.googleapis.com/css'
			);
		}

		return $fonts_url;
	}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function kepya_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'kepya_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function kepya_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'kepya-fonts', kepya_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'kepya-style', get_stylesheet_uri(), array(), '20190507' );

	// Theme block stylesheet.
	wp_enqueue_style( 'kepya-block-style', get_template_directory_uri() . '/css/blocks.css', array( 'kepya-style' ), '20190102' );

    // Theme bootstrap Css.
    wp_enqueue_style( 'kepya-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css',false,'1.1','all');

    // Theme menu Css.
    wp_enqueue_style( 'kepya-menu-style', get_template_directory_uri() . '/css/cmq.styles.min.css',false,'1.1','all');

    // Theme bootstrap Css.
    wp_enqueue_style( 'kepya-fontawsome-style', get_template_directory_uri() . '/css/font-awesome.min.css',false,'1.1','all');
    

    // Theme Common stylesheet.
    wp_enqueue_style( 'kepya-style', get_template_directory_uri() . '/css/style.css',false,'1.1','all');

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'kepya-ie', get_template_directory_uri() . '/css/ie.css', array( 'kepya-style' ), '20170530' );
	wp_style_add_data( 'kepya-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'kepya-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'kepya-style' ), '20170530' );
	wp_style_add_data( 'kepya-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'kepya-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'kepya-style' ), '20170530' );
	wp_style_add_data( 'kepya-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'kepya-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'kepya-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'kepya-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170530', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'kepya-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20170530' );
	}

	wp_enqueue_script( 'kepya-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20181217', true );

	wp_localize_script(
		'kepya-script',
		'screenReaderText',
		array(
			'expand'   => __( 'expand child menu', 'kepya' ),
			'collapse' => __( 'collapse child menu', 'kepya' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'kepya_scripts' );

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Twenty Sixteen 1.6
 */
function kepya_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'kepya-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20190102' );
	// Add custom fonts.
	wp_enqueue_style( 'kepya-fonts', kepya_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'kepya_block_editor_styles' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function kepya_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'kepya_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function kepya_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function kepya_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'kepya_content_image_sizes_attr', 10, 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function kepya_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'kepya_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function kepya_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'kepya_widget_tag_cloud_args' );

/**** This function is used for remove p tag & br tag from content ***/
remove_filter('the_content', 'wpautop');

/**** This function is used for displaying current blogs in home page ***/
function kppagebloglist(){    
    ob_start();

    $query = new WP_Query(
        array(
            'post_type'=>'post',
            'posts_per_page' => 3,
            'post_status' => 'publish',
            'order' => 'DESC'
        )
    );

    if ( $query->have_posts() ) { ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php $commentscount = get_comments_number(); ?>
            <div class="col-md-4 col-xs-12 col-sm-6 blog-post">
               <div class="blog_inner">
                  <div class="blog-img">
                     <a href="<?php the_permalink(); ?>"> <?php echo the_post_thumbnail( array( 391, 207 ) );?> </a>
                  </div>
                  <div class="blog-info">
                     <div class="post-date"><time class="entry-date" datetime="2018"><?php the_time('F jS, Y'); ?></time></div>
                     <ul class="post-meta">
                        <!-- <li><i class="fa fa-user"></i>Posted by <a><?php the_author(); ?></a> </li> -->
                        <li><i class="fa fa-comments"></i><?php echo $commentscount; ?> comment</li>
                     </ul>
                     <h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 4, '...' );?></a></h3>
                     <?php
                     $selectedlang = pll_current_language();
                     if($selectedlang == 'en'){
                     ?>
                     <p><?php echo wp_trim_words( get_the_content(), 18, '...<a href="'.get_permalink($posts->ID).'">[Read More]</a>' );?></p>
                 	 <?php } else {?>
                 	 	<p><?php echo wp_trim_words( get_the_content(), 14, '...<a href="'.get_permalink($posts->ID).'">[Consulte Mais informação]</a>' );?></p>
                 	 <?php } ?>
                  </div>
               </div>
            </div>
        <?php endwhile;
            wp_reset_postdata(); ?>
    <?php $homeblog = ob_get_clean();
        return $homeblog;
    }

}

add_shortcode('kp-page-blogs', 'kppagebloglist');

/**
 * Polylang Shortcode - https://wordpress.org/plugins/polylang/
 * Add this code in your functions.php
 * Put shortcode [polylang_langswitcher] to post/page for display flags
 *
 * @return string
 */
function custom_polylang_langswitcher() {
    $output = '';
    if ( function_exists( 'pll_the_languages' ) ) {
        $args   = [
            'show_flags' => 1,
            'show_names' => 1,
            'lang_slug'  => 1,
            'echo'       => 0,
        ];
        $output = '<ul class="polylang_langswitcher">'.pll_the_languages( $args ). '</ul>';
    }
    return $output;
}
add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );

/**
 * Show Polylang Languages with Custom Markup
 * @param  string $class Add custom class to the languages container
 * @return string        
 */
function rarus_polylang_languages( $class = '' ) {
  if ( ! function_exists( 'pll_the_languages' ) ) return;
  // Gets the pll_the_languages() raw code
  $languages = pll_the_languages( array(
    'display_names_as'       => 'slug',
    'hide_if_no_translation' => 1,
    'raw'                    => true
  ) );

  

  $output = '';
  $slash = '';
  // Checks if the $languages is not empty
  if ( ! empty( $languages ) ) {
    // Creates the $output variable with languages container
    $output = '<li class="languages' . ( $class ? ' ' . $class : '' ) . '">';
    // Runs the loop through all languages
    $i = 0;
    foreach ( $languages as $language ) {
      // Variables containing language data
      $id             = $language['id'];
      $slug           = $language['slug'];
      $url            = $language['url'];
      $current        = $language['current_lang'] ? ' languages__item--current' : '';
      $no_translation = $language['no_translation'];
      // Checks if the page has translation in this language
      if ( ! $no_translation ) {
        // Check if it's current language
        /*if ( $current ) {
          // Output the language in a <span> tag so it's not clickable
          $output .= "<span class=\"languages__item$current\">$slug</span>";
        } else {
          // Output the language in an anchor tag
          $output .= "<a href=\"$url\" class=\"languages__item$current\">$slug</a>";
        }*/

        if(count($languages) == 2){
            if($i==0){
                $slash = "<span>|</span>";
            }else{
                $slash = "";
            }            
        }

        $output .= "<a href=\"$url\" class=\"languages__item$current\">$slug</a> $slash ";        

      }
      $i++;
    }
    $output .= '</li>';
  }
  return $output;
}