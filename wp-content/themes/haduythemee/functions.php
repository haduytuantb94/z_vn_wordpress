<?php 
/**
 * @Khai bao hang gia tri:
 * @THEME_URL Lay duong dan thu muc Theme
 * @CORE Lay duong dan cua thu muc /core
 * 
 * */
define('THEME_URL',get_stylesheet_directory());
define('CORE',THEME_URL.'/core');

/**
 * @Nhung file core/init.php
 * 
 * */
require_once(CORE.'/init.php');

/**
 * Thiet lap chieu rong noi dung
 * */

if(!isset($content_with)) {
	$content_with = 680;
}
/**
 * Khai bao chuc nang trong theme
 * */
if(!function_exists('haduythemee_setup')) {
	function hdtheme_setup(){
		//setup textdomain
         $language_folder = THEME_URL.'/languages';
         load_theme_textdomain('haduythemee', $language_folder);
         //add RSS to <head></head>
         add_theme_support('automatic-feed-links');
         //add post thumnail
         add_theme_support('post-thumbnails');
         //post format
         add_theme_support('post-formats',array('aside', 'gallery','link ','image','quote','status','video','audio','chat'));
         //add theme title-tag
         add_theme_support('title-tag');
         //add custom background
         $default_background = array('default-color' => '#e8e8e8');
         add_theme_support('custom-background',$default_background);
         //add custom color
         add_theme_support('custom-header');
         add_theme_support('custom-line-height');
         add_theme_support('custom-logo');
         add_theme_support('customize-selective-refresh-widgets');
         add_theme_support('custom-spacing');
         add_theme_support('custom-units');
         add_theme_support('dark-editor-style');
         add_theme_support('featured-content');
         // add_theme_support('html5');
         add_theme_support('menus');
         add_theme_support('responsive-embeds');
         add_theme_support('starter-content');
         add_theme_support('wp-block-styles');
         add_theme_support('widgets');
         add_theme_support('widgets-block-editor');
         //add menu:
         register_nav_menus(array('primary_menu' => __( 'Primary Menu', 'haduythemee')));
         //add sidebar
         $sidebar = array(
          'name'         => __('Main Sidebar','haduythemee'),
          'id'           => 'main-sidebar',
          'description'  => __('Default Sidebar','haduythemee'),
          'class'        => 'main-sidebar',
          'before-title' => '<h3 class="wiget_title">',
          'after-title'  => '</h3>'
         );
         register_sidebar($sidebar);
	}
    add_action('init','hdtheme_setup');
}

if(!function_exists('haduy_header')) {
	function haduy_header() {
		 if(is_home()) {

           	printf('<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
           		get_bloginfo('url'), 
           		get_bloginfo('description'),
           		get_bloginfo('sitename') );
            } else {
            printf('<p><a href="%1$s" title="%2$s">%3$s</a></p>',
            	get_bloginfo('url'),
            	get_bloginfo('description'), 
            	get_bloginfo('sitename') );   
	    }
	}
}

//Thiet lap Menu
if(!function_exists('haduy_menu')) {
	function haduy_menu($menu){
       $menu = array(
          'theme_location'    => $menu,
          'container'         => 'nav',
          'container_class'   => $menu
       );
       	wp_nav_menu($menu);
	}
}
//ham tao phan trang don gian :
if(!function_exists('haduy_pagination')) {
	function haduy_pagination (){ 
		if($GLOBALS['wp_query']->max_num_pages < 2) {
			return '';
		}else { ?>
         <nav class="pagigation" role="navigation"></nav>
         <?php if(get_next_posts_link()) { ?>
            <div class="next"><?php next_posts_link(__('Older posts','haduythemee')); ?></div>
            <?php if(get_previous_posts_link()){ ?>
               <div class="prev"><?php previous_posts_link(__('Previous posts','haduythemee')); ?></div>
            <?php } ?>
        <?php }  ?>
	<?php	}
	}
}
//Ham hien thi thumbnail
if(!function_exists('haduy_thumbnail')){
    function haduy_thumbnail($size){
        if( !is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')){ ?>
            <figure class="post-thumbnail">
            	<?php the_post_thumbnail($size); ?>
            </figure> 
        <?php }
    }
}
//Ham hien thi header post:
if(!function_exists('haduy_entry_header')){
   function haduy_entry_header(){
       if(is_home()) { ?>
        <h1><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
      <?php }else{ ?>
        <h2><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
      <?php }
   }
}
//Ham hien thi meta post:

