<?php
/**
 * Flexible Content - Big Code
 *
 *
 * @package Portfolio
 */

// Get ACF values
$code = get_sub_field( 'code' );
?>

<section class="content-row
<?php
echo esc_attr( "$content_row_class $content_row_count_class $margin $padding background-$row_color" );
?>
">

	<div class="container">
		<div class="row">

			<?php

			// The code
			?>
			<div class="content-row-code col-md-12">
				
				<?php

				// The arrow
				?>
				<div class="content-row-arrow-outer content-row-arrow-bottom <?php echo esc_attr( "content-row-arrow-$row_color" ); ?>">
					<div class="content-row-arrow-inner content-row-arrow-bottom <?php echo esc_attr( "content-row-arrow-$row_color" ); ?>"></div><!-- .content-row-arrow-inner -->
				</div><!-- .content-row-carousel-arrow-outer -->

				<?php echo wp_kses_post( $code ); ?>

			</div><!-- .content-row-code -->

		</div><!-- .row -->
	</div><!-- .container -->

	<div class="<?php echo esc_attr( "background-$row_color" ); ?>">
		<div class="container">
			<div class="row">

				<?php

				// The content
				?>
					
				<div class="content-row-content-title-container col-md-12">

					<?php

					// The title
					?>
					<div class="content-row-title">

						<h3><?php echo esc_html( $title ); ?></h3>

					</div><!-- .content-row-title -->

					<?php

					// The content
					?>
					<div class="content-row-content">

						<?php echo wp_kses_post( $content ); ?>

					</div><!-- .content-row-content -->

				</div><!-- .content-row-content-title-container -->

			</div><!-- .row -->
		</div><!--  -->
	</div><!-- .container -->

</section><!-- .content-row -->
