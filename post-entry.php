<?php while (have_posts()) : the_post(); ?>      
<div class="entry">
    <h2 class="entry-title"><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="post-meta">
            <span class="meta-date"><?php the_time('j'); ?> <?php the_time('M'); ?>, <?php the_time('Y'); ?></span>
            <span class="meta-category">Category: <?php the_category(' '); ?></span>
        </div>

        <?php echo excerpt('50'); ?>
</div>
<?php endwhile; ?>