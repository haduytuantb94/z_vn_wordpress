<?php define( 'NEWSUP_THEME_DIR', get_template_directory() . '/' );
	define( 'NEWSUP_THEME_URI', get_template_directory_uri() . '/' );
	define( 'NEWS_THEME_SETTINGS', 'newsup-settings' );
	
	
	$newsup_theme_path = get_template_directory() . '/inc/ansar/';

	require( $newsup_theme_path . '/newsup-custom-navwalker.php' );
	require( $newsup_theme_path . '/default_menu_walker.php' );
	require( $newsup_theme_path . '/font/font.php');
	require( $newsup_theme_path . '/template-tags.php');
	require( $newsup_theme_path . '/template-functions.php');
	require( $newsup_theme_path. '/widgets/widgets-common-functions.php');
	require ( $newsup_theme_path . '/custom-control/custom-control.php');
	require_once( trailingslashit( get_template_directory() ) . 'inc/ansar/customize-pro/class-customize.php' );

	$newsup_theme_start = wp_get_theme();
	if (( 'Newsup' == $newsup_theme_start->name) || ( 'Newsberg' == $newsup_theme_start->name) || ( 'Newsbulk' == $newsup_theme_start->name) || 
		( 'Newslay' == $newsup_theme_start->name) || ( 'Foodup' == $newsup_theme_start->name) || ( 'News Live' == $newsup_theme_start->name) || 
		( 'Mag Dark' == $newsup_theme_start->name) || ( 'News Talk' == $newsup_theme_start->name) || ( 'News Way' == $newsup_theme_start->name) || ( 'News Bit' == $newsup_theme_start->name) || ( 'News Maz' == $newsup_theme_start->name))  {
	if ( is_admin() ) {
		require ($newsup_theme_path . '/admin/getting-started.php');
	}
	}

	// Theme version.
	$newsup_theme = wp_get_theme();
	define( 'NEWSUP_THEME_VERSION', $newsup_theme->get( 'Version' ) );
	define ( 'NEWSUP_THEME_NAME', $newsup_theme->get( 'Name' ) );

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $newsup_theme_path .'/enqueue.php');
	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */
	require( $newsup_theme_path . '/customize/customizer.php');

	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */

	require( $newsup_theme_path  . '/widgets/widgets-init.php');

	/* ----------------------------------------------------------------------------------- */
	/* Widget */
	/* ----------------------------------------------------------------------------------- */

	require( $newsup_theme_path  . '/hooks/hooks-init.php');
	
	require_once( trailingslashit( get_template_directory() ) . 'inc/ansar/customize-pro/class-customize.php' );

if ( ! function_exists( 'newsup_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function newsup_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on newsup, use a find and replace
	 * to change 'newsup' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'newsup', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/* Add theme support for gutenberg block */
	add_theme_support( 'align-wide' );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary menu', 'newsup' ),
        'footer' => esc_html__( 'Footer menu', 'newsup' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	$args = array(
    'default-color' => '#eee',
    'default-image' => '',
	);
	add_theme_support( 'custom-background', $args );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');

     // Woocommerce Gallery Support
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

    // Added theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	remove_theme_support( 'widgets-block-editor' );
	
	//Custom logo
	add_theme_support(
    'custom-logo',
    array(
        'unlink-homepage-logo' => true, // Add Here!
    	)
	);
	
	// custom header Support
			$args = array(
			'default-image'		=>  get_template_directory_uri() .'/images/head-back.jpg',
			'width'			=> '1600',
			'height'		=> '600',
			'flex-height'		=> false,
			'flex-width'		=> false,
			'header-text'		=> true,
			'default-text-color'	=> 'fff',
			'wp-head-callback'       => 'newsup_header_color',
		);
		add_theme_support( 'custom-header', $args );
	

}
endif;
add_action( 'after_setup_theme', 'newsup_setup' );


	function newsup_the_custom_logo() {
	
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}

	}

	add_filter('get_custom_logo','newsup_logo_class');


	function newsup_logo_class($html)
	{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newsup_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newsup_content_width', 640 );
}
add_action( 'after_setup_theme', 'newsup_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newsup_widgets_init() {
	
	$newsup_footer_column_layout = esc_attr(get_theme_mod('newsup_footer_column_layout',3));
	
	$newsup_footer_column_layout = 12 / $newsup_footer_column_layout;
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'newsup' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-wid-title"><h6>',
		'after_title'   => '</h6></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front-page Content Section', 'newsup'),
		'id'            => 'front-page-content',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="newsup-front-page-content-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-sec-title"><h4>',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front-page Sidebar Section', 'newsup'),
		'id'            => 'front-page-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-wid-title"><h6>',
		'after_title'   => '</h6></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'newsup' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-'.$newsup_footer_column_layout.' col-sm-6 rotateInDownLeft animated mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );

}
add_action( 'widgets_init', 'newsup_widgets_init' );

//Editor Styling 
add_editor_style( array( 'css/editor-style.css') );


add_filter('wp_nav_menu_items', 'newsup_add_home_link', 1, 2);
function newsup_add_home_link($items, $args){
    if( $args->theme_location == 'primary' ){
		$item = '<li class="active home"><a class="homebtn" href="'. esc_url( home_url() ) .'">' . "<span class='fas fa-home'></span>" . '</a></li>';
        $items = $item . $items;
    }
    return $items;
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/*
 * hoc viet Plugin Wordpress
 * ha_duy_tuan
 *
 */
/** Su dung Action Hook (add_action) */
if(!function_exists('duytuan_funtion_action')){
    function duytuan_funtion_action(){ ?>
       <p style="color:#fff;" class="duytuan_add_action">Xin chao toi la Ha Duy Tuan</p>
   <?php }
}
add_action('newsup_action_banner_advertisement','duytuan_funtion_action');
?>

<?php
/*
 *@cach 1 :Truyen ham callback gian tiep quan function :: duytuan_function_filter()
 */
 /** Su dung Filter **/
  if(!function_exists('duytuan_function_filter')){
	  function duytuan_function_filter(){
		 $name = "Olsen Marvel";
		 return $greeting = "hello, I am ". $name;
	  }
  }
add_filter('duytuan_footer_afilter','duytuan_function_filter');
/*
 * @Cach 2 truyen truc tiep callback vao ham add_filter
 */
add_filter('duytuan_footer_afilter',function (){
	$name = "Olsen NorWay Marvel";
	return $greeting = "hello, I am ". $name;
});
?>

<?php
/** tim chu Hello trong noi dung (content) bai viet va thay bang <b>Hello</b> */
if(!function_exists('duytuan_content_fitler')){
	function duytuan_content_fitler($content){  /** $content la noi dung cua bai viet **/
		echo "duytuan_content_is : ".strtoupper($content);
//		$name = "The Content Filter";
//		return $greeting = "hello, I am ". $name;
		$find = "hello";
		$replace_str = "<b>Hello</b>";
		$content = str_replace($find,$replace_str,$content);
        return $content;  /** Bat buoc phai return bien */
	}
}
add_filter('the_content','duytuan_content_fitler'); /** Moc vao hook `the_content` */

/** -=========================================================== */
define('DIRNAME_DT',dirname(__FILE__));
/** Nhung file stylesheet vao header.php */
function hd_enqueue_style(){
    /**  Lay duong dan url **/
    $uri = get_theme_file_uri();
    /*** cach 1 **/
    wp_register_style('duytuan-style',$uri.'/css/duytuan.css');
    wp_enqueue_style('duytuan-style');
    /** Cach 2 **/
    //wp_enqueue_style('duytuan_style',$uri.'/css/duytuan.css');
}
add_action('wp_enqueue_scripts','hd_enqueue_style');


function hd_config_action() {
	echo "This dirame path is : ".ABSPATH;
}

function hd_enqueue_scripts(){
    $uri = get_theme_file_uri();
    wp_register_script('jquery-script-2','https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
    wp_register_script('duytuan-script',$uri.'/js/duytuan.js');

    wp_enqueue_script('jquery-script-2');
    wp_enqueue_script('duytuan-script');

    /** Cach nhung thu 2 */
    // wp_enqueue_script('jquery-script-2','https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
}
add_action('config-action-hd','hd_config_action');
?>


<?php


?>




