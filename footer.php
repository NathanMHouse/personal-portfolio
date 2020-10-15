<?php
/**
 * Footer - the template for displaying the footer.
 *
 *
 *
 * @package Portfolio
 */

// Vars
$footer_title         = get_field( 'footer_title', 'options' );
$footer_subtitle      = get_field( 'footer_subtitle', 'options' );
$footer_text          = get_field( 'footer_text', 'options' );
$footer_form_title    = get_field( 'footer_form_title', 'options' );
$footer_form_cta_text = get_field( 'footer_form_cta_text', 'options' );
$social_email_link    = get_field( 'social_email_link', 'options' );
$social_twitter_link  = get_field( 'social_twitter_link', 'options' );
$social_linkedin_link = get_field( 'social_linkedin_link', 'options' );
$social_github_link   = get_field( 'social_github_link', 'options' );
?>

	</div><!-- #content -->
	<footer id="site-footer" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				
				<?php

				// The contact form
				?>
				<div class="footer-contact-form col-md-5 col-md-push-7">
					<div class="footer-contact-form-content">

						<?php

						// The form title
						?>
						<h3><?php echo esc_html( $footer_form_title ); ?></h3>
						<p class="intro-text"><?php esc_html_e( '* indicates a required field.', 'portfolio' ); ?></p>
						<form id="footer-contact-form"
							  name="footer_contact_form"
							  action="<?php echo admin_url( 'admin-post.php' ); ?>"
							  method="post"
				  		>

							<?php

							// Name
							?>
							<p class="name form-field">
								<label for="name"><?php esc_html_e( 'Name', 'portfolio' ); ?></label>
								<input id="name" 
									   name="name" 
									   type="text"
							   	/>
							</p><!-- .name -->

							<?php

							// Email
							?>
							<p class="email form-field required">
								<label for="email"><?php esc_html_e( 'Email', 'portfolio' ); ?></label>
								<input id="email"
									   name="email"
									   type="email"
									   
						   		/>
								<span class="error inactive"><?php esc_html_e( 'Please enter a valid email address.', 'portfolio' ); ?></span>
							</p><!-- .email -->

							<?php

							// Message
							?>
							<p class="message form-field">
								<label for="message"><?php esc_html_e( 'Message', 'portfolio' ); ?></label>
								<textarea id="message"name="message" rows="4"></textarea>
							</p><!-- .message -->

							<?php

							// Nonce verification
							if ( function_exists( 'wp_nonce_field' ) ) {
								wp_nonce_field( 'portfolio_send_message', 'portfolio_message_wp_nonce' );
							}

							// Action hook
							?>

							<input type="hidden"
								   name="action"
								   value="portfolio_trigger_form_handler"
					   		/>

							<?php

							// Submit
							?>
							<input class="cta primary-cta"
								   type="submit"
								   name="submit"
								   value="<?php echo esc_attr( $footer_form_cta_text ); ?>"
				   			/>
						</form><!-- #footer-contact-form -->
					</div><!-- .footer-contact-form-content -->
				</div><!-- .footer-contact-form -->

				<?php
				// The colophon
				?>
				<div class="footer-colophon col-md-7 col-md-pull-5">
					<div class="footer-colophon-text">

						<?php

						// The footer title
						?>
						<h3><?php echo esc_html( $footer_title ); ?></h3>

						<?php

						// The footer subtitle
						?>
						<h4><?php echo esc_html( $footer_subtitle ); ?></h4>

						<?php

						// The footer text
						echo wp_kses_post( $footer_text );
						?>
					</div><!-- .footer-colophon-text -->

					<?php

					// The social links
					?>
					<div class="footer-colophon-social">
						<a href="mailto:<?php echo esc_attr( $social_email_link ); ?>"><i class="fa fa-lg fa-envelope-o"></i></a>
						<a href="<?php echo esc_attr( $social_twitter_link ); ?>" target="_blank"><i class="fa fa-lg fa-twitter"></i></a>
						<a href="<?php echo esc_attr( $social_github_link ); ?>" target="_blank"><i class="fa fa-lg fa-github"></i></a>
						<a href="<?php echo esc_attr( $social_linkedin_link ); ?>" target="_blank"><i class="fa fa-lg fa-linkedin"></i></a>
					</div><!-- .footer-social -->
						<div class="footer-arrow">
					</div><!-- footer-arrow -->
				</div><!-- .footer-colophon -->
			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- .site-footer -->
</div><!-- #page -->

<!-- Load Google Fonts -->
<script type="text/javascript">
	WebFontConfig = {
		google: { families: [ 'Open+Sans:300,400,600' ] }
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})(); 
</script>

<?php wp_footer(); ?>
</body>
</html>
