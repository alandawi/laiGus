<?php
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
?>
<div id="sidebar" class="grid_8 alpha omega">  

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Portfolio') ) : ?>
		
		<div class="sidebar-box clearfix">
		
			<h4>Last Works:</h4>

			<?php global $wp_query;
			$wp_query = new WP_Query("post_type=Portfolio&post_status=publish&posts_per_page=4"); ?>
			<?php while (have_posts()) : the_post(); ?>

			<a href="<?php the_permalink(); ?>"><img width="249" height="100" alt="<?php the_title(); ?>" src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php getImage('1'); ?>&w=249&h=100&zc=1" class="box-img"></a>

			<?php endwhile; ?>
			<?php endif; ?>
		</div>
			
</div>