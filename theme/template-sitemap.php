<?php
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
?>
<?php 
/* Template Name: Sitemap */ 
?>
<?php get_header(); ?>
<div class="grid_17 alpha">
    <div class="entry clearfix">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="page-title"><?php the_title(); ?></h1>			
    
    <h3>Pages</h3>
	    <ul>
	    	<?php wp_list_pages("title_li=" ); ?>
	    </ul>
    
    <h3>Feeds</h3>
        <ul>
            <li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>
            <li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>
        </ul>

    <h3>Portfolio:</h3>
        <ul>
        	<?php $archive_query = new WP_Query('post_type=Portfolio&post_status=publish');
                while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                    <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php endwhile; ?>
        </ul>

    <h3>Categories from Blog:</h3>
	    <ul>
	    	<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?>
	    </ul>

    <h3>All Blog Posts:</h3>
        <ul>
        	<?php $archive_query = new WP_Query('showposts=1000&cat=-8');
                while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                    <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php endwhile; ?>
        </ul>

    <?php endwhile; ?>
    <?php endif; ?>
	</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>