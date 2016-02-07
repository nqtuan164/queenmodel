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
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twentysixteen_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own twentysixteen_setup() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     */
    function twentysixteen_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Twenty Sixteen, use a find and replace
         * to change 'twentysixteen' to the name of your theme in all the template files
         */
        load_theme_textdomain('twentysixteen', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 9999);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'twentysixteen'),
            'social' => __('Social Links Menu', 'twentysixteen'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css', twentysixteen_fonts_url()));
    }

endif; // twentysixteen_setup
add_action('after_setup_theme', 'twentysixteen_setup');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
    $GLOBALS['content_width'] = apply_filters('twentysixteen_content_width', 840);
}

add_action('after_setup_theme', 'twentysixteen_content_width', 0);

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'twentysixteen'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Content Bottom 1', 'twentysixteen'),
        'id' => 'sidebar-2',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Content Bottom 2', 'twentysixteen'),
        'id' => 'sidebar-3',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'twentysixteen_widgets_init');

if (!function_exists('twentysixteen_fonts_url')) :

    /**
     * Register Google fonts for Twenty Sixteen.
     *
     * Create your own twentysixteen_fonts_url() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function twentysixteen_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Merriweather font: on or off', 'twentysixteen')) {
            $fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
        }

        /* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Montserrat font: on or off', 'twentysixteen')) {
            $fonts[] = 'Montserrat:400,700';
        }

        /* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Inconsolata font: on or off', 'twentysixteen')) {
            $fonts[] = 'Inconsolata:400';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                ), 'https://fonts.googleapis.com/css');
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
function twentysixteen_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'twentysixteen_javascript_detection', 0);

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('twentysixteen-fonts', twentysixteen_fonts_url(), array(), null);

    // Add Genericons, used in the main stylesheet.
    wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1');

    // Theme stylesheet.
    wp_enqueue_style('twentysixteen-style', get_stylesheet_uri());

    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style('twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array('twentysixteen-style'), '20150930');
    wp_style_add_data('twentysixteen-ie', 'conditional', 'lt IE 10');

    // Load the Internet Explorer 8 specific stylesheet.
    wp_enqueue_style('twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array('twentysixteen-style'), '20151230');
    wp_style_add_data('twentysixteen-ie8', 'conditional', 'lt IE 9');

    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style('twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array('twentysixteen-style'), '20150930');
    wp_style_add_data('twentysixteen-ie7', 'conditional', 'lt IE 8');

    // Load the html5 shiv.
    wp_enqueue_script('twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3');
    wp_script_add_data('twentysixteen-html5', 'conditional', 'lt IE 9');

    wp_enqueue_script('twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151112', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20151104');
    }

    wp_enqueue_script('twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20151204', true);

    wp_localize_script('twentysixteen-script', 'screenReaderText', array(
        'expand' => __('expand child menu', 'twentysixteen'),
        'collapse' => __('collapse child menu', 'twentysixteen'),
    ));
}

add_action('wp_enqueue_scripts', 'twentysixteen_scripts');

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes($classes) {
    // Adds a class of custom-background-image to sites with a custom background image.
    if (get_background_image()) {
        $classes[] = 'custom-background-image';
    }

    // Adds a class of group-blog to sites with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of no-sidebar to sites without active sidebar.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}

add_filter('body_class', 'twentysixteen_body_classes');

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb($color) {
    $color = trim($color, '#');

    if (strlen($color) === 3) {
        $r = hexdec(substr($color, 0, 1) . substr($color, 0, 1));
        $g = hexdec(substr($color, 1, 1) . substr($color, 1, 1));
        $b = hexdec(substr($color, 2, 1) . substr($color, 2, 1));
    } else if (strlen($color) === 6) {
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));
    } else {
        return array();
    }

    return array('red' => $r, 'green' => $g, 'blue' => $b);
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
function twentysixteen_content_image_sizes_attr($sizes, $size) {
    $width = $size[0];

    840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

    if ('page' === get_post_type()) {
        840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    } else {
        840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
        600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    }

    return $sizes;
}

add_filter('wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10, 2);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr($attr, $attachment, $size) {
    if ('post-thumbnail' === $size) {
        is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
        !is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
    }
    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10, 3);

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args($args) {
    $args['largest'] = 1;
    $args['smallest'] = 1;
    $args['unit'] = 'em';
    return $args;
}

add_filter('widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args');

function theme_name_style() {
    wp_deregister_style('twentysixteen-style');
    
    wp_enqueue_style('my-swiper', get_template_directory_uri() . '/css/swiper.min.css');
    wp_enqueue_style('my-fancy', get_template_directory_uri() . '/css/jquery.fancybox.css');
    
    wp_enqueue_style('my-css', get_template_directory_uri() . '/css/style.css');
    //wp_enqueue_style('my-datepicker', get_template_directory_uri() . '/css/bootstrap-datepicker3.css');
    
    wp_enqueue_script('my-swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '', true);
    wp_enqueue_script('my-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '', true);
    wp_enqueue_script('my-datepicker', get_template_directory_uri() . '/js/bootstrap-datepicker.js', array(), '', true);
    wp_enqueue_script('my-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel-3.0.6.pack.js', array(), '', true);
    wp_enqueue_script('my-fancy', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array(), '', true);
    wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js', array(), '', true);
}

add_action('wp_enqueue_scripts', 'theme_name_style');

//add_action('init', 'create_post_type');

//function create_post_type() {
//    register_post_type('acme_model', array(
//        'labels' => array(
//            'name' => __('Models'),
//            'singular_name' => __('Model')
//        ),
//        'public' => true,
//        'has_archive' => true,
//        'rewrite' => array('slug' => 'models', 'with-front' => true),
//        )
//    );
//    register_post_type('acme_pg-pb', array(
//        'labels' => array(
//            'name' => __('PG/PB'),
//            'singular_name' => __('PG/PB')
//        ),
//        'public' => true,
//        'has_archive' => true,
//        'rewrite' => array('slug' => 'pgpb', 'with-front' => true),
//        )
//    );
//}
//
//add_action('init', 'create_taxonomies', 0);
//
//function create_taxonomies() {
//    // create a new taxonomy
//    register_taxonomy(
//        'tax_models', array('acme_model'), array(
//        'labels' => array(
//            'name' => _x('Model Categories', 'taxonomy general name'),
//            'singular_name' => __('Models Category'),
//            'menu_name' => __('Model Categories'),
//        ),
//        'hierarchical' => true,
//        )
//    );
//
//    register_taxonomy(
//        'tax_pgpb', array('acme_pg-pb'), array(
//        'labels' => array(
//            'name' => _x('PG/PB Categories', 'taxonomy general name'),
//            'singular_name' => __('PG/PB Category'),
//            'menu_name' => __('PG/PB Categories'),
//        ),
//        'hierarchical' => true,
//        )
//    );
//}


add_theme_support('news-thumbnails');
set_post_thumbnail_size(100, 100);

add_theme_support('profile-thumbnails');
set_post_thumbnail_size(212, 204);

function custom_pagination($numpages = '', $pagerange = '', $paged = '') {

    if (empty($pagerange)) {
        $pagerange = 2;
    }

    /**
     * This first part of our function is a fallback
     * for custom pagination inside a regular loop that
     * uses the global $paged and global $wp_query variables.
     * 
     * It's good because we can now override default pagination
     * in our theme, and use this function in default quries
     * and custom queries.
     */
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if (!$numpages) {
            $numpages = 1;
        }
    }

    /**
     * We construct the pagination arguments to enter into our paginate_links
     * function. 
     */
