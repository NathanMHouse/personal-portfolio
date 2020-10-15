<?php
/**
 * Flexible Content - Image Carousel
 *
 *
 * @package Portfolio
 */

?>

<section class="content-row 
<?php
echo esc_attr( "$content_row_class $content_row_count_class $margin $padding" . " background-$row_color" );
?>
">

	<div class="container">
		<div class="row">

			<?php

			// The carousel
			?>
			<div class="content-row-carousel">
				

					<?php

					// The carousel slides (images)
					if ( have_rows( 'carousel_slides' ) ) {
						while ( have_rows( 'carousel_slides' ) ) {
							the_row();

							// Get the ACF values
							$image = get_sub_field( 'image' );

					?>
							
							<div class="content-row-image col-md-4">
								<img src="<?php echo esc_attr( $image['url'] ); ?>"
									 href="<?php echo esc_attr( $image['url'] ); ?>"
									 alt="<?php echo esc_attr( $image['alt'] ); ?>"
									 class="popup-image"
								>
							</div><!-- .content-row-image -->
							
					<?php
						}
					}
					?>
				
			</div><!-- .content-row-carousel -->

		</div><!-- .row -->

		<div class="row">

			<?php

			// The divider
			?>
			<div class="content-row-carousel-divider">
				<div class="content-row-carousel-arrow-outer">
					<div class="content-row-carousel-arrow-inner"></div><!-- .content-row-carousel-arrow-inner -->
				</div><!-- .content-row-carousel-arrow-outer -->
			</div><!-- .content-row-carousel-divider -->
			
			<?php

			// The title
			?>
			<div class="content-row-title col-lg-7 col-sm-10">

				<h3><?php echo esc_html( $title ); ?></h3>

			</div><!-- .content-row-title -->

			<?php

			// The navigation arrows
			?>
			<div class="content-row-carousel-navigation col-lg-5 col-sm-2">
			</div><!-- .content-row-carousel-navigation -->

			<?php

			// The content
			?>
			<div class="content-row-content col-sm-12">

				<?php echo wp_kses_post( $content ); ?>

			</div><!-- .content-row-content -->

		</div><!-- .row -->
	</div><!-- .container -->

</section><!-- .content-row -->
