<?php
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
?>
<?php get_header(); ?>
<div class="grid_17 alpha">
    <div class="entry clearfix">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="page-title"><?php the_title(); ?></h1>			
    <?php the_content(); ?>
    <?php endwhile; ?>
    <?php endif; ?>	    
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>