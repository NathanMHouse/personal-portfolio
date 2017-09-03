<?php
/**
 * Testimonial Content
 *
 * @package Portfolio
 */
?>

<div id="testimonials" class="testimonial-section">
	<div class="container">
		<div class="row">

			<?php
			// The testimonial
			// The args
			$args = array(
				'post_type'			=> array( 'pp_testimonials' ),
				'post_status'		=> array( 'publish' ),
				'posts_per_page'	=> '1',
				'orderby'			=> 'rand',
			);

			// The query
			$query = new WP_Query( $args );

			// The loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();

					// Vars
					$testimonial_content 	= get_the_content();
					$testimonial_image		= get_the_post_thumbnail_url();
					$testimonial_name		= get_field( 'testimonial_name' );
					$testimonial_role		= get_field( 'testimonial_role' );
					$testimonial_company	= get_field( 'testimonial_company' );

					// The testimonial text
					?>
					<div class="testimonial-content-text col-md-8 col-md-push-4">
						<p><?php echo $testimonial_content; ?></p>

						<?php
						// The attribution
						?>
						<span class="testimonial-content-title">
							<?php echo $testimonial_name; ?>
						</span>
						<span class="testimonial-content-role">
							<?php echo $testimonial_role . ', ' . $testimonial_company; ?>
						</span>
						<div class="testimonial-section-arrow-mobile">
						</div><!-- testimonial-section-arrow -->
					</div><!-- .testimonial-content-text -->

					<?php 
					// the testimonial image
					?>
					<div class="testimonial-content-image col-md-4 col-md-pull-8" style="background-image: url( <?php echo $testimonial_image; ?> );">
						<div class="testimonial-section-arrow">
						</div><!-- testimonial-section-arrow -->
					</div><!-- .testimonial-content-image -->
					<?php
				}
			}

			// Restore original Post Data
			wp_reset_postdata();
			?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #testimonials -->