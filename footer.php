<?php
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
$options = get_option( 'laigus_theme_settings' );
?>
</div>
</div>
<div id="copyright-wrap">
    <div id="copyright" class="container_24">

    <?php 
		if (get_option('lG_footer_text')) {
			echo get_option ('lG_footer_text');
	?>
	<?php } else { ?>
	&copy; <?php echo date('Y'); ?>  <?php bloginfo( 'name' ) ?>
	~ Developed by <a href="http://www.alandawi.com.ar/" title="Portfolio Alan Gabriel Dawidowicz" target="_blank">Alandawi</a>
	<?php } ?>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>