//    $page_link = get_pagenum_link(1);
//    $base_link = get_pagenum_link(1) . '%_%';
//    if(strpos($page_link, '?')) {
//        $base_link = get_pagenum_link(1) . '&%_%';
//    } else {
//        $base_link = get_pagenum_link(1) . '?%_%';
//    }
    
    $pagination_args = array(
        'base' => preg_replace('/\?.*/', '/', get_pagenum_link(1)) . '%_%',
        'format' => 'page/%#%',
        'total' => $numpages,
        'current' => max(1, get_query_var('paged')),
        'show_all' => False,
        'end_size' => 1,
        'mid_size' => $pagerange,
        'prev_next' => True,
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'type' => 'plain',
        'add_args' => false,
        'add_fragment' => ''
    );

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
        echo "<nav class='custom-pagination'>";
        echo "<span class='page-numbers page-num'>" . __("[:en]Page&nbsp;[:vi]Trang&nbsp;") . $paged .  __("[:en]&nbsp;of&nbsp;[:vi]&nbsp;trên&nbsp;") . $numpages . "</span> ";
        echo $paginate_links;
        echo "</nav>";
    }
}
function my_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_flush_rewrite_rules' );


//SEARCH CONDITION
$search_condition = array(
    'height' => array(
		0 => '[:en]Choose height [:vi]Chọn chiều cao',
		1 => '[:en]Under 1.60m [:vi]Dưới 1.60m',
		2 => '[:en]1.60m - 1.70m [:vi]1.60m - 1.70m',
		3 => '[:en]1.70m [:vi]1.80m',
		4 => '[:en]Over 1.80m [:vi]Trên 1.80m',
    ), 
    'age' => array(
		0 => '[:en]Choose age [:vi]Chọn tuổi',
		1 => '[:en]Under 20 years old [:vi]Dưới 20 tuổi',
		2 => '[:en]20 - 25 years old [:vi]20 - 25 tuổi',
		3 => '[:en]25 - 30 years old [:vi]25 - 30 tuổi',
		4 => '[:en]Over 30 years old [:vi]Trên 30 tuổi',
    )
);


