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
            <div class="post-meta">
            <span class="meta-date"><?php the_time('j'); ?> <?php the_time('M'); ?>, <?php the_time('Y'); ?></span>
            <span class="meta-category">Category: <?php the_category(' '); ?></span>
        </div>

		<?php the_content(); ?>
        <div class="clear"></div>
		<?php endwhile; ?>
		<?php endif; ?>	
        
        <?php wp_link_pages('before=<div id="post-page-navigation">&after=</div>'); ?>
         
    </div>

    <?php
        global $options;
        foreach ($options as $value) {
            if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
            else { $$value['id'] = get_option( $value['id'] ); }
        }
    ?>

    <?php if ($lG_share_box == "true") {?>
         <div id="post-social" class="clearfix entry">
			<h4>Share this news:</h4>

            <div class="share-box"><a title="Facebook" target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>"><img src="<?php bloginfo('template_url');?>/images/social/facebook.png" alt="Share in Facebook" /></a></div>
        
            <div class="share-box"><a title="StumbleUpon" target="_blank" href="http://www.stumbleupon.com/submit?url=<?php the_permalink() ?>"><img src="<?php bloginfo('template_url');?>/images/social/stumbleupon.png" alt="Share in StumbleUpon" /></a></div>
        
            <div class="share-box"><a title="Twitter" target="_blank" href="http://twitter.com/home?status=Currently%20reading%20<?php the_permalink() ?>"><img src="<?php bloginfo('template_url');?>/images/social/twitter.png" alt="Share in Twitter" /></a></div>

            <div class="share-box"><a title="Digg" target="_blank" href="http://digg.com/submit?url=<?php the_permalink() ?>"><img src="<?php bloginfo('template_url');?>/images/social/digg.png" alt="Share in Digg" /></a></div>

            <div class="share-box"><a title="Reddit" target="_blank" href="http://reddit.com/submit?url=<?php the_permalink() ?>"><img src="<?php bloginfo('template_url');?>/images/social/reddit.png" alt="Share in Reddit" /></a></div>
        
            <div class="share-box"><a title="Delicious" target="_blank" href="http://del.icio.us/post?url=<?php the_permalink() ?>"><img src="<?php bloginfo('template_url');?>/images/social/delicious.png" alt="Share in Delicious" /></a></div>
        
            <div class="share-box"><a title="Linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><img src="<?php bloginfo('template_url');?>/images/social/linkedin.png" alt="Share in Linkedin" /></a></div>
        
            <div class="share-box"><a title="Technorati" target="_blank" href="http://technorati.com/faves?add=<?php the_permalink() ?>"><img src="<?php bloginfo('template_url');?>/images/social/technorati.png" alt="Share in Technorati" /></a></div>
       	</div>
        <?php }?>
        
	<?php comments_template(); ?>
</div>
       
<?php get_sidebar(); ?>
<?php get_footer(); ?>