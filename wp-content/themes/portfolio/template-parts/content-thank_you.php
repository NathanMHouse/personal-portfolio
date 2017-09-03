<?php
/**
 * Thank You Content
 *
 * @package Portfolio
 */

// Vars
$thank_you_title	= get_field( 'thank_you_title', 'options' );
$thank_you_text		= get_field( 'thank_you_text', 'options' );
?>

<div class="thank-you-section">
	<div class="container">
		<div class="row">

			<?php
			// The title and thank you text
			?>	
			<div class="thank-you-content-text col-md-8 col-md-offset-2">
			<h3><?php echo $thank_you_title; ?></h3>
			<?php echo $thank_you_text; ?>
			</div><!-- .thank-you-content-text -->

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .thank-you-section -->