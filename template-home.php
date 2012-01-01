<?php
/*
Template Name: Home
*/
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
$options = get_option( 'laigus_theme_settings' );
?>
<?php get_header(' '); ?>

<div class="entry clearfix">
	<div id="homepage-text">
		<h2>
			<?php if (get_option('lG_maintittle')) {
				echo get_option ('lG_maintittle');
				} else {
					echo "Welcome Text";
				}
			?>
		</h2>
		<p>
			<?php if (get_option('lG_introductiontext')) {
				echo get_option ('lG_introductiontext');
				} else {
					echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce  adipiscing congue facilisis. Praesent vitae orci eros. Quisque  ullamcorper porttitor nisl bibendum sollicitudin. In porta, purus sed  egestas vulputate, velit diam varius lacus, eu varius purus orci vel  tortor.";
				}
			?>
		</p>
	</div>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home - Boxes') ) : ?>

	<div class="grid_8 alpha">
		<img src="<?php bloginfo('template_url') ?>/images/img_home1.jpg" alt="Item" class="special-border" />
		<h4>Custom Post Type Support</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce adipiscing congue facilisis. Praesent vitae orci eros.</p>
	</div>

	<div class="grid_8 alpha">
		<img src="<?php bloginfo('template_url') ?>/images/img_home2.jpg" alt="Item" />
		<h4>Works in all the browsers</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce adipiscing congue facilisis. Praesent vitae orci eros.</p>
	</div>
	<div class="grid_8 alpha omega">
		<img src="<?php bloginfo('template_url') ?>/images/img_home3.jpg" alt="Item" />
		<h4>Handcrafted HTML + CSS</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce adipiscing congue facilisis. Praesent vitae orci eros.</p>
	</div>

	<?php endif; ?>

</div>
        
<?php get_footer(' '); ?>