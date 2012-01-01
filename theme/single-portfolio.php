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

        <h1><?php the_title(); ?></h1>


		<?php the_content(); ?>
        <div class="clear"></div>
		<?php endwhile; ?>
        <?php endif; ?>        
        
    </div>

</div>       
<?php include ("sidebar-portfolio.php"); ?>
<?php get_footer(); ?>