function build_query_search($gender = null, $height = null, $age = null) {
    $meta_query = array('relation' => 'AND');
    echo $gender;
    echo $height;
    echo $age;
    if ($gender != null) {
        switch ($gender) {
            case 'female' :
                array_push($meta_query, array(
                    'key'		=> 'model_gender',
                    'value'		=> 'female',
                    'compare'	=> '='
                ));
                break;
            case 'male' :
                array_push($meta_query, array(
                    'key'		=> 'model_gender',
                    'value'		=> 'male',
                    'compare'	=> '='
                ));
                break;
        }
    }
    
    if ($height != null) {
        switch ($height) {
            case 1: 
                array_push($meta_query, array(
                    'key'		=> 'model_height',
                    'value'		=> 160,
                    'compare'	=> '<='
                ));
                break;
            case 2:
                array_push($meta_query, array(
                    'key'		=> 'model_height',
                    'value'		=> array(160, 170),
                    'compare'	=> 'BETWEEN'
                ));
                break;
            case 3:
                array_push($meta_query, array(
                    'key'		=> 'model_height',
                    'value'		=> array(170, 180),
                    'compare'	=> 'BETWEEN'
                ));
                break;
            case 4:
                array_push($meta_query, array(
                    'key'		=> 'model_height',
                    'value'		=> 180,
                    'compare'	=> '>='
                ));
                break;
        }
    }
    
    if ($age != null) {
        switch ($age) {
            case 1: 
                $max = strval((intval(date('Y')) - 20)) . '1231';
                array_push($meta_query, array(
                    'key'		=> 'model_birthday',
                    'value'		=> $max,
                    'compare'	=> '<=', 
                    'type'      => 'DATE'
                ));
                break;
            case 2:
                $min = strval((intval(date('Y')) - 25)) . '0101';
                $max = strval((intval(date('Y')) - 20)) . '1231';
                array_push($meta_query, array(
                    'key'		=> 'model_birthday',
                    'value'		=> array($min, $max),
                    'compare'	=> 'BETWEEN', 
                    'type'      => 'DATE'
                ));
                break;
            case 3:
                $min = strval((intval(date('Y')) - 30)) . '0101';
                $max = strval((intval(date('Y')) - 25)) . '1231';
                array_push($meta_query, array(
                    'key'		=> 'model_birthday',
                    'value'		=> array($min, $max),
                    'compare'	=> 'BETWEEN', 
                    'type'      => 'DATE'
                ));
                break;
            case 4:
                $min = strval((intval(date('Y')) - 30)) . '0101';
                array_push($meta_query, array(
                    'key'		=> 'model_birthday',
                    'value'		=> $min,
                    'compare'	=> '>=', 
                    'type'      => 'DATE'
                ));
                break;
        }
    }
    
    return $meta_query;
}

function upload_custom_post($arg = null) {
    $post = array(
        'post_title' => $arg['fullname'],
        'post_status' => 'pending', 
        'post_type' => $arg['custom_post']
    );
    
    $post_id = wp_insert_post( $post );
    
    if ($arg['custom_post'] == 'models') {
        wp_set_object_terms( $post_id, $arg['taxo']['term'], $arg['taxo']['tax']);
    }
    
    // Birthday
    update_field("field_569e3332a975e", $arg['birthday'], $post_id);
    
    // Status
    update_field("field_569e337aa975f", $arg['status'], $post_id);
    
    // Gender
    update_field("field_569e33f8a9760", $arg['gender'], $post_id);
    
    // Address
    update_field("field_569e342fa9761", $arg['address'], $post_id);
    
    // Email
    update_field("field_569e3464a9762", $arg['email'], $post_id);
    
    // Facebook
    update_field("field_569e348fa9763", $arg['facebook'], $post_id);
    
    // Tel
    update_field("field_569e34c4a9764", $arg['tel'], $post_id);
    
    // Height
    update_field("field_569e34efa9765", $arg['height'], $post_id);
    
    // Weight
    update_field("field_569e3543a9766", $arg['weight'], $post_id);
    
    // Body 1
    update_field("field_569e3596a9767", $arg['body1'], $post_id);
    
    // Body 2
    update_field("field_569e3609a9768", $arg['body2'], $post_id);
    
    // Body 3
    update_field("field_569e3625a9769", $arg['body3'], $post_id);
    
    // Background
    update_field("field_569e3653a976a", $arg['background'], $post_id);
    
    // Language
    update_field("field_569e3685a976b", $arg['language'], $post_id);
    
    // Exp
    update_field("field_569e36a9a976c", $arg['exp'], $post_id);
    
    return $post_id;
}

function kv_handle_attachment($file_handler, $post_id, $set_thu = false) {
	// check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	$attach_id = media_handle_upload( $file_handler, $post_id );

         // If you want to set a featured image frmo your uploads. 
	if ($set_thu) set_post_thumbnail($post_id, $attach_id);
	return $attach_id;
}
add_filter('addthis_post_exclude', 'my_addthis_post_exclude_filter');
function my_addthis_post_exclude_filter($display)
{
if ( in_array(get_post_type(), array('models', 'pgpb')) )
    $display = true;

return $display;
}



