<?php
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
$options = get_option( 'laigus_theme_settings' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>

<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta http-equiv="author" content="<?php if (get_option('lG_authortext')) { echo get_option('lG_authortext'); } ?>" />
<meta http-equiv="contact" content="<?php if (get_option('lG_contacttext')) { echo get_option('lG_contacttext'); } ?>" />
<meta name="keywords" content="<?php if (get_option('lG_keywordstext')) { echo get_option('lG_keywordstext'); } ?>" />
    

<link rel="icon" type="image/png" href="<?php bloginfo('template_url') ?>/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />


<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<script type="text/javascript" charset="utf-8">
jQuery(function($){
	$(document).ready(function(){
	$('ul.sf-menu').supersubs({
		minWidth:    16,
		maxWidth:    40,
		extraWidth:  1
     })
    	.superfish();
	});
});
</script>

<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/includes/nivo/themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/includes/nivo/nivo-slider.css" type="text/css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/includes/nivo/jquery.nivo.slider.pack.js"></script>

<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        effect: 'boxRainGrow',
        animSpeed: 500,
        pauseTime: 3000,
        controlNav: true,
        keyboardNav: true,
        pauseOnHover: true,
        manualAdvance: false,
        captionOpacity: 0.8,
        prevText: 'Prev',
        nextText: 'Next',
        randomStart: false,
        beforeChange: function(){},
        afterChange: function(){},
        slideshowEnd: function(){},
        lastSlide: function(){},
        afterLoad: function(){}
    });
});
</script>

</head>
<body <?php body_class($class); ?>>

<div id="wrap" class="container_24 clearfix">
    <div id="header" class="clearfix">
        <div id="logo">
            <a href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('template_url') ?>/images/logo.png" alt="<?php bloginfo('name') ?>" /></a>
        </div>        
    </div>
    <div id="navigation" class="clearfix">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'main nav',
                    'sort_column' => 'menu_order',
                    'menu_class' => 'sf-menu',
                    'fallback_cb' => 'default_menu'
                )); ?>
    </div>   
    
   	<?php if (is_front_page()) { ?>
        <div id="featured">
          <div class="slider-wrapper theme-default">
              <div id="slider" class="nivoSlider">
                <?php global $wp_query;
                $wp_query = new WP_Query("post_type=Portfolio&post_status=publish&posts_per_page=4"); ?>
                <?php while (have_posts()) : the_post(); ?>
                  <a href="<?php the_permalink(); ?>"><img width="960" height="300" alt="<?php the_title(); ?>" src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php getImage('1'); ?>&w=960&h=300&zc=1" class="box-img" title="<?php the_title(); ?>" /></a>
                <?php endwhile; ?>
              </div>
            </div>
        </div>
    <?php } ?>

<div id="main" class="container_24">