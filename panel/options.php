<?php

$themename = "LaiGus";
$shortname = "lG";

$options = array (
				
				array(	"desc" => __("<br /><h3>Home Page:</h3>"),
						"type" => "nothing"),	
						
				array(	"name" => __('Welcome text'),
						"desc" => __("Complete the field with the text you want displayed."),
						"id" => $shortname."_maintittle",
						"std" => __(""),
						"type" => "textarea",
						"options" => array(	"rows" => "1",
											"cols" => "94") ),
				
				array(	"name" => __('Introduction'),
						"desc" => __("Complete the field with the text you want displayed."),
						"id" => $shortname."_introductiontext",
						"std" => __(""),
						"type" => "textarea",
						"options" => array(	"rows" => "5",
											"cols" => "94") ),
				
				array(	"desc" => __("<br /><hr><h3>SEO Options:</h3>"),
						"type" => "nothing"),	
						
				array(	"name" => __('Meta - Author'),
						"desc" => __("Complete the field with the text you want displayed, example: Alan Gabriel Dawidowicz"),
						"id" => $shortname."_authortext",
						"std" => __(""),
						"type" => "textarea",
						"options" => array(	"rows" => "1",
											"cols" => "94") ),	
				
				array(	"name" => __('Meta - Contact'),
						"desc" => __("Complete the field with the text you want displayed, example: email@domain.com.ar"),
						"id" => $shortname."_contacttext",
						"std" => __(""),
						"type" => "textarea",
						"options" => array(	"rows" => "1",
											"cols" => "94") ),
											
				array(	"name" => __('Meta - Keywords'),
						"desc" => __("Complete the field with the keywords you want to display."),
						"id" => $shortname."_keywordstext",
						"std" => __(""),
						"type" => "textarea",
						"options" => array(	"rows" => "1",
											"cols" => "94") ),

				array(	"desc" => __("<br /><hr><h3>General Options:</h3>"),
						"type" => "nothing"),
						
				array(
						"name" => __('Share Buttons'),
						"desc" => __("Enable/disable (appears in the blog section)"),
						"id" => $shortname."_share_box",
						"std" => "false",
						"type" => "checkbox"),				
						
				array(	"name" => __('Footer Text'),
						"desc" => __("You can use HTML tags"),
						"id" => $shortname."_footer_text",
						"std" => __(""),
						"type" => "textarea",
						"options" => array(	"rows" => "5",
											"cols" => "94") ),

				array(	"desc" => __("<br /><hr><h3>Contact Page:</h3>"),
						"type" => "nothing"),
                
                array(	"name" => __('Facebook'),
						"desc" => __('(Example: http://www.facebook.com/alandawi)'),
						"id" => $shortname."_facebook",
						"std" => "",
						"type" => "text"),
										
				array(	"name" => __('Twitter'),
						"desc" => __('(Example: http://twitter.com/alandawi)'),
						"id" => $shortname."_twitter",
						"std" => "",
						"type" => "text"),
				
                array(	"name" => __('Linkedin'),
						"desc" => __('(Example: http://ar.linkedin.com/in/alandawi)'),
						"id" => $shortname."_linkedin",
						"std" => "",
						"type" => "text"),

				array(	"name" => __('Youtube'),
						"desc" => __('(Example: http://www.youtube.com/user/youruser)'),
						"id" => $shortname."_youtube",
						"std" => "",
						"type" => "text"),

				array(	"name" => __('Contact Text'),
						"desc" => __("You can use HTML tags"),
						"id" => $shortname."_contact_text",
						"std" => __(""),
						"type" => "textarea",
						"options" => array(	"rows" => "5",
											"cols" => "94") ),
		);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=options.php");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=options.php");
            die;

        } else if ( 'reset_widgets' == $_REQUEST['action'] ) {
            $null = null;
            update_option('sidebars_widgets',$null);
            header("Location: themes.php?page=options.php");
            die;
        }
    }

    add_theme_page($themename." Panel", "Options LaiGus", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('cambios guardados.','laigus').'</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('cambios guardados.','laigus').'</strong></p></div>';
    if ( $_REQUEST['reset_widgets'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('widgets reset.','laigus').'</strong></p></div>';
    
?>
<div class="wrap">
<?php if ( function_exists('screen_icon') ) screen_icon(); ?>
<h2><strong>lgPanel Manager 1.0</strong></h2>

<form method="post" action="">

	<table class="form-table">

<?php foreach ($options as $value) { 
	
	switch ( $value['type'] ) {
		case 'text':
		?>
		<tr valign="top"> 
			<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'laigus'); ?></label></th>
			<td>
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
				<?php echo __($value['desc'],'laigus'); ?>

			</td>
		</tr>
		<?php
		break;
		
		case 'select':
		?>
		<tr valign="top">
			<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'laigus'); ?></label></th>
				<td>
					<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php foreach ($value['options'] as $option) { ?>
					<option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<?php
		break;
		
		case 'textarea':
		$ta_options = $value['options'];
		?>
		<tr valign="top"> 
			<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'laigus'); ?></label></th>
			<td><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>"><?php 
				if( get_option($value['id']) != "") {
						echo __(stripslashes(get_option($value['id'])),'laigus');
					}else{
						echo __($value['std'],'laigus');
				}?></textarea><br /><?php echo __($value['desc'],'laigus'); ?></td>
		</tr>
		<?php
		break;
		
		case 'nothing':
		$ta_options = $value['options'];
		?>
		</table>
			<?php echo __($value['desc'],'laigus'); ?>
		<table class="form-table">
		<?php
		break;

		case 'radio':
		?>
		<tr valign="top"> 
			<th scope="row"><?php echo __($value['name'],'laigus'); ?></th>
			<td>
				<?php foreach ($value['options'] as $key=>$option) { 
				$radio_setting = get_option($value['id']);
				if($radio_setting != ''){
					if ($key == get_option($value['id']) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if($key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
				<input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] . $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><label for="<?php echo $value['id'] . $key; ?>"><?php echo $option; ?></label><br />
				<?php } ?>
			</td>
		</tr>
		<?php
		break;
		
		case 'checkbox':
		?>
		<tr valign="top"> 
			<th scope="row"><?php echo __($value['name'],'laigus'); ?></th>
			<td>
				<?php
					if(get_option($value['id'])){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				?>
				<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
				<label for="<?php echo $value['id']; ?>"><?php echo __($value['desc'],'laigus'); ?></label>
			</td>
		</tr>
		<?php
		break;

		default:

		break;
	}
}
?>

	</table>

	<p class="submit">
		<input name="save" type="submit" value="<?php _e('Save','laigus'); ?>" />    
		<input type="hidden" name="action" value="save" />
	</p>
</form>
<form method="post" action="">
	<p class="submit">
		<input name="reset" type="submit" value="<?php _e('Discart','laigus'); ?>" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>

</div>
<?php
}

add_action('admin_menu' , 'mytheme_add_admin'); 
 
?>