<?php
/*
Template Name: Full Width
*/
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
$options = get_option( 'laigus_theme_settings' );
?>
<?php get_header(); ?> 
<div class="entry clearfix">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1 class="page-title"><?php the_title(); ?></h1>			
	<?php the_content(); ?>
	<?php endwhile; ?>
	<?php endif; ?>	

</div>
<?php get_footer(); ?>