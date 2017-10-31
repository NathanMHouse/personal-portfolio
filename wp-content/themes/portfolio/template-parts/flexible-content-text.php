<?php
/**
 * Flexible Content - Text
 *
 *
 * @package Portfolio
 */

?>

<section 
	class="content-row 
	<?php 
	echo esc_attr( "$content_row_class $content_row_count_class $padding $margin" );
	?>"
	style="background-color: <?php echo esc_attr( $background_color ); ?>">

	<div class="container">

		<?php

		// The title
		if ( $title ) {
		?>
			<div class="row">
				<div class="content-row-title col-md-6 col-md-offset-3">

					<h2><?php echo esc_html( $title ); ?></h2>

				</div><!-- .content-row-title -->
			</div><!-- .row -->
		<?php
		}

		// The content
		if ( $content ) {
		?>

			<div class="row">
				<div class="content-row-content col-md-10 col-md-offset-1">

					<?php echo wp_kses_post( $content ); ?>

				</div><!-- .content-row-content -->
			</div><!-- .row -->

		<?php
		}
		?>

	</div><!-- .container -->

</section><!-- .content-row -->