<?php

require_once get_theme_file_path( '/inc/tgm.php');
require_once get_theme_file_path( '/inc/attachments.php');
//require_once get_theme_file_path( '/widgets/social-icons-widget2.php');

if ( ! isset( $content_width ) ) $content_width = 960;
//check the version of css and js
if ( site_url() =='http://127.0.0.1/wordpress'){
	define('VERSION', time() );
}else{
	defined('VERSION',wp_get_theme()->get('Version'));
}
function philosophy_after_setup(){
	load_theme_textdomain( 'philosophy');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo');
	add_theme_support('title-tag');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('html5',array('search-form','comment-list'));
	add_theme_support('post-formats',array('image','gallery','quote','audio','video','link'));
	add_editor_style('/assets/css/editor-style.css');
	//Register Menu
	register_nav_menu( 'topmenu',__('Top Menu','philosophy'));

	register_nav_menus(array(
		'footerleftmenu'    =>__('Footer Left Menu','philosophy'),
		'footermiddletmenu'    =>__('Footer Middle Menu','philosophy'),
		'footerrightmenu'    =>__('Footer Right Menu','philosophy'),
	));

	add_image_size("philosophy-post-preview-square",400,400,true);
}
add_action('after_setup_theme','philosophy_after_setup');

function philosophy_assets(){
	//stylesheets
	wp_enqueue_style( 'fontaweseom-css',get_theme_file_uri('/assets/css/font-awesome/css/font-awesome.css'),null,VERSION);
	wp_enqueue_style( 'fonts-css',get_theme_file_uri('/assets/css/fonts.css'),null,1.0);
	wp_enqueue_style( 'base-css',get_theme_file_uri('/assets/css/base.css'),null,1.0);
	wp_enqueue_style( 'vendor-css',get_theme_file_uri('/assets/css/vendor.css'),null,1.0);
	wp_enqueue_style( 'main-css',get_theme_file_uri('/assets/css/main.css'),null,1.0);
	wp_enqueue_style( 'philosophy-css',get_stylesheet_uri());

	//scripts
	wp_enqueue_script('modernizr-js',get_theme_file_uri('/assets/js/modernizr.js'),null,1.0);
	wp_enqueue_script('pace-js',get_theme_file_uri('/assets/js/pace.min.js'),null,1.0);
	wp_enqueue_script('plugins-js',get_theme_file_uri('/assets/js/plugins.js'),array('jquery'),1.0,true);

	if ( is_singular() ) {
		wp_enqueue_script( "comment-reply" );
	}
	wp_enqueue_script('main-js',get_theme_file_uri('/assets/js/main.js'),array('jquery'),1.0,true);
}
add_action( 'wp_enqueue_scripts','philosophy_assets');

function philosophy_pagination(){
	global $wp_query;
	$links= paginate_links(array(
		'current'   =>max(1,get_query_var( 'paged')),
		'total'   =>$wp_query->max_num_pages,
		'type'=>'list',
		'mid_size' => apply_filters('philosophy_pagination_mid_size',3)
	));
	$links = str_replace( "page-numbers", "pgn__num", $links );
	$links = str_replace( "<ul class='pgn__num'>", "<ul>", $links );
	$links = str_replace( "next pgn__num", "pgn__next", $links );
	$links = str_replace( "prev pgn__num", "pgn__prev", $links );
	echo wp_kses_post($links);
}

remove_action( 'term_description','wpautop');

/**
 * Add about page sidebar.
 */
function philosophy_widgets() {
	register_sidebar( array(
		'name'          => __( 'Header Social Icons', 'philosophy' ),
		'id'            => 'header-social',
		'description'   => __( 'Widgets in this area will be shown on home page header.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="header_social %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'About Us Page', 'philosophy' ),
		'id'            => 'about-us',
		'description'   => __( 'Widgets in this area will be shown on about us page.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Contact Page Map Section', 'philosophy' ),
		'id'            => 'contact-map',
		'description'   => __( 'Widgets in this area will be shown on contact page.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Contact Page Information Section', 'philosophy' ),
		'id'            => 'contact-info',
		'description'   => __( 'Widgets in this area will be shown on contact page.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="col-six tab-full %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Before Footer Right Section', 'philosophy' ),
		'id'            => 'before-footer-right',
		'description'   => __( 'before footer right widget.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class=" %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( ' Footer Right Mail Section', 'philosophy' ),
		'id'            => 'footer-right-mail',
		'description'   => __( ' footer right mail widget.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class=" %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( ' Footer Botoom Copyright', 'philosophy' ),
		'id'            => 'footer-bottom-copyright',
		'description'   => __( ' footer bottom copyright widget.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class=" %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'philosophy_widgets' );

function philosophy_search_form(){
	$homedir = home_url('/');
	$label = __('Search for:','philosophy');
	$button_label =__('Search','philosophy');
	$newform = <<<FORM
<form role="search" method="get" class="header__search-form" action="{$homedir}}">
					<label>
						<span class="hide-content">{$label}}</span>
						<input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
					</label>
					<input type="submit" class="search-submit" value="{$button_label}">
				</form>
FORM;
return $newform;
}
add_filter('get_search_form','philosophy_search_form');

function text_before_category_title(){
	echo "<p>Before Title</p>";
}
add_action('philosophy_before_category_title','text_before_category_title');

function text_after_category_title(){
	echo "<p>After Title</p>";
}
add_action('philosophy_after_category_title','text_after_category_title');

function beginning_category_page($category_title){
	if ('Music'==$category_title){
		$visit_count = get_option('category_music');
		$visit_count= $visit_count?$visit_count:0;
		$visit_count++;
		update_option('category_music',$visit_count);
	}
}
add_action('philosophy_category_page','beginning_category_page');

function capital_text($param1, $param2){
	return ucwords($param1).' &#x2192 '.strtoupper($param2);
}
add_filter('philosophy_text','capital_text',10,2);  //here 10 is priority and 2 is param numbers

function pgn_mid_size($size){
	return 5;
}
add_filter('philosophy_pagination_mid_size','pgn_mid_size');

function philosophy_home_banner_class($class_name){
	if ( is_home() ) {
		return $class_name;
	}else{
		return '';
	}

}
add_filter("philosophy_home_banner_class",'philosophy_home_banner_class');