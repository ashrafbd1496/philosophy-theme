<?php

require_once get_theme_file_path( '/inc/tgm.php');

//check the version of css and js
if ( site_url() =='http://127.0.0.1/wordpress'){
	define('VERSION', time() );
}else{
	defined('VERSION',wp_get_theme()->get('Version'));
}
function philosophy_after_setup(){
	load_theme_textdomain( 'philosophy');
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
	add_theme_support('html5',array('search-form','comment-list'));
	add_theme_support('post-formats',array('image','gallery','quote','audio','video','link'));
	add_editor_style('/assets/css/editor-style.css');
	//Register Menu
	register_nav_menu( 'topmenu',__('Top Menu','philosophy'));
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
	wp_enqueue_script('main-js',get_theme_file_uri('/assets/js/main.js'),array('jquery'),1.0,true);
}
add_action( 'wp_enqueue_scripts','philosophy_assets');