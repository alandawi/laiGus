<?php
/*
Template Name: Portfolio
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

	<div class="item-portfolio">
		<div class="preview two-third">
			<img width="590" height="230" alt="<?php the_title(); ?>" src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php getImage('1'); ?>&w=590&h=230&zc=1" class="box-img">
		</div>

		<div class="item-details one-third last">
			<h3><?php the_title(); ?></h3>
			<p><?php the_excerpt(); ?></p>
			<a href="<?php the_permalink(); ?>" class="button">VIEW PROYECT</a>
		</div>
		<div class="clear"></div>
	</div>

	<div class="separator-line"></div>

	<?php endwhile; ?>

</div>
<?php get_footer(); ?>