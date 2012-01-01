<?php
/**
 * @package WordPress
 * @subpackage LaiGus Theme
 */
?>
<?php 
/* Template Name: Contact */ 
?>

<!--
NOTE: Change the line 58 that says "$ emailto ='you@domain.com.ar'" for real email where you want to reach.
-->

<?php 

if(isset($_POST['submitted'])) {


	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	

		if(trim($_POST['contactName']) === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		

		if(trim($_POST['email']) === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			

		if(trim($_POST['comments']) === '') {
			$commentError = 'You forgot to enter your comments.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			

		if(!isset($hasError)) {

			$emailTo = "you@domain.com.ar"; // CHANGE THIS AND INSERT THE REAL MAIL
			$subject = 'Contact Form Submission from '.$name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments";
			$headers = 'From: laiGus <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'E-mail send from laiGus';
				$headers = 'From: laiGus <noreply@somedomain.com>';
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
} ?>

<?php get_header(); ?> 

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/contact-form.js"></script>


<?php if(isset($emailSent) && $emailSent == true) { ?>

<div class="grid_17 alpha">
	<div class="entry">
		<h1 class="page-title">Thanks, <?=$name;?></h1>
		<p>Your email was successfully sent.</p>
	</div>
</div>

<?php include ("sidebar-info.php"); ?>
<?php get_footer(); ?>

<?php } else { ?>

<div class="grid_17 alpha">
<div class="entry">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1 class="page-title"><?php the_title(); ?></h1>			
		<?php the_content(); ?>
		
		<?php if(isset($hasError) || isset($captchaError)) { ?>
			<p class="error">There was an error submitting the form.<p>
		<?php } ?>

		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">

				<label for="contactName">Your Name:</label><br />
					<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
					<?php if($nameError != '') { ?>
						<span class="error"><?=$nameError;?></span> 
					<?php } ?>
				<br /><br />
				
				<label for="email">Your E-mail:</label><br />
					<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
					<?php if($emailError != '') { ?>
						<span class="error"><?=$emailError;?></span>
					<?php } ?>
					<br /><br />
				
				<label for="commentsText">Your Message:</label><br />
					<textarea name="comments" id="commentsText" rows="20" cols="30" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
					<?php if($commentError != '') { ?>
						<span class="error"><?=$commentError;?></span> 
					<?php } ?>
					<br /><br />
			
				<input type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> /><label for="sendCopy">Send a copy of this email to yourself</label>
				<br /><br />

				<input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit">Send Email</button>
			
		</form>
	
		<?php endwhile; ?>
	<?php endif; ?>
<?php } ?>

</div>
</div>

<?php include ("sidebar-info.php"); ?>
<?php get_footer(); ?>