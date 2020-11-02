<?php
/**
 * Thank You Content
 *
 * @package Portfolio
 */

// Vars
$thank_you_title = get_field( 'thank_you_title', 'options' );
$thank_you_text  = get_field( 'thank_you_text', 'options' );
?>

<section class="thank-you-section">
	<div class="container">
		<div class="row">

			<?php

			// The title and thank you text
			?>
			<div class="thank-you-content-text col-md-8 col-md-offset-2">
			<h2><?php echo esc_html( $thank_you_title ); ?></h2>
			<?php 
			echo wp_kses(
				$thank_you_text,
				array(
					'p' => array(),
					'a' => array(
						'href'       => array(),
						'data-scroll' => array(),
					),
				)

			);
			esc_html( $thank_you_text );
			?>
			</div><!-- .thank-you-content-text -->

		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .thank-you-section -->
