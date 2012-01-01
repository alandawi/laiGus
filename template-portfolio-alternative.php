<?php
/*
Template Name: Portfolio Alternative
*/
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
$options = get_option( 'laigus_theme_settings' );
?>
<?php get_header(); ?> 
<div class="entry clearfix">

	<?php global $wp_query;
	$wp_query = new WP_Query("post_type=Portfolio&post_status=publish"); ?>
	<?php while (have_posts()) : the_post(); ?>

	<div class="item-portfolio-alternative grid_8 alpha">

		<div class="preview">
			<a href="<?php the_permalink(); ?>"><img width="290" height="150" alt="<?php the_title(); ?>" src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php getImage('1'); ?>&w=290&h=150&zc=1" class="box-img"></a>
		</div>

		<div class="item-details">
			<h3><?php the_title(); ?></h3>
			<p><?php the_excerpt(); ?></p>
		</div>
		<div class="clear"></div>
	</div>

	<?php endwhile; ?>

</div>
<?php get_footer(); ?>