if(!function_exists('haduy_entry_meta')){
   function haduy_entry_meta(){
        if(!is_page()) { ?>
           <div class="entry-meta">
           	    <?php 
	           	printf(__('<span class="author">Posted by %1$s</span> ','haduythemee'),get_the_author()); 
	            printf(__('<span class="date-published">at %1$s</span> ','haduythemee'),get_the_date());
	            printf(__('<span class="category">at %1$s</span1> ','haduythemee'),get_the_category_list(','));
                if(comments_open()) {
                	echo '<span class="meta-reply">';
                	comments_popup_link(
                    __('Leave a comment','haduythemee'),
                    __('One comment','haduythemee'),
                    __('% comment'),
                    __('Read all comments')
                	);
                    echo '</span>';
                }
           	  ?>
           </div>
      <?php }
    }
}
//Ham hien noi dung cua post/page :
if(!function_exists('haduy_entry_content')){
   function haduy_entry_content(){
      if(!is_single() && !is_page()) {
      	the_excerpt();
      }else {
      	the_content();
      	//phan trang trong single
      	$link_pages = array(
      		'before'            => __('<p>Page: ','haduythemee'), 
            'after'             => '</p>',
            'nextpagelink'      => __('Next page','haduythemee'),
            'previouspagelink'  => __('Previous page','haduythemee')
      	);
      }
   }
}

//Ham hien thi tag cua post :
if(!function_exists('haduy_entry_tag')){
   function haduy_entry_tag(){
      if(has_tag()) {
         echo '<div class="entry-tag">';
         printf(__('Tagged in %1$s','haduythemee'),get_the_tag_list('',','));
         echo '</div>';
      }
   }
}

// add theme script :
if(!function_exists('haduy_enqueue_styles')) {
    function haduy_enqueue_styles() {
        //css :
        // wp_enqueue_style('hd_boostrap_css',get_template_directory_uri().'/assets/css/bootstrap.min.css');
        wp_enqueue_style('hd_jquery_ui_css',get_template_directory_uri().'/assets/css/jquery-ui.min.css');
        wp_enqueue_style('hd_select2_ui_css',get_template_directory_uri().'/assets/css/select2.min.css');
        wp_enqueue_style('hd_style_css',get_template_directory_uri().'/style.css');
        wp_enqueue_style('hd_style_css',get_template_directory_uri().'/assets/css/header.css');
        wp_enqueue_style('hd_style_css',get_template_directory_uri().'/assets/css/footer.css');
    }
}
if(!function_exists('haduy_enqueue_scripts')) {
    function haduy_enqueue_scripts() {
        wp_enqueue_script('hd_jquery_js',get_template_directory_uri().'/assets/js/jquery.min.js');
        wp_enqueue_script('hd_boostrap_js',get_template_directory_uri().'/assets/js/bootstrap.min.js');
        wp_enqueue_script('hd_jquery_ui_css',get_template_directory_uri().'/assets/js/jquery-ui.min.js');
        wp_enqueue_script('hd_select2_js',get_template_directory_uri().'/assets/js/select2.min.js');
        wp_enqueue_script('hd_lazyload_js',get_template_directory_uri().'/assets/js/lazyload.min.js');
        wp_enqueue_script('hd_app_js',get_template_directory_uri().'/assets/js/app.js');
    }
}
add_action('wp_enqueue_scripts','haduy_enqueue_styles');
add_action('wp_footer','haduy_enqueue_scripts');

?>
















