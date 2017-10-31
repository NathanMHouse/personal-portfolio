<?php
/**
 * Flexible Content - Image and Text
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

		<div class="row">

			<div class="col-md-12">

				<div class="col-md-7">

					<?php

					// The title
					if ( $title ) {
					?>

						<h2><?php echo esc_html( $title ); ?></h2>

					<?php
					}

					// The content
					if ( $content ) {
					?>

						<?php echo wp_kses_post( $content ); ?>

					<?php
					}
					?>

				</div><!-- .col -->

				<img src="<?php echo esc_attr( $image['url'] ); ?>" 
				     alt="<?php echo esc_attr( $image['alt'] ); ?>">

			</div><!-- .col -->		

		</div><!-- .row -->

	</div><!-- .container -->

</section><!-- .content-row -->