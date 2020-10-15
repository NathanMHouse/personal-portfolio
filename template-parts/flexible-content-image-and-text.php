<?php
/**
 * Flexible Content - Image and Text
 *
 *
 * @package Portfolio
 */

// Get ACF values
$alignment_class_image = ( 'image-right-text-left' === get_sub_field( 'alignment' ) )
						 ? 'col-md-5 col-md-push-7'
						 : 'col-md-5';
$alignment_class_text  = ( 'image-right-text-left' === get_sub_field( 'alignment' ) )
						 ? 'col-md-7 col-md-pull-5'
						 : 'col-md-7';
?>

<section class="content-row 
<?php
echo esc_attr( "$content_row_class $content_row_count_class $margin $padding" . " background-$row_color" );
?>
">

	<div class="container">
		<div class="row">

			<?php

			// The image
			?>
			<div class="content-row-image <?php echo esc_attr( $alignment_class_image ); ?>">

				<img src="<?php echo esc_attr( $image['url'] ); ?>"
					 href="<?php echo esc_attr( $image['url'] ); ?>"
					 alt="<?php echo esc_attr( $image['alt'] ); ?>"
					 class="popup-image"
				>
			
			</div><!-- .col -->

			<div class="content-row-content-title-container <?php echo esc_attr( $alignment_class_text ); ?>">

				<?php

				// The title
				if ( $title ) {
				?>
					<div class="content-row-title">

						<h3><?php echo esc_html( $title ); ?></h3>

					</div><!-- .content-row-title -->

				<?php
				}

				// The content
				if ( $content ) {
				?>
					<div class="content-row-content">

						<?php echo wp_kses_post( $content ); ?>

					</div><!-- .content-row-content -->

				<?php
				}
				?>

			</div><!-- .content-row-content-title-container -->

		</div><!-- .row -->
	</div><!-- .container -->

</section><!-- .content-row -->
