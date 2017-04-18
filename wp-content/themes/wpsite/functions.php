<?php

function awesome_script_enqueue() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('uikit', get_template_directory_uri() . '/css/uikit.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('uikit_css_slideshow', get_template_directory_uri() . '/css/slideshow.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('uikit_css_slider', get_template_directory_uri() . '/css/slider.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('jquery-ui_css', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    
    wp_enqueue_script('my_jquery', get_template_directory_uri() . '/js/jquery-1.12.4.min.js', array(), '1.12.4', true);
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6', true);
    wp_enqueue_script('UiKit_js', get_template_directory_uri() . '/js/uikit.min.js', array(), '1.0.0', true);
    wp_enqueue_script('UiKit_slideshow', get_template_directory_uri() . '/js/slideshow.min.js', array(), '1.0.0', true);
    wp_enqueue_script('UiKit_slideshow_fx', get_template_directory_uri() . '/js/slideshow-fx.min.js', array(), '1.0.0', true);
    wp_enqueue_script('UiKit_slider_js', get_template_directory_uri() . '/js/slider.min.js', array(), '1.0.0', true);
    wp_enqueue_script('countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array(), '1.0.0', true);
    wp_enqueue_script('validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), '1.0.0', true);
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), '1.0.0', true);
    wp_enqueue_script('uikit_lightbox', get_template_directory_uri() . '/js/lightbox.min.js', array(), '1.0.0', true);
    
    wp_enqueue_script('myscript_js', get_template_directory_uri() . '/js/script.js', array(), '1', true);
    if(is_single()){wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDS23LOuwI9Ar-5m08oB9qf8kqXw4PbEOs&callback=initMap', array(), '1', true);}
    if(is_page('contact')){wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDS23LOuwI9Ar-5m08oB9qf8kqXw4PbEOs&callback=initMapContact', array(), '1', true);}
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
add_action( 'wp_ajax_remove_cart', 'remove_cart' );
add_action( 'wp_ajax_nopriv_remove_cart', 'remove_cart' );


function remove_cart() {
	$id = $_POST['id'];
        $myCart = $_SESSION['myCart'];
        unset($myCart[$id]);
        $_SESSION['myCart'] = $myCart;
        echo count($_SESSION['myCart']);
	die();
}

function site_router(){     
    $root = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
    $url = str_replace($root, '', $_SERVER['REQUEST_URI']);
    $url = explode('/', $url);
    if(count($url) == 1 && $url[0] == 'logout'){
        wp_logout();
        header('Location: '.$root);
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

add_action( 'pre_get_posts', function ( $q ) 
{
    if (    !is_admin() // VERY important, targets only front end queries
         && $q->is_main_query() // VERY important, targets only main query
         && $q->is_category() // Which post type archive page to target
    ) {

        $q->set( 'meta_key', 'deals_terminer' );
        $q->set( 'meta_value', 'non' );
        // Rest of your arguments to set
    }
});

function monprefixe_session_start() {
   if ( ! session_id() ) {
      @session_start();
   }
}
 
add_action( 'init', 'monprefixe_session_start', 1 );

function monprefixe_detruire_toutes_variables_session() {
   if ( isset( $_COOKIE[session_name()] ) ) {
      session_unset();   // détruit les variables de session 
      session_destroy();
   }
}
 
add_action( 'wp_logout', 'monprefixe_detruire_toutes_variables_session' );

function my_function_admin_bar($content) {

    return ( current_user_can("administrator") ) ? $content : false;

}

add_filter( 'show_admin_bar' , 'my_function_admin_bar');

function formatHtmlEmail(){
    return 'text/html';
}

add_filter( 'wp_mail_content_type', 'formatHtmlEmail' );