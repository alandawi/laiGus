<?php
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */

define('Library', TEMPLATEPATH . '/panel');
require_once(Library . '/options.php');

include('includes/pagination.php');
include('includes/better-excerpts.php');
include('includes/shortcodes.php');

if ( ! isset( $content_width ) ) 
    $content_width = 620;

add_action('wp_enqueue_scripts','my_theme_scripts_function');

function my_theme_scripts_function() {
	
	global $options;
	
	wp_deregister_script('jquery'); 
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"), false, '1.4.2'); 
	wp_enqueue_script('jquery');
	
	wp_deregister_script('jquery-ui'); 
		wp_register_script('jquery-ui', ("http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"), false, '1.4.2'); 
	wp_enqueue_script('jquery-ui');
		
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js');
	wp_enqueue_script('supersubs', get_template_directory_uri() . '/js/supersubs.js');
}

function new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');


function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );


if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'full-size',  609, 9999, true );
add_image_size( 'image-thumb',  65, 55, true );
add_image_size( 'post-image',  610, 255, true ); 
}

register_nav_menus(
	array(
	'main nav'=>__('Main Nav'),
	)
);

function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );


function default_menu() {
	require_once (TEMPLATEPATH . '/includes/default-menu.php');
}


add_action( 'init', 'create_post_types' );
function create_post_types() {
  register_post_type('portfolio', array(	'label' => 'Portfolio','description' => 'Portfolio Description','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes',),'labels' => array (
  'name' => 'Portfolio',
  'singular_name' => 'Portfolio',
  'menu_name' => 'Portfolio',
  'add_new' => 'Add New',
  'add_new_item' => 'Add New Portfolio',
  'edit' => 'Edit',
  'edit_item' => 'Edit Item',
  'new_item' => 'New Portfolio',
  'view' => 'View',
  'view_item' => 'View Item',
  'search_items' => 'Search Items',
  'not_found' => 'Not Found',
  'not_found_in_trash' => 'Not Found in Trash',
  'parent' => 'Parent Portfolio',
),) );
}

if ( function_exists('register_sidebar') )
{
	register_sidebar(array('name'=>'Sidebar',
		'description' => 'Widgets in this area will be shown in the sidebar.',
		'before_widget' => '<div class="sidebar-box clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array('name'=>'Sidebar Portfolio',
		'description' => 'Widgets in this area will be shown in the sidebar (portfolio).',
		'before_widget' => '<div class="sidebar-box clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
    
    register_sidebar(array('name'=>'Home - Boxes',
    	'description' => 'Widgets in this area will be shown in the Home',
		'before_widget' => '<div class="grid_8 alpha widget %2$s" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
}

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}

function getImage($num) {
global $more;
$more = 1;
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
$image[$i] = $postOutput;
$start=$imgEnd+1;  
 
$cleanF = strpos($image[$num],'src="')+5;
$cleanB = strpos($image[$num],'"',$cleanF)-$cleanF;
$imgThumb = substr($image[$num],$cleanF,$cleanB);
 
}
if(stristr($image[$num],'<img')) { echo $imgThumb; }
$more = 0;
}

function tz_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; }
    </style>';
}
function tz_wp_login_url() {
echo bloginfo('url');
}
function tz_wp_login_title() {
echo get_option('blogname');
}

add_action('login_head', 'tz_custom_login_logo');
add_filter('login_headerurl', 'tz_wp_login_url');
add_filter('login_headertitle', 'tz_wp_login_title');

function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

remove_action('wp_head', 'wp_generator');

function remove_feed_generator() {
return '';
}
add_filter('the_generator', 'remove_feed_generator');

function restrict_access_admin_panel(){
	global $current_user;
	get_currentuserinfo();
	if ($current_user->user_level <  4) {
		wp_redirect( get_bloginfo('url') );
		exit;
	}
}
add_action('admin_init', 'restrict_access_admin_panel', 1);
?>