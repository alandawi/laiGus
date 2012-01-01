<?php
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
?>
<?php get_header(' '); ?>
<div id="post" class="grid_17 alpha">
		<?php if (have_posts()) : ?>
        	 <div class="entry clearfix">
				<h1 id="archive-title">Search Results For: <?php the_search_query(); ?></h1>
            </div>

		<?php get_template_part( 'post' , 'entry') ?>
        
        <?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
        
		<?php else : ?>
         <div class="entry clearfix">
			<h1 id="archive-title">Search Results For "<?php the_search_query(); ?>"</h1>
            <div id="sub-description">
				<p>Sorry, nothing found for that search</p>
        	</div>
        </div>

        <?php endif; ?>
</div>
<?php get_sidebar(' '); ?>		  
<?php get_footer(' '); ?>