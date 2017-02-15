<?php

function awesome_script_enqueue() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('uikit', get_template_directory_uri() . '/css/uikit.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('uikit_css_slideshow', get_template_directory_uri() . '/css/slideshow.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('uikit_css_slider', get_template_directory_uri() . '/css/slider.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');

    wp_enqueue_script('my_jquery', get_template_directory_uri() . '/js/jquery-1.12.4.min.js', array(), '1.12.4', true);
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6', true);
    wp_enqueue_script('UiKit_js', get_template_directory_uri() . '/js/uikit.min.js', array(), '1.0.0', true);
    wp_enqueue_script('UiKit_slideshow', get_template_directory_uri() . '/js/slideshow.min.js', array(), '1.0.0', true);
    wp_enqueue_script('UiKit_slideshow_fx', get_template_directory_uri() . '/js/slideshow-fx.min.js', array(), '1.0.0', true);
    wp_enqueue_script('UiKit_slider_js', get_template_directory_uri() . '/js/slider.min.js', array(), '1.0.0', true);
    
    wp_enqueue_script('myscript_js', get_template_directory_uri() . '/js/script.js', array(), '1', true);
    //wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDS23LOuwI9Ar-5m08oB9qf8kqXw4PbEOs&callback=initMap', array(), '1', true);
    wp_localize_script('myscript_js', 'ajaxurl', admin_url( 'admin-ajax.php' ));
}
add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue');

/*
	==========================================
	 Activate menus
	==========================================
*/

function awesome_theme_setup() {
	
	add_theme_support('menus');	
	register_nav_menu('header', 'Header Navigation');
	register_nav_menu('footer', 'Footer Navigation');
}

add_action('init', 'awesome_theme_setup');


function create_post_type() {
	register_post_type( 'Slider',
		array(
		  'labels' => array(
		    'name' => __( 'SlideShow' )
		  ),
		  'public' => true,
		  'supports' => array('title',  'thumbnail'),
		)
	);
        register_post_type( 'sponsors',
		array(
		  'labels' => array(
		    'name' => __( 'Sponsors' )
		  ),
		  'public' => true,
		  'supports' => array('title',  'thumbnail'),
		)
	);
}
add_action( 'init', 'create_post_type' );

add_theme_support( 'post-thumbnails', array( 'page', 'post', 'slider', 'sponsors' ) );
//set_post_thumbnail_size( 300, 300 );

/*ajax perform*/
add_action( 'wp_ajax_search_document', 'search_document' );
add_action( 'wp_ajax_nopriv_search_document', 'search_document' );


function search_document() {
	$keyword = $_POST['keyword'];
	$year = $_POST['year'];
	$month = $_POST['month'];
        $home = $_POST['home'];
	$args = array(
	    'post_type' => 'document',	
	    's' => $keyword,
	    'date_query' => array(
			array(
				'year'  => $year,
				'month' => $month,
				//'day'   => 12,
			),
		),
		'post_status'=> array( 'publish','future'),
		'orderby' => 'date',
		'order'  => 'DESC'   
	);
        if ($home == 'ok') {require_once 'inc/result_search.php';}
        else {require_once 'inc/result_search_interne.php';}
	//print_r($ajax_query);
	die();
}

function site_router(){ 
    $root = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
    $url = str_replace($root, '', $_SERVER['REQUEST_URI']);
    $url = explode('/', $url);
    if(count($url) == 1 && ($url[0] == 'frnews' || $url[0] == 'ennews' )){
        require 'single-actualite.php';
        die();
    }
}
add_action('send_headers', 'site_router');



function excerpt($limit) {
 $excerpt = explode(' ', get_the_excerpt(), $limit);
 if (count($excerpt)>=$limit) {
 array_pop($excerpt);
 $excerpt = implode(" ",$excerpt).'...';
 } else {
 $excerpt = implode(" ",$excerpt);
 }
 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
 return $excerpt;
}
