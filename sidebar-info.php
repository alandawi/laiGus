<?php
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
?>
<div id="sidebar" class="grid_8 alpha omega">
		
		<div class="sidebar-box clearfix">
			<h4>Get in Touch:</h4>
			<div class="contact-icon">
				<a href="<?php if (get_option('lG_facebook')) {
				 echo get_option('lG_facebook');
				 }else {
				 echo "#";
			 } ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/icons/facebook.png" alt="facebook" /></a>
			</div>

			<div class="contact-icon">
				<a href="<?php if (get_option('lG_twitter')) {
				 echo get_option('lG_twitter');
				 }else {
				 echo "#";
			 } ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/icons/twitter.png" alt="twitter" /></a>
			</div>

			<div class="contact-icon">
				<a href="<?php if (get_option('lG_linkedin')) {
				 echo get_option('lG_linkedin');
				 }else {
				 echo "#";
			 } ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/icons/linkedin.png" alt="linkedin" /></a>
			</div>

			<div class="contact-icon">
				<a href="<?php if (get_option('lG_youtube')) {
				 echo get_option('lG_youtube');
				 }else {
				 echo "#";
			 } ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/icons/youtube.png" alt="youtube" /></a>
			</div>
		</div>

		<div class="sidebar-box clearfix">
			<h4>Visit Us:</h4>
		 	<iframe width="249" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Hidalgo+775,+Capital+Federal,+Argentina&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=44.118686,107.138672&amp;vpsrc=0&amp;ie=UTF8&amp;hq=&amp;hnear=Hidalgo+775,+Caballito,+Ciudad+Aut%C3%B3noma+de+Buenos+Aires,+Argentina&amp;t=m&amp;z=14&amp;ll=-34.610536,-58.441034&amp;output=embed"></iframe>			
		</div>

		<div class="sidebar-box clearfix">
			<h4>Contact Us:</h4>
			<?php if (get_option('lG_contact_text')) {
				 echo get_option('lG_contact_text');
			?>
			<?php }else { ?>
				<p>Tel: +44 0208 1234 355<br />
				Fax: +44 0208 1234 344<br />
				Email: <a href="mailto:laigus@domain.com.ar">laigus@domain.com.ar</a></p>
			<?php } ?>
		</div>
			
